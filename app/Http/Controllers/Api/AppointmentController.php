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

        $this->formateDoctorAppointments($appointments);

        return response()->json(['appointments' => $appointments], 200);
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
                }else{
                    if(count($days)==7 && $month_start_date->diff($day)->days==7){
                        $months[$day->format('Y M')] = $days;
                        $days = [];
                    }else{
                        $days[$day->format('D')] = [];
                    }
                }
            }
        }

        dd($appointments_array);
        return $appointments_array;
    }

    private function getAppointmentAvaliableDuration(){
        $current_month = Carbon::now()->startOfMonth();
        $last_avaliable_duration = Carbon::now()->addMonths(2)->endOfMonth();

        $available_appointment_duration = CarbonPeriod::create($current_month, $last_avaliable_duration);

        return $available_appointment_duration;
    }
}
