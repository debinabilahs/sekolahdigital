<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahControllerAPI extends Controller
{
    public function getSekolah()
    {
        $data = Sekolah::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['sekolah' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Sekolah']);
        }
    }

    public function showSekolah(Request $request)
    {
        $data = Sekolah::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['sekolah' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Sekolah']);
        }
    }

    public function createSekolah(Request $request)
    {
        $data = $request->validate([
            'npsn' => 'required',
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'maps' => 'required',
            'nama_kepalasekolah' => 'required',
            'nip_kepsek' => 'required',
            'logo_kepsek' => 'required',
            'aktif_sekolah' => 'required',
        ]);

        if (Sekolah::create($data)) {
            return response()->json(['message' => 'Success Create New Sekolah']);
        } else {
            return response()->json(['message' => 'Failed Create New Sekolah']);
        }
    }

    public function updateSekolah(Request $request, Sekolah $sekolah)
    {
        $data = $request->validate([
            'npsn' => 'required',
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'maps' => 'required',
            'nama_kepalasekolah' => 'required',
            'nip_kepsek' => 'required',
            'logo_kepsek' => 'required',
            'aktif_sekolah' => 'required',
        ]);

        if (Sekolah::find($sekolah->id)->update($data)) {
            return response()->json(['message' => 'Success Update Sekolah']);
        } else {
            return response()->json(['message' => 'Failed Update Sekolah']);
        }
    }

    public function deleteSekolah(Sekolah $sekolah)
    {
        if (Sekolah::destroy($sekolah->id)) {
            return response()->json(['message' => 'Success Delete Sekolah']);
        }
        return response()->json(['message' => 'Error Delete Sekolah']);
    }
}
