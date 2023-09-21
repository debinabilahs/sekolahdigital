<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;


class AgamaControllerAPI extends Controller
{
    public function getAgama()
    {
        $data = Agama::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['agama' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Agama']);
        }
    }

    public function showAgama(Request $request)
    {
        $data = Agama::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['agama' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Agama']);
        }
    }

    public function createAgama(Request $request)
    {
        $data = $request->validate([
            'nama_agama' => 'required',
        ]);

        if (Agama::create($data)) {
            return response()->json(['message' => 'Success Create New Agama']);
        } else {
            return response()->json(['message' => 'Failed Create New Agama']);
        }
    }

    public function updateAgama(Request $request, Agama $agama)
    {
        $data = $request->validate([
            'nama_agama' => 'required',
        ]);

        if (Agama::find($agama->id)->update($data)) {
            return response()->json(['message' => 'Success Update Agama']);
        } else {
            return response()->json(['message' => 'Failed Update Agama']);
        }
    }

    public function deleteAgama(Agama $agama)
    {
        if (Agama::destroy($agama->id)) {
            return response()->json(['message' => 'Success Delete Agama']);
        }
        return response()->json(['message' => 'Error Delete Agama']);
    }
    
}
