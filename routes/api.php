<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('api', function (Request $request) {
//     Route::get('/register', 'PassportController@register');
// });


Route::post('login', 'Api\ClientController@login');
Route::post('register', 'Api\ClientController@register');

Route::get('specialties', 'Api\SpecialtyController@index');
Route::get('specialty/{id}', 'Api\SpecialtyController@specialty');

Route::middleware('auth:api')->group(function () {
    Route::get('appointments/{doctor_id}', 'Api\AppointmentController@doctorAppointments');
    Route::post('day_appointments', 'Api\AppointmentController@dayAppointments');
    route::post('appointment/reserve', 'Api\AppointmentController@reserveAppointment');
});
