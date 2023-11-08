<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriControllerAPI extends Controller
{
    public function getMateri()
    {
        $data = Materi::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['materi' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Materi']);
        }
    }

    public function showMateri(Request $request)
    {
        $data = Materi::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['materi' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Materi']);
        }
    }

    public function createMateri(Request $request)
    {
        $data = $request->validate([
            'nama_materi' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'isi' => 'required',
            'file' => 'required',
        ]);

        if (Materi::create($data)) {
            return response()->json(['message' => 'Success Create New Materi']);
        } else {
            return response()->json(['message' => 'Failed Create New Materi']);
        }
    }

    public function updateMateri(Request $request, Materi $materi)
    {
        $data = $request->validate([
            'nama_materi' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'isi' => 'required',
            'file' => 'required',
        ]);

        if (Materi::find($materi->id)->update($data)) {
            return response()->json(['message' => 'Success Update Materi']);
        } else {
            return response()->json(['message' => 'Failed Update Materi']);
        }
    }

    public function deleteMateri(Materi $materi)
    {
        if (Materi::destroy($materi->id)) {
            return response()->json(['message' => 'Success Delete Materi']);
        }
        return response()->json(['message' => 'Error Delete Materi']);
    }
}
