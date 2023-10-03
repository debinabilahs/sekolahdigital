<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminControllerAPI extends Controller
{
    public function getAdmin()
    {
        $data = Admin::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['admin' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Admin']);
        }
    }

    public function showAdmin(Request $request)
    {
        $data = Admin::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['admin' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Admin']);
        }
    }

    public function createAdmin(Request $request)
    {
        $data = $request->validate([
            'nik' => 'required',
            'nama_admin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'foto' => 'required',
            'aktif_admin' => 'required',
        ]);

        if (Admin::create($data)) {
            return response()->json(['message' => 'Success Create New Admin']);
        } else {
            return response()->json(['message' => 'Failed Create New Admin']);
        }
    }

    public function updateAdmin(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'npsn' => 'required',
            'nama_admin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'foto' => 'required',
            'aktif_admin' => 'required',
        ]);

        if (Admin::find($admin->id)->update($data)) {
            return response()->json(['message' => 'Success Update Admin']);
        } else {
            return response()->json(['message' => 'Failed Update Admin']);
        }
    }

    public function deleteAdmin(Admin $admin)
    {
        if (Admin::destroy($admin->id)) {
            return response()->json(['message' => 'Success Delete Admin']);
        }
        return response()->json(['message' => 'Error Delete Admin']);
    }
}
