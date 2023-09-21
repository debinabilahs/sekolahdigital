<?php

namespace App\Http\Controllers;

use App\Models\Jawabexam;
use Illuminate\Http\Request;

class JawabexamControllerAPI extends Controller
{
    public function getJawabexam()
    {
        $data = Jawabexam::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['jawabexam' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Jawabexam']);
        }
    }

    public function showJawabexam(Request $request)
    {
        $data = Jawabexam::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['jewabexam' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Jawabexam']);
        }
    }

    public function createJawabexam(Request $request)
    {
        $data = $request->validate([
            'id_soal' => 'required',
            'opsi_jawab' => 'required',
            'id_siswa' => 'required',
        ]);

        if (Jawabexam::create($data)) {
            return response()->json(['message' => 'Success Create New Jawabexam']);
        } else {
            return response()->json(['message' => 'Failed Create New Jawabexam']);
        }
    }

    public function updateJawabexam(Request $request, Jawabexam $jawabexam)
    {
        $data = $request->validate([
            'id_soal' => 'required',
            'opsi_jawab' => 'required',
            'id_siswa' => 'required',
        ]);

        if (Jawabexam::find($jawabexam->id)->update($data)) {
            return response()->json(['message' => 'Success Update Jawabexam']);
        } else {
            return response()->json(['message' => 'Failed Update Jawabexam']);
        }
    }

    public function deleteJawabexam(Jawabexam $jawabexam)
    {
        if (Jawabexam::destroy($jawabexam->id)) {
            return response()->json(['message' => 'Success Delete Jawabexam']);
        }
        return response()->json(['message' => 'Error Delete Jawabexam']);
    }
}
