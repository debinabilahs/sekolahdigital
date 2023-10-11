<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;

class BahanControllerAPI extends Controller
{
    public function getBahan()
    {
        $data = Bahan::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['bahan' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Bahan']);
        }
    }

    public function showBahan(Request $request)
    {
        $data = Bahan::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['bahan' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Bahan']);
        }
    }

    public function createBahan(Request $request)
    {
        $data = $request->validate([
            'nama_bahan' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
        ]);

        if (Bahan::create($data)) {
            return response()->json(['message' => 'Success Create New Bahan']);
        } else {
            return response()->json(['message' => 'Failed Create New Bahan']);
        }
    }

    public function updateBahan(Request $request, Bahan $bahan)
    {
        $data = $request->validate([
            'nama_bahan' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
        ]);

        if (Bahan::find($bahan->id)->update($data)) {
            return response()->json(['message' => 'Success Update Bahan']);
        } else {
            return response()->json(['message' => 'Failed Update Bahan']);
        }
    }

    public function deleteBahan(Bahan $bahan)
    {
        if (Bahan::destroy($bahan->id)) {
            return response()->json(['message' => 'Success Delete Bahan']);
        }
        return response()->json(['message' => 'Error Delete Bahan']);
    }
}
