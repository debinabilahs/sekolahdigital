<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(Request $request)
    {
        $data = User::orderBy('id', 'ASC');

        // if ($request->has('search') && !empty($request->get('search'))) {
        //     $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
        //     ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        // }
    
        $data = $data->paginate(1000);
        $user = User::all();
    
        return view('admin.user.user', compact('data', 'user', 'request'));
    }

    public function prosesuser(Request $request)
{
    $request->validate([
        'username' => 'required',
        'name' => 'required',
        'email' => 'required',
        'no_hp' => 'required',
        'status' => 'required',
        'level' => 'required',
        'blokir' => 'required',
        'password' => 'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d).+$/', // password memiliki setidaknya 8 karakter, setidaknya satu karakter huruf, dan setidaknya satu karakter angka.
    ]);

    // Check if the password meets the criteria
    $passwordIsValid = preg_match('/^(?=.*[A-Za-z])(?=.*\d).+$/', $request->password);

    // Hash password sebelum menyimpan ke dalam database
    $hashedPassword = Hash::make($request->password);

    $user = User::create([
        'username' => $request->username,
        'name' => $request->name,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'status' => $request->status,
        'level' => $request->level,
        'blokir' => $request->blokir,
        'password' => $hashedPassword,
    ]);

    if (!$passwordIsValid) {
        return redirect('user')->with('error', 'Password harus memiliki setidaknya 8 karakter, setidaknya satu karakter huruf, dan setidaknya satu karakter angka.');
    } elseif ($user) {
        return redirect('user')->with('success', 'User Berhasil Dibuat');
    }
    
}


    public function updateuser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'level' => 'required',
            'blokir' => 'required',
        ]);

        // Hash password hanya jika ada input password baru
        $hashedPassword = $request->filled('password') ? Hash::make($request->password) : null;

        $user = User::where('id', $request->id)->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status' => $request->status,
            'level' => $request->level,
            'blokir' => $request->blokir,
            'password' => $hashedPassword,
        ]);

        if ($user) {
            return redirect('user')->with('success', 'User Berhasil Di Update');
        }
    }

    public function hapususer(Request $request)
    {
        $del = User::where('id', $request->id)->delete();

        if ($del) {
            return redirect('user')->with('success', 'User Berhasil Dihapus.');
        }
    }

}
