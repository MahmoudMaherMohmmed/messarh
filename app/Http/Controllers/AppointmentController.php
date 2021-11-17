<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Validator;

class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->get_privilege();
    }

    public function index()
    {
        $appointments = Appointment::all();
        return view('appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appointment = null;

        return view('appointment.form', compact('appointment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id'      => 'required',
            'date'     => 'required',
            'from'  => 'required',
            'to'     => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $appointment = new Appointment();
        $appointment->fill($request);
        $appointment->save();

        \Session::flash('success', trans('messages.Added Successfully'));

        return redirect('/appointment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointment.index', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointment.form', compact('apointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id'      => 'required',
            'date'     => 'required',
            'from'  => 'required',
            'to'     => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $appointment = Appointment::findOrFail($id);
        $appointment->fill();
        $appointment->save();

        \Session::flash('success', trans('messages.updated successfully'));
        return redirect('/appointment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return redirect()->back();
    }
}
