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
            'judul_materi' => 'required',
            'status_materi' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'link_youtube' => 'required',
            'link_drive' => 'required',
            'open_link' => 'required',
            'deskripsi' => 'required',
            'id_guru' => 'required',
            'id_kelas' => 'required',
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
            'judul_materi' => 'required',
            'status_materi' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'link_youtube' => 'required',
            'link_drive' => 'required',
            'open_link' => 'required',
            'deskripsi' => 'required',
            'id_guru' => 'required',
            'id_kelas' => 'required',
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
