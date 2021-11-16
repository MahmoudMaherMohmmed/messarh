<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function login(Request $request)
    {
        $Validated = Validator::make($request->all(), [
            'phone'     => 'required',
            'password'  => 'required|min:6',
        ]);

        if($Validated->fails())
            return response()->json($Validated->messages());

        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                $token = $client->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 401);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 401);
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
