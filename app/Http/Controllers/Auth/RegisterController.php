<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;


class RegisterController extends Controller
{
        /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    // use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('admin.register'); // Gantilah 'auth.register' dengan nama view yang sesuai
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status' => ['required', 'in:active,inactive'],
            'level' => ['required', 'in:user,admin'],
            'blokir' => ['nullable', 'in:Y,N'],
        ]);
    }
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'username' => $data['username'],
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
            'level' => $data['level'],
            'blocked' => $data['blocked'] ?? 'N', // Default value 'N' jika tidak ada input 'blocked'
            // 'blokir' => isset($data['blokir']) && $data['blokir'] === 'Y' ? 'Y' : 'N',
        ]);
    }
    
    
    // // Jika diperlukan, Anda dapat menambahkan logika respons pendaftaran di sini
    // protected function registered(Request $request, $user)
    // {
    //     // Tambahkan logika respons setelah pengguna berhasil mendaftar
    //     // Misalnya, Anda dapat mengarahkan pengguna ke halaman tertentu
    //     return redirect($this->redirectPath());
    // }

    public function register(Request $request)
    {
        // Validasi data pendaftaran di sini
        $this->validator($request->all())->validate();
    
        // Buat pengguna setelah validasi berhasil
        $user = $this->create($request->all());
    
        // Selanjutnya, atur logika untuk pendaftaran pengguna
        auth()->login($user);

        // Redirect pengguna ke halaman beranda setelah pendaftaran berhasil
        return redirect('/home')->with('success', 'Pendaftaran berhasil. Selamat datang!');
    }

}
