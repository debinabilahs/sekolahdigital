<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $data = Admin::orderBy('id', 'ASC')->paginate(10);
        return view('admin/data_pengguna/admin', compact('data'));
    }
    public function prosesadmin(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama_admin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'aktif_admin' => 'required',

        ]);

        $imageName = time() . '_' . $request->file('foto')->getClientOriginalName();

        $request->foto->move(public_path('foto/'), $imageName);

        $admin = Admin::create([

            'nik' => $request->nik,
            'nama_admin' => $request->nama_admin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'foto' => $imageName,
            'aktif_admin' => $request->aktif_admin,

        ]);

        if ($admin) {
            return redirect('admin')->with('success', 'admin Berhasil Di Buat');
        }
    }

    public function updateadmin(Request $request)
    {

        $imageName = $request->gambarLama;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $image->move(public_path('foto/'), $imageName);
        }
        $admin = Admin::where('id', $request->id)->update([


            'nik' => $request->nik,
            'nama_admin' => $request->nama_admin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'foto' => $imageName,
            'aktif_admin' => $request->aktif_admin,
        ]);

        if ($admin) {
            return redirect('admin')->with('success', 'Admin Berhasil Di Update');
        }
    }
    public function hapusadmin(Request $request)
    {
        $del = Admin::where('id', $request->id)->delete();

        if ($del) {
            return redirect('admin')->with('success', 'Admin Berhasil Dihapus.');
        }
    }
}
