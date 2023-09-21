<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function loginApi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        // $user = User::where('email', $request->email)->first();

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }

        // return $user->createToken('user login')->plainTextToken;
        // Proses autentikasi user
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            return redirect()->intended('/home');
        } else {
            // Autentikasi gagal
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }
    }

    public function logoutApi(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

    }
}
