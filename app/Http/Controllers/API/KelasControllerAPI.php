<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasControllerAPI extends Controller
{
    public function getKelas()
    {
        $data = Kelas::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['kelas' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Kelas']);
        }
    }

    public function showKelas(Request $request)
    {
        $data = Kelas::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['kelas' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Kelas']);
        }
    }

    public function createKelas(Request $request)
    {
        $data = $request->validate([
            'id_jurusan' => 'required',
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
        ]);

        if (Kelas::create($data)) {
            return response()->json(['message' => 'Success Create New Kelas']);
        } else {
            return response()->json(['message' => 'Failed Create New Kelas']);
        }
    }

    public function updateKelas(Request $request, Kelas $kelas)
    {
        $data = $request->validate([
            'id_jurusan' => 'required',
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
        ]);

        if (Kelas::find($kelas->id)->update($data)) {
            return response()->json(['message' => 'Success Update Kelas']);
        } else {
            return response()->json(['message' => 'Failed Update Kelas']);
        }
    }

    public function deleteKelas(Kelas $kelas)
    {
        if (Kelas::destroy($kelas->id)) {
            return response()->json(['message' => 'Success Delete Kelas']);
        }
        return response()->json(['message' => 'Error Delete Kelas']);
    }
}
