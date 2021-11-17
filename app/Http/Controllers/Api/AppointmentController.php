<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AppointmentController extends Controller
{
    public function doctorAppointments($doctor_id){

        $appointments = Appointment::where('doctor_id', $doctor_id)->where('status', 0)->get(['date', 'from', 'to']);

        return response()->json(['appointments' => $this->formateDoctorAppointments($appointments)], 200);
    }

    private function formateDoctorAppointments($appointments){
        $appointments_array = [];

        if(isset($appointments) && count($appointments)>0){
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
                        array_push($months[$day->format('Y M')], $days);
                        unset($days);
                    }elseif(count($days)<7 && $month_start_date->diff($day)->days<7){
                        $days[$day->format('D')] = [];
                        $this->setMonthDaysArrayValues($days, $day, $appointments);
                    }else{
                        $this->setMonthDaysArrayValues($days, $day, $appointments);
                    }
                }
            }
        }

        $appointments_array = $months;

        return $appointments_array;
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
}
