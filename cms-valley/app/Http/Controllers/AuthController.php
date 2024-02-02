<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $token = $user->createToken($request->email)->plainTextToken;


            $response = [
                'token' => $token,
                'message' => "User  Login Successfully",
                'status' => "success"
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => "The provided Credentials are incorrect",
                'status' => "failed"
            ];
            return response()->json($response, 401);
        }
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => "Logout Success",
            'status' => 'success'
        ], 401);
    }
}
