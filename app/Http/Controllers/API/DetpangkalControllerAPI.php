<?php

namespace App\Http\Controllers;

use App\Models\Detpangkal;
use Illuminate\Http\Request;

class DetpangkalControllerAPI extends Controller
{
    public function getDetpangkal()
    {
        $data = Detpangkal::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['detpangkal' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Detpangkal']);
        }
    }
    public function showDetpangkal(Request $request)
    {
        $data = Detpangkal::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['detpangkal' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Detpangkal']);
        }
    }
    public function createDetpangkal(Request $request)
    {
        $data = $request->validate([
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'id_tp' => 'required',
            'id_jurusan' => 'required',
        ]);

        if (Detpangkal::create($data)) {
            return response()->json(['message' => 'Success Create New Detpangkal']);
        } else {
            return response()->json(['message' => 'Failed Create New Detpangkal']);
        }
    }
    public function updateDetpangkal(Request $request, Detpangkal $detpangkal)
    {
        $data = $request->validate([
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'id_tp' => 'required',
            'id_jurusan' => 'required',
        ]);

        if (Detpangkal::find($detpangkal->id)->update($data)) {
            return response()->json(['message' => 'Success Update Detpangkal']);
        } else {
            return response()->json(['message' => 'Failed Update Detpangkal']);
        }
    }

    public function deleteDetpangkal(Detpangkal $detpangkal)
    {
        if (Detpangkal::destroy($detpangkal->id)) {
            return response()->json(['message' => 'Success Delete Detpangkal']);
        }
        return response()->json(['message' => 'Error Delete Detpangkal']);
    }
}
