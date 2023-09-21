<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;

class SoalControllerAPI extends Controller
{
    public function getSoal()
    {
        $data = Soal::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['soal' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Soal']);
        }
    }

    public function showSoal(Request $request)
    {
        $data = Soal::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['soal' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Soal']);
        }
    }

    public function createSoal(Request $request)
    {
        $data = $request->validate([
            'id_exam' => 'required',
            'desk_soal' => 'required',
            'jawaban' => 'required',
            'id_opsi' => 'required',
        ]);

        if (Soal::create($data)) {
            return response()->json(['message' => 'Success Create New Soal']);
        } else {
            return response()->json(['message' => 'Failed Create New Soal']);
        }
    }

    public function updateSoal(Request $request, Soal $soal)
    {
        $data = $request->validate([
            'id_exam' => 'required',
            'desk_soal' => 'required',
            'jawaban' => 'required',
            'id_opsi' => 'required',
        ]);

        if (Soal::find($soal->id)->update($data)) {
            return response()->json(['message' => 'Success Update Soal']);
        } else {
            return response()->json(['message' => 'Failed Update Soal']);
        }
    }

    public function deleteSoal(Soal $soal)
    {
        if (Soal::destroy($soal->id)) {
            return response()->json(['message' => 'Success Delete Soal']);
        }
        return response()->json(['message' => 'Error Delete Soal']);
    }
}
