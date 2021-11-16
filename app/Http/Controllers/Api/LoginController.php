<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $Validated = Validator::make($request->all(), [
            'phone'     => 'required',
            'password'  => 'required|min:6',
        ]);

        if($Validated->fails())
            return response()->json($Validated->messages());

        if (auth()->attempt($request->only('phone', 'password'))) {
            $token = auth()->user()->createToken('TutsForApi')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $Validated = Validator::make($request->all(), [
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:clients',
            'password'  => 'required|min:6',
            'phone'     => 'required|unique:clients',
        ]);

        if($Validated->fails())
            return response()->json($Validated->messages());

        $client = Client::create($request->only('name', 'email', 'password', 'phone'));

        $token = $client->createToken('TutsForApi')->accessToken;

        return response()->json(['token' => $token], 200);
    }
}
