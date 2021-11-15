<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index(Request $request)
    {
        $specialties = $this->formateSpecialties(Specialty::get(), $request->lang);

        return response()->json(['specialties', $specialties]);
    }

    private function formateSpecialties($specialties, $lang){
        $specialties_array = [];

        foreach($specialties as $specialty){
            array_push($specialties_array, [
                'id' => $specialty->id,
                'title' => isset($lang) && $lang!=null ? $specialty->getTranslation('title', $lang) : $specialty->title,
                'image' => url($specialty->image),
                'doctors_count' => 10,
            ]);
        }

        return $specialties_array;
    }
}
