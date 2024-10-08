<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $users = User::create([
            'first_name'=> $request->firstname,
            'last_name'=>$request->lastname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'user',
            'address'=>'testaddress'
        ]);

        $data['token']= $users->createToken($request->email)->plainTextToken;
        $data['user'] = $users;

        $response = [
            'status' => 'success',
            'message' => 'User is created successfully.',
            'data' => $data,
        ];

        return response()->json($response, 201);

    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            ]);

        if ($validate->fails()){
            return response()->json([
                'status'=> 'failed',
                'message'=>'Error Validate',
                'data' => $validate->errors(),
            ], 403);
        }

        $users = User::where('email', $request->email)->first();

        if (!$users || !Hash::check($request->password, $users->password)){
            return response()->json([
                'status'=>'failed',
                'message'=>'Invalid credits'
            ], 401);
        }

        $data['token'] = $users->createToken($request->email)->plainTextToken;
        $data['user'] = $users;

        $response = [
            'status' => 'success',
            'message' => 'User is logged successfully'
        ];

        return response()->json($response, 200);

    }

    public function logout(Request $request)
    {
        if (auth()->check()){
            $request->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User is logged out successfully'
        ], 200);
        }
        return response()->json(['message' => 'User not authenticated'], 401);
    }
}
