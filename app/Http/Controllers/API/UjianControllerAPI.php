<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianControllerAPI extends Controller
{
    public function getUjian()
    {
        $data = Ujian::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['ujian' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Ujian']);
        }
    }

    public function showUjian(Request $request)
    {
        $data = Ujian::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['ujian' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Ujian']);
        }
    }

    public function createUjian(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            'paket_soal_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_ujian' => 'required',
        ]);

        if (Ujian::create($data)) {
            return response()->json(['message' => 'Success Create New Ujian']);
        } else {
            return response()->json(['message' => 'Failed Create New Ujian']);
        }
    }

    public function updateUjian(Request $request, Ujian $ujian)
    {
        $data = $request->validate([
            'nama' => 'required',
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            'paket_soal_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_ujian' => 'required',
        ]);

        if (Ujian::find($ujian->id)->update($data)) {
            return response()->json(['message' => 'Success Update Ujian']);
        } else {
            return response()->json(['message' => 'Failed Update Ujian']);
        }
    }

    public function deleteUjian(Ujian $ujian)
    {
        if (Ujian::destroy($ujian->id)) {
            return response()->json(['message' => 'Success Delete Ujian']);
        }
        return response()->json(['message' => 'Error Delete Ujian']);
    }
}
