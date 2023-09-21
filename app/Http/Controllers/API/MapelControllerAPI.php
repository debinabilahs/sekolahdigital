<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelControllerAPI extends Controller
{
    public function getMapel()
    {
        $data = Mapel::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['mapel' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Mapel']);
        }
    }

    public function showMapel(Request $request)
    {
        $data = Mapel::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['mapel' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Mapel']);
        }
    }

    public function createMapel(Request $request)
    {
        $data = $request->validate([
            'nama_mapel' => 'required',
            'icon_mapel' => 'required',
            'id_kelas' => 'required',
            'kkm' => 'required',
        ]);

        if (Mapel::create($data)) {
            return response()->json(['message' => 'Success Create New Mapel']);
        } else {
            return response()->json(['message' => 'Failed Create New Mapel']);
        }
    }

    public function updateMapel(Request $request, Mapel $mapel)
    {
        $data = $request->validate([
            'nama_mapel' => 'required',
            'icon_mapel' => 'required',
            'id_kelas' => 'required',
            'kkm' => 'required',
        ]);

        if (Mapel::find($mapel->id)->update($data)) {
            return response()->json(['message' => 'Success Update Mapel']);
        } else {
            return response()->json(['message' => 'Failed Update Mapel']);
        }
    }

    public function deleteMapel(Mapel $mapel)
    {
        if (Mapel::destroy($mapel->id)) {
            return response()->json(['message' => 'Success Delete Mapel']);
        }
        return response()->json(['message' => 'Error Delete Mapel']);
    }
}
