<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    // public function registrasi(RegisterRequest $request)
    // {
    //     $validation = $request->validated();
    //     $validation['password'] = Hash::make($validation['password']);
    //     if (User::where('email', $validation['email'])->exists()) {
    //         return response()->json(
    //             [
    //                 'message' => 'Email sudah terdaftar',
    //             ],
    //             409,
    //         );
    //     }
    //     $user = User::create([
    //         'name' => $validation['name'],
    //         'email' => $validation['email'],
    //         'password' => $validation['password'],
    //     ]);

    //     return response()->json(
    //         [
    //             'message' => 'Registrasi Berhasil',
    //             'data' => $user,
    //         ],
    //         201,
    //     );
    // }

    // public function login(LoginRequest $request)
    // {
    //     // $validation = $request->validated();
    //     $credentials = $request->only('email', 'password');

    //     if (!Auth::attempt($credentials)) {
    //         return response()->json(['message' => 'Invalid credentials'], 401);
    //     }

    //     $user = Auth::user();
    //     $token = $user->createToken('authToken')->plainTextToken;

    //     return response()->json([
    //         'message' => 'Login successful',
    //         'user' => $user,
    //         'token' => $token
    //     ], 200);
    // }

    // public function profile(Request $request)
    // {

    //     return response()->json([
    //         'user' => $request->user()
    //     ], 200);
    // }

    // public function logout(Request $request)
    // {
    //     $request->user()->tokens()->delete();

    //     return response()->json(['message' => 'Logout successful'], 200);
    // }

    public function login()
    {
        return view('Auth.login');
    }

    public function loginAction(Request $request){
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($validation)){
            $request->session()->regenerate();
            return redirect()->intended('/chat');
        }else{
                return redirect('/login')->with('error', 'Login Failed');
        }
            
    }
    public function register()
    {
        return view('Auth/register');
    }

    public function registerAction(Request $request){
        $validation = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:8',
            'password_confirmation' => 'required|same:password'
        ]);

        try{
            $user = User::create([
                'name' => $validation['name'],
                'email' => $validation['email'],
                'password' => Hash::make($validation['password']),
            ]);
            return redirect('/login')->with('success', 'Registrasi Berhasil');
        }catch(Exception $e){
            return redirect('/register')->with('error', 'Registrasi Gagal');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout Berhasil');
    }
}
