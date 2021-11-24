<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Client;
use App\Models\Doctor;
use Illuminate\Http\Request;

use Validator;

class ReservationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->get_privilege();
    }

    public function index()
    {
        $reservations = Reservation::all();
        $clients = Client::all();
        $doctors = Doctor::all();
        return view('reservation.index', compact('reservations', 'clients', 'doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor = null;
        $specialties = Specialty::all();
        $languages = $this->languageRepository->all();

        return view('doctor.form', compact('doctor', 'specialties', 'languages'));
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
            'name' => 'required|array',
            'name.*' => 'required|string',
            'subspecialty' => 'required|array',
            'subspecialty.*' => 'required|string',
            'medical_examination_price' => 'required',
            'graduation_university' => 'required|array',
            'graduation_university.*' => 'required|string',
            'specialty_id' => 'required',
            'image' => ''
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $doctor = new Doctor();
        $doctor->fill($request->except('name', 'subspecialty', 'graduation_university', 'ímage'));

        if ($request->image) {
            $imgExtensions = array("png", "jpeg", "jpg");
            $file = $request->image;
            if (!in_array($file->getClientOriginalExtension(), $imgExtensions)) {
                \Session::flash('failed', trans('messages.Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..'));
                return back();
            }

            $doctor->image = $this->handleFile($request['image']);
        }

        foreach ($request->name as $key => $value) {
            $doctor->setTranslation('name', $key, $value);
        }
    
        $doctor->specialty_id = $request->specialty_id;

        foreach ($request->subspecialty as $key => $value) {
            $doctor->setTranslation('subspecialty', $key, $value);
        }

        foreach ($request->graduation_university as $key => $value) {
            $doctor->setTranslation('graduation_university', $key, $value);
        }
        
        $doctor->save();
        \Session::flash('success', trans('messages.Added Successfully'));
        return redirect('/doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctor.index', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $clients = Client::all();
        $doctors = Doctor::all();
        return view('reservation.form', compact('reservation', 'clients', 'doctors'));
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
            'name' => 'required|array',
            'name.*' => 'required|string',
            'subspecialty' => 'required|array',
            'subspecialty.*' => 'required|string',
            'medical_examination_price' => 'required',
            'graduation_university' => 'required|array',
            'graduation_university.*' => 'required|string',
            'specialty_id' => 'required',
            'image' => ''
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $doctor = Doctor::findOrFail($id);

        $doctor->fill($request->except('name', 'subspecialty', 'graduation_university', 'ímage'));

        if ($request->image) {
            $imgExtensions = array("png", "jpeg", "jpg");
            $file = $request->image;
            if (!in_array($file->getClientOriginalExtension(), $imgExtensions)) {
                \Session::flash('failed', trans('messages.Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..'));
                return back();
            }

            if ($doctor->image) {
                $this->delete_image_if_exists(base_path('/uploads/doctors/' . basename($doctor->image)));
            }

            $doctor->image = $this->handleFile($request['image']);
        }

        foreach ($request->name as $key => $value) {
            $doctor->setTranslation('name', $key, $value);
        }

        $doctor->specialty_id = $request->specialty_id;
    
        foreach ($request->subspecialty as $key => $value) {
            $doctor->setTranslation('subspecialty', $key, $value);
        }

        foreach ($request->graduation_university as $key => $value) {
            $doctor->setTranslation('graduation_university', $key, $value);
        }
        
        $doctor->save();

        \Session::flash('success', trans('messages.updated successfully'));
        return redirect('/doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->back();
    }

}
