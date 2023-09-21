<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $data = User::orderBy('id', 'ASC')->paginate(10);
        return view('admin/mod_master/user', compact('data'));
    }
    public function prosesuser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'level' => 'required',
            'blokir' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([

            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status' => $request->status,
            'level' => $request->level,
            'blokir' => $request->blokir,
            'password' => $request->password,

        ]);

        if ($user) {
            return redirect('user')->with('success', 'User Berhasil Di Buat');
        }
    }

    public function updateuser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'level' => 'required',
            'blokir' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('id', $request->id)->update([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status' => $request->status,
            'level' => $request->level,
            'blokir' => $request->blokir,
            'password' => $request->password,
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
