<?php

namespace App\Http\Controllers;

use App\Models\PaketSoal;
use Illuminate\Http\Request;

class PaketSoalControllerAPI extends Controller
{
    public function getPaket()
    {
        $data = PaketSoal::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['paketsoal' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Paket Soal']);
        }
    }

    public function showPaket(Request $request)
    {
        $data = PaketSoal::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['paketsoal' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Paket Soal']);
        }
    }

    public function createPaket(Request $request)
    {
        $data = $request->validate([
            'id_kelas' => 'required',            
            'id_mapel' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        if (PaketSoal::create($data)) {
            return response()->json(['message' => 'Success Create New Paket Soal']);
        } else {
            return response()->json(['message' => 'Failed Create New Paket Soal']);
        }
    }

    public function updatePaket(Request $request, PaketSoal $paketsoal)
    {
        $data = $request->validate([
            'id_kelas' => 'required',            
            'id_mapel' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        if (PaketSoal::find($paketsoal->id)->update($data)) {
            return response()->json(['message' => 'Success Update Paket Soal']);
        } else {
            return response()->json(['message' => 'Failed Update Paket Soal']);
        }
    }

    public function deletePaket(PaketSoal $paketsoal)
    {
        if (PaketSoal::destroy($paketsoal->id)) {
            return response()->json(['message' => 'Success Delete Paket Soal']);
        }
        return response()->json(['message' => 'Error Delete Paket Soal']);
    }
}
