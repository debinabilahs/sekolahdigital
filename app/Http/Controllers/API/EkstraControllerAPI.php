<?php

namespace App\Http\Controllers;

use App\Models\Ekstra;
use Illuminate\Http\Request;

class EkstraControllerAPI extends Controller
{
    public function getEkstra()
    {
        $data = Ekstra::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['ekstra' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Ekstra']);
        }
    }

    public function showEkstra(Request $request)
    {
        $data = Ekstra::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['ekstra' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Ekstra']);
        }
    }

    public function createEkstra(Request $request)
    {
        $data = $request->validate([
            'judul_ekstra' => 'required',
            'status_ekstra' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'link_youtube' => 'required',
            'link_drive' => 'required',
            'open_link' => 'required',
            'deskripsi' => 'required',
            'id_guru' => 'required',
        ]);

        if (Ekstra::create($data)) {
            return response()->json(['message' => 'Success Create New Ekstra']);
        } else {
            return response()->json(['message' => 'Failed Create New Ekstra']);
        }
    }

    public function updateEkstra(Request $request, Ekstra $ekstra)
    {
        $data = $request->validate([
            'judul_ekstra' => 'required',
            'status_ekstra' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'link_youtube' => 'required',
            'link_drive' => 'required',
            'open_link' => 'required',
            'deskripsi' => 'required',
            'id_guru' => 'required',
        ]);

        if (Ekstra::find($ekstra->id)->update($data)) {
            return response()->json(['message' => 'Success Update Ekstra']);
        } else {
            return response()->json(['message' => 'Failed Update Ekstra']);
        }
    }

    public function deleteEkstra(Ekstra $ekstra)
    {
        if (Ekstra::destroy($ekstra->id)) {
            return response()->json(['message' => 'Success Delete Ekstra']);
        }
        return response()->json(['message' => 'Error Delete Ekstra']);
    }
}
