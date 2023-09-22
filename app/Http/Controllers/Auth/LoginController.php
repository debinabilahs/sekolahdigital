<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

//login
public function index(){
    if($user = Auth::user()){
        if($user->level == '1'){
            return redirect()->intended('home');
        } elseif($user->level == '2'){
            return redirect()->intended('home');
    }
    // return redirect()->intended('home');
}
return view('admin.login');
}

public function proses(Request $request){
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ],
    [
    'username.required' => 'Username tidak boleh kosong',
    ]
);

$kredensial = $request->only('username', 'password');

if(Auth::attempt($kredensial)){
    $request->session()->regenerate();
    $user = Auth::user();
    if($user->level== '1'){
        return redirect()->intended('home');
    } elseif($user->level == '2'){
        return redirect()->intended('home');
    }

    // if($user){
    //     return redirect()->intended('home');
    // }
    // return redirect()->intended('/');
}

    return back()->withErrors([
        'username' => 'Maaf username atau password anda salah'
    ])->onlyInput('username');
}

public function logout(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}
}
