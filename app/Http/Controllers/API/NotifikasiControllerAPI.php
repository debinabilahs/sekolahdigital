<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiControllerAPI extends Controller
{
    public function getNotifikasi()
    {
        $data = Notifikasi::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['notifikasi' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Notifikasi']);
        }
    }

    public function showNotifikasi(Request $request)
    {
        $data = Notifikasi::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['notifikasi' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Notifikasi']);
        }
    }

    public function createNotifikasi(Request $request)
    {
        $data = $request->validate([
            'id_guru' => 'required',
            'kode_notif' => 'required',
        ]);

        if (Notifikasi::create($data)) {
            return response()->json(['message' => 'Success Create New Notifikasi']);
        } else {
            return response()->json(['message' => 'Failed Create New Notifikasi']);
        }
    }

    public function updateNotifikasi(Request $request, Notifikasi $notifikasi)
    {
        $data = $request->validate([
            'id_guru' => 'required',
            'kode_notif' => 'required',
        ]);

        if (Notifikasi::find($notifikasi->id)->update($data)) {
            return response()->json(['message' => 'Success Update Notifikasi']);
        } else {
            return response()->json(['message' => 'Failed Update Notifikasi']);
        }
    }

    public function deleteNotifikasi(Notifikasi $notifikasi)
    {
        if (Notifikasi::destroy($notifikasi->id)) {
            return response()->json(['message' => 'Success Delete Notifikasi']);
        }
        return response()->json(['message' => 'Error Delete Notifikasi']);
    }
}
