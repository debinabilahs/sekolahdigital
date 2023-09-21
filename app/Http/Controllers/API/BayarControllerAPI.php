<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use Illuminate\Http\Request;

class BayarControllerAPI extends Controller
{
    public function getBayar()
    {
        $data = Bayar::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['bayar' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Bayar']);
        }
    }

    public function showBayar(Request $request)
    {
        $data = Bayar::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['bayar' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Bayar']);
        }
    }

    public function createBayar(Request $request)
    {
        $data = $request->validate([
            'id_siswa' => 'required',
            'id_det' => 'required',
            'jml_bayar' => 'required',
            'id_users' => 'required',
        ]);

        if (Bayar::create($data)) {
            return response()->json(['message' => 'Success Create New Bayar']);
        } else {
            return response()->json(['message' => 'Failed Create New Bayar']);
        }
    }

    public function updateBayar(Request $request, Bayar $bayar)
    {
        $data = $request->validate([
            'id_siswa' => 'required',
            'id_det' => 'required',
            'jml_bayar' => 'required',
            'id_users' => 'required',
        ]);

        if (Bayar::find($bayar->id)->update($data)) {
            return response()->json(['message' => 'Success Update Bayar']);
        } else {
            return response()->json(['message' => 'Failed Update Bayar']);
        }
    }

    public function deleteBayar(Bayar $bayar)
    {
        if (Bayar::destroy($bayar->id)) {
            return response()->json(['message' => 'Success Delete Bayar']);
        }
        return response()->json(['message' => 'Error Delete Bayar']);
    }
}
