<?php

namespace App\Http\Controllers;

use App\Models\Opsi;
use Illuminate\Http\Request;

class OpsiControllerAPI extends Controller
{
    public function getOpsi()
    {
        $data = Opsi::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['opsi' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Opsi']);
        }
    }

    public function showOpsi(Request $request)
    {
        $data = Opsi::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['opsi' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Opsi']);
        }
    }

    public function createOpsi(Request $request)
    {
        $data = $request->validate([
            'pil_A' => 'required',
            'pil_B' => 'required',
            'pil_C' => 'required',
            'pil_D' => 'required',
            'pil_E' => 'required',
        ]);

        if (Opsi::create($data)) {
            return response()->json(['message' => 'Success Create New Opsi']);
        } else {
            return response()->json(['message' => 'Failed Create New Opsi']);
        }
    }

    public function updateOpsi(Request $request, Opsi $opsi)
    {
        $data = $request->validate([
            'pil_A' => 'required',
            'pil_B' => 'required',
            'pil_C' => 'required',
            'pil_D' => 'required',
            'pil_E' => 'required',
        ]);

        if (Opsi::find($opsi->id)->update($data)) {
            return response()->json(['message' => 'Success Update Opsi']);
        } else {
            return response()->json(['message' => 'Failed Update Opsi']);
        }
    }

    public function deleteOpsi(Opsi $opsi)
    {
        if (Opsi::destroy($opsi->id)) {
            return response()->json(['message' => 'Success Delete Opsi']);
        }
        return response()->json(['message' => 'Error Delete Opsi']);
    }
}
