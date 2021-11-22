<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AppointmentController extends Controller
{
    public function doctorAppointments($doctor_id){

        $appointments = Appointment::where('doctor_id', $doctor_id)->where('status', 0)->get(['date', 'from', 'to']);

        return response()->json(['appointments' => $this->formateDoctorAppointments($appointments)], 200);
    }

    private function formateDoctorAppointments($appointments){
        $months = [];
        $days = [];

        $available_appointment_duration = $this->getAppointmentAvaliableDuration();

        $month_start_date = null;
        foreach($available_appointment_duration as $day){
            if(!isset($months[$day->format('Y M')])){
                $month_start_date = $day;
                $months[$day->format('Y M')] = [];
                $days[$day->format('D')] = [];
                $this->setMonthDaysArrayValues($days, $day, $appointments);
            }else{
                if(($month_start_date->diff($day)->days)+1 == $day->daysInMonth){
                    $months[$day->format('Y M')] =  $days;
                    unset($days);
                }elseif(count($days)<7 && $month_start_date->diff($day)->days<7){
                    $days[$day->format('D')] = [];
                    $this->setMonthDaysArrayValues($days, $day, $appointments);
                }else{
                    $this->setMonthDaysArrayValues($days, $day, $appointments);
                }
            }
        }

        return $months;
    }

    private function getAppointmentAvaliableDuration(){
        $current_month = Carbon::now()->startOfMonth();
        $last_avaliable_duration = Carbon::now()->addMonths(2)->endOfMonth();

        $available_appointment_duration = CarbonPeriod::create($current_month, $last_avaliable_duration);

        return $available_appointment_duration;
    }

    private function setMonthDaysArrayValues(&$days, $day, $appointments){
        if($this->checkAppointmentDay($day, $appointments)){
            array_push($days[$day->format('D')], [$day->format('d')=>1]);
        }else{
            array_push($days[$day->format('D')], [$day->format('d')=>0]);
        }

        return true;
    }

    private function checkAppointmentDay($day, $appointments){
        foreach($appointments as $appointment){
            if($appointment->date == $day->format('Y-m-d')){
                return true;
            }
        }

        return false;
    }

    public function dayAppointments(Request $request){
        $appointments = [];

        if(isset($request->date) && $request->date!=null){
            $appointments = Appointment::where('doctor_id', $request->doctor_id)->where('date', $this->formatDate($request->date))->get(['id', 'from', 'to', 'status']);
        }

        return response()->json(['appointments' => $appointments], 200);
    }

    private function formatDate($date){
        return Carbon::createFromFormat('Y M d', $date)->format('Y-m-d');
    }

    public function reserveAppointment(Request $request){
        $Validated = Validator::make($request->all(), [
            'client_id' => 'required',
            'appointment_id' => 'required',
            'patient_name' => 'required|min:3',
            'phone_number' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'description' => 'required',
        ]);

        if($Validated->fails())
            return response()->json($Validated->messages());

        $reservation = new Reservation();
        $reservation->fill($request->only('client_id', 'appointment_id', 'patient_name', 'phone_number', 'gender', 'age', 'description'));
        if($reservation->save()){
            $this->updateAppointmentStatus($request->appointment_id);
            return response()->json(['message' => 'appointment reserved successfully.'], 200);
        }else{
            return response()->json(['message' => 'an error occurred.'], 200);
        }  
    }

    private function updateAppointmentStatus($appointment_id){
        $appointment = Appointment::where('id', $appointment_id)->first();
        $appointment->status = 1;
        $appointment->save();

        return true;
    }
}
