<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranControllerAPI extends Controller
{
    public function getPelanggaran()
    {
        $data = Pelanggaran::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['pelanggaran' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Pelanggaran']);
        }
    }

    public function showPelanggaran(Request $request)
    {
        $data = Pelanggaran::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['pelanggaran' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Pelanggaran']);
        }
    }

    public function createPelanggaran(Request $request)
    {
        $data = $request->validate([
            'kategori_pelanggaran' => 'required',
            'catatan' => 'required',
            'tgl_pelanggaran' => 'required',
            'id_siswa' => 'required',
            'id_guru' => 'required',
        ]);

        if (Pelanggaran::create($data)) {
            return response()->json(['message' => 'Success Create New Jadwal']);
        } else {
            return response()->json(['message' => 'Failed Create New Jadwal']);
        }
    }

    public function updatePelanggaran(Request $request, Pelanggaran $pelanggaran)
    {
        $data = $request->validate([
            'kategori_pelanggaran' => 'required',
            'catatan' => 'required',
            'tgl_pelanggaran' => 'required',
            'id_siswa' => 'required',
            'id_guru' => 'required',
        ]);

        if (Pelanggaran::find($pelanggaran->id)->update($data)) {
            return response()->json(['message' => 'Success Update Pelanggaran']);
        } else {
            return response()->json(['message' => 'Failed Update Pelanggaran']);
        }
    }

    public function deletePelanggaran(Pelanggaran $pelanggaran)
    {
        if (Pelanggaran::destroy($pelanggaran->id)) {
            return response()->json(['message' => 'Success Delete Pelanggaran']);
        }
        return response()->json(['message' => 'Error Delete Pelanggaran']);
    }
}
