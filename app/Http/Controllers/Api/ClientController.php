<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\UploaderService;
use Illuminate\Http\UploadedFile;

class ClientController extends Controller
{
    /**
     * @var IMAGE_PATH
     */
    const IMAGE_PATH = 'clients';
    
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

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
                $token = $client->createToken('API')->accessToken;
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

        $token = $client->createToken('API')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function profile(Request $request){
        $user = $request->user();

        return response()->json(['user' => $user], 200);
    }

    public function updateProfile(Request $request){
        $client = $request->user();

        $Validated = Validator::make($request->all(), [
            'name'      => 'required|min:3',
            'email'     => 'required|unique:clients,email,'.$client->email,
            'phone'     => 'required|unique:clients,phone,'.$client->phone,
        ]);

        if($Validated->fails())
            return response()->json($Validated->messages());

        $updated_client = Client::where('id', $client->id)->first();
        $updated_client->fill($request->only('name', 'email', 'phone'));
        $updated_client->update();
        
        return response()->json(['messaage' => 'Your profile updated successfully.'], 200);
    }

    public function updateProfileImage(Request $request){
        $client = $request->user();

        $Validated = Validator::make($request->all(), [
            'image'      => 'required|mimes:jpeg,jpg,png',
        ]);

        if($Validated->fails())
            return response()->json($Validated->messages());

        $updated_client = Client::where('id', $client->id)->first();
        if ($request->image) {
            $updated_client->image = $this->handleFile($request['image']);
        }
        $updated_client->update();

        return response()->json(['messaage' => 'Your profile updated successfully.'], 200);
    }

       /**
     * handle image file that return file path
     * @param File $file
     * @return string
     */
    public function handleFile(UploadedFile $file)
    {
        return $this->uploaderService->upload($file, self::IMAGE_PATH);
    }
}
