<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $Validated = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ]);

        if($Validated->fails())
            return response()->json($Validated->messages());

        if (auth()->attempt($request->only('email', 'password'))) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $Validated = Validator::make($request->all(), [
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6',
        ]);

        if($Validated->fails())
            return response()->json($Validated->messages());

        $user = User::create($request->only('name', 'email', 'password'));

        $token = $user->createToken('TutsForWeb')->accessToken;

        return response()->json(['token' => $token], 200);
    }
}
