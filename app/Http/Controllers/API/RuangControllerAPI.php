<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangControllerAPI extends Controller
{
    public function getRuang()
    {
        $data = Ruang::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['ruang' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Ruang']);
        }
    }

    public function showRuang(Request $request)
    {
        $data = Ruang::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['ruang' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Ruang']);
        }
    }

    public function createRuang(Request $request)
    {
        $data = $request->validate([
            'nama_ruang' => 'required',
        ]);

        if (Ruang::create($data)) {
            return response()->json(['message' => 'Success Create New Ruang']);
        } else {
            return response()->json(['message' => 'Failed Create New Ruang']);
        }
    }

    public function updateRuang(Request $request, Ruang $ruang)
    {
        $data = $request->validate([
            'nama_ruang' => 'required',
        ]);

        if (Ruang::find($ruang->id)->update($data)) {
            return response()->json(['message' => 'Success Update Ruang']);
        } else {
            return response()->json(['message' => 'Failed Update Ruang']);
        }
    }

    public function deleteRuang(Ruang $ruang)
    {
        if (Ruang::destroy($ruang->id)) {
            return response()->json(['message' => 'Success Delete Ruang']);
        }
        return response()->json(['message' => 'Error Delete Ruang']);
    }
}
