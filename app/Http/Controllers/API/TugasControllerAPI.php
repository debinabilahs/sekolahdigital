<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasControllerAPI extends Controller
{
    public function getTugas()
    {
        $data = Tugas::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['tugas' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Tugas']);
        }
    }

    public function showTugas(Request $request)
    {
        $data = Tugas::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['tugas' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Tugas']);
        }
    }

    public function createTugas(Request $request)
    {
        $data = $request->validate([
            'judul_tugas' => 'required',
            'status_tugas' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'link_youtube' => 'required',
            'link_drive' => 'required',
            'open_link' => 'required',
            'deskripsi' => 'required',
            'gbr_tugas' => 'required',
            'id_guru' => 'required',
            'id_kelas' => 'required',
        ]);

        if (Tugas::create($data)) {
            return response()->json(['message' => 'Success Create New Tugas']);
        } else {
            return response()->json(['message' => 'Failed Create New Tugas']);
        }
    }

    public function updateTugas(Request $request, Tugas $tugas)
    {
        $data = $request->validate([
            'judul_tugas' => 'required',
            'status_tugas' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'link_youtube' => 'required',
            'link_drive' => 'required',
            'open_link' => 'required',
            'deskripsi' => 'required',
            'gbr_tugas' => 'required',
            'id_guru' => 'required',
            'id_kelas' => 'required',
        ]);

        if (Tugas::find($tugas->id)->update($data)) {
            return response()->json(['message' => 'Success Update Tugas']);
        } else {
            return response()->json(['message' => 'Failed Update Tugas']);
        }
    }

    public function deleteTugas(Tugas $tugas)
    {
        if (Tugas::destroy($tugas->id)) {
            return response()->json(['message' => 'Success Delete Tugas']);
        }
        return response()->json(['message' => 'Error Delete Tugas']);
    }
}
