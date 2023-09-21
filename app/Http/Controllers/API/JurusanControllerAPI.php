<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanControllerAPI extends Controller
{
    public function getJurusan()
    {
        $data = Jurusan::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['jurusan' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Jurusan']);
        }
    }

    public function showJurusan(Request $request)
    {
        $data = Jurusan::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['jurusan' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Jurusan']);
        }
    }

    public function createJurusan(Request $request)
    {
        $data = $request->validate([
            'nama_jurusan' => 'required',
        ]);

        if (Jurusan::create($data)) {
            return response()->json(['message' => 'Success Create New Jurusan']);
        } else {
            return response()->json(['message' => 'Failed Create New Jurusan']);
        }
    }

    public function updateJurusan(Request $request, Jurusan $jurusan)
    {
        $data = $request->validate([
            'nama_jurusan' => 'required',
        ]);

        if (Jurusan::find($jurusan->id)->update($data)) {
            return response()->json(['message' => 'Success Update Jurusan']);
        } else {
            return response()->json(['message' => 'Failed Update Jurusan']);
        }
    }

    public function deleteJurusan(Jurusan $jurusan)
    {
        if (Jurusan::destroy($jurusan->id)) {
            return response()->json(['message' => 'Success Delete Jurusan']);
        }
        return response()->json(['message' => 'Error Delete Jurusan']);
    }
}
