<?php

namespace App\Http\Controllers;

use App\Models\Tp;
use Illuminate\Http\Request;

class TpControllerAPI extends Controller
{
    public function getTp()
    {
        $data = Tp::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['tp' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Tp']);
        }
    }

    public function showTp(Request $request)
    {
        $data = Tp::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['tp' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Tp']);
        }
    }

    public function createTp(Request $request)
    {
        $data = $request->validate([
            'tahun_pelajaran' => 'required',
        ]);

        if (Tp::create($data)) {
            return response()->json(['message' => 'Success Create New Tp']);
        } else {
            return response()->json(['message' => 'Failed Create New Tp']);
        }
    }

    public function updateTp(Request $request, Tp $tp)
    {
        $data = $request->validate([
            'tahun_pelajaran' => 'required',
        ]);

        if (Tp::find($tp->id)->update($data)) {
            return response()->json(['message' => 'Success Update Tp']);
        } else {
            return response()->json(['message' => 'Failed Update Tp']);
        }
    }

    public function deleteTp(Tp $tp)
    {
        if (Tp::destroy($tp->id)) {
            return response()->json(['message' => 'Success Delete Tp']);
        }
        return response()->json(['message' => 'Error Delete Tp']);
    }
}
