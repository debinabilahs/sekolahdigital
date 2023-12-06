<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $data = User::orderBy('id', 'ASC')->paginate(10);
        $user = User::all();
        return view('admin.user.user', ['data' => $data, 'user' => $user]);
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
            'password' => 'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d).+$/',
        ]);

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

        if ($user) {
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
