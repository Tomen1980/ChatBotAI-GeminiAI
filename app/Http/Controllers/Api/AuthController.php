<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function registrasi(RegisterRequest $request)
    {
        $validation = $request->validated();
        $validation['password'] = Hash::make($validation['password']);
        if (User::where('email', $validation['email'])->exists()) {
            return response()->json(
                [
                    'message' => 'Email sudah terdaftar',
                ],
                409,
            );
        }
        $user = User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => $validation['password'],
        ]);

        return response()->json(
            [
                'message' => 'Registrasi Berhasil',
                'data' => $user,
            ],
            201,
        );
    }

    public function login(LoginRequest $request)
    {
        // $validation = $request->validated();
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    
        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;
    
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function profile(Request $request)
    {
        
        return response()->json([
            'user' => $request->user()
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout successful'], 200);
    }
}
