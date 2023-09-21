<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaControllerAPI extends Controller
{
    public function getSiswa()
    {
        $data = Siswa::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['siswa' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Siswa']);
        }
    }

    public function showSiswa(Request $request)
    {
        $data = Siswa::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['siswa' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Siswa']);
        }
    }

    public function createSiswa(Request $request)
    {
        $data = $request->validate([
            'nis' => 'required',
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'aktif' => 'required',
            'gambar' => 'required',
            'id_level' => 'required',
            'id_kelas' => 'required',
            'id_jurusan' => 'required',
            'id_ruang' => 'required',
            'id_agama' => 'required',
            'id_tp' => 'required',
        ]);

        if (Siswa::create($data)) {
            return response()->json(['message' => 'Success Create New Siswa']);
        } else {
            return response()->json(['message' => 'Failed Create New Siswa']);
        }
    }

    public function updateSiswa(Request $request, Siswa $siswa)
    {
        $data = $request->validate([
            'nis' => 'required',
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'aktif' => 'required',
            'gambar' => 'required',
            'id_level' => 'required',
            'id_kelas' => 'required',
            'id_jurusan' => 'required',
            'id_ruang' => 'required',
            'id_agama' => 'required',
            'id_tp' => 'required',
        ]);

        if (Siswa::find($siswa->id)->update($data)) {
            return response()->json(['message' => 'Success Update Siswa']);
        } else {
            return response()->json(['message' => 'Failed Update Siswa']);
        }
    }

    public function deleteSiswa(Siswa $siswa)
    {
        if (Siswa::destroy($siswa->id)) {
            return response()->json(['message' => 'Success Delete Siswa']);
        }
        return response()->json(['message' => 'Error Delete Siswa']);
    }
}
