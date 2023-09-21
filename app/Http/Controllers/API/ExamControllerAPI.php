<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamControllerAPI extends Controller
{
    public function getExam()
    {
        $data = Exam::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['exam' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Exam']);
        }
    }

    public function showExam(Request $request)
    {
        $data = Exam::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['exam' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Exam']);
        }
    }

    public function createExam(Request $request)
    {
        $data = $request->validate([
            'id_mapel' => 'required',
            'id_guru' => 'required',
            'publish' => 'required',
        ]);

        if (Exam::create($data)) {
            return response()->json(['message' => 'Success Create New Exam']);
        } else {
            return response()->json(['message' => 'Failed Create New Exam']);
        }
    }

    public function updateExam(Request $request, Exam $exam)
    {
        $data = $request->validate([
            'id_mapel' => 'required',
            'id_guru' => 'required',
            'publish' => 'required',
        ]);

        if (Exam::find($exam->id)->update($data)) {
            return response()->json(['message' => 'Success Update Exam']);
        } else {
            return response()->json(['message' => 'Failed Update Exam']);
        }
    }

    public function deleteExam(Exam $exam)
    {
        if (Exam::destroy($exam->id)) {
            return response()->json(['message' => 'Success Delete Exam']);
        }
        return response()->json(['message' => 'Error Delete Exam']);
    }
}
