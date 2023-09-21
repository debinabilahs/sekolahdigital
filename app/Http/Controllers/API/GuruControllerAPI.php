<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruControllerAPI extends Controller
{
    public function getGuru()
    {
        $data = Guru::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['guru' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Guru']);
        }
    }

    public function showGuru(Request $request)
    {
        $data = Guru::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['guru' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Guru']);
        }
    }

    public function createGuru(Request $request)
    {
        $data = $request->validate([
            'nik' => 'required',
            'nama_guru' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'username' => 'required',
            'password' => 'required',
            'foto' => 'required',
            'ttd' => 'required',
            'aktif_guru' => 'required',
        ]);

        if (Guru::create($data)) {
            return response()->json(['message' => 'Success Create New Guru']);
        } else {
            return response()->json(['message' => 'Failed Create New Guru']);
        }
    }

    public function updateGuru(Request $request, Guru $guru)
    {
        $data = $request->validate([
            'nik' => 'required',
            'nama_guru' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'username' => 'required',
            'password' => 'required',
            'foto' => 'required',
            'ttd' => 'required',
            'aktif_guru' => 'required',
        ]);

        if (Guru::find($guru->id)->update($data)) {
            return response()->json(['message' => 'Success Update Guru']);
        } else {
            return response()->json(['message' => 'Failed Update Guru']);
        }
    }

    public function deleteGuru(Guru $guru)
    {
        if (Guru::destroy($guru->id)) {
            return response()->json(['message' => 'Success Delete Guru']);
        }
        return response()->json(['message' => 'Error Delete Guru']);
    }
}
