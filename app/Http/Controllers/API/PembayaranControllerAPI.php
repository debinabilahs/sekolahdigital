<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranControllerAPI extends Controller
{
    public function getPembayaran()
    {
        $data = Pembayaran::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['pembayaran' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Pembayaran']);
        }
    }

    public function showPembayaran(Request $request)
    {
        $data = Pembayaran::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['pembayaran' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Pembayaran']);
        }
    }

    public function createPembayaran(Request $request)
    {
        $data = $request->validate([
            'id_siswa' => 'required',
            'id_pangkal' => 'required',
            'jumlah' => 'required',
            'id_users' => 'required',
            'tgl_bayar' => 'required',
        ]);

        if (Pembayaran::create($data)) {
            return response()->json(['message' => 'Success Create New Pembayaran']);
        } else {
            return response()->json(['message' => 'Failed Create New Pembayaran']);
        }
    }

    public function updatePembayaran(Request $request, Pembayaran $pembayaran)
    {
        $data = $request->validate([
            'id_siswa' => 'required',
            'id_pangkal' => 'required',
            'jumlah' => 'required',
            'id_users' => 'required',
            'tgl_bayar' => 'required',
        ]);

        if (Pembayaran::find($pembayaran->id)->update($data)) {
            return response()->json(['message' => 'Success Update Pembayaran']);
        } else {
            return response()->json(['message' => 'Failed Update Pembayaran']);
        }
    }

    public function deletePembayaran(Pembayaran $pembayaran)
    {
        if (Pembayaran::destroy($pembayaran->id)) {
            return response()->json(['message' => 'Success Delete Pembayaran']);
        }
        return response()->json(['message' => 'Error Delete Pembayaran']);
    }
}
