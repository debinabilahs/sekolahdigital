<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalControllerAPI extends Controller
{
    public function getJadwal()
    {
        $data = Jadwal::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['jadwal' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Jadwal']);
        }
    }

    public function showJadwal(Request $request)
    {
        $data = Jadwal::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['jadwal' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Jadwal']);
        }
    }

    public function createJadwal(Request $request)
    {
        $data = $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'id_guru' => 'required',
        ]);

        if (Jadwal::create($data)) {
            return response()->json(['message' => 'Success Create New Jadwal']);
        } else {
            return response()->json(['message' => 'Failed Create New Jadwal']);
        }
    }

    public function updateJadwal(Request $request, Jadwal $jadwal)
    {
        $data = $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'id_guru' => 'required',
        ]);

        if (Jadwal::find($jadwal->id)->update($data)) {
            return response()->json(['message' => 'Success Update Jadwal']);
        } else {
            return response()->json(['message' => 'Failed Update Jadwal']);
        }
    }

    public function deleteJadwal(Jadwal $jadwal)
    {
        if (Jadwal::destroy($jadwal->id)) {
            return response()->json(['message' => 'Success Delete Jadwal']);
        }
        return response()->json(['message' => 'Error Delete Jadwal']);
    }
}
