<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelControllerAPI extends Controller
{
    public function getLevel()
    {
        $data = Level::orderBy('id', 'ASC')->paginate(10);
        if ($data) {
            return response()->json(['level' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Level']);
        }
    }

    public function showLevel(Request $request)
    {
        $data = Level::where('id', $request->id)->get();
        if ($data) {
            return response()->json(['level' => $data]);
        } else {
            return response()->json(['message' => 'Failed Get Level']);
        }
    }

    public function createLevel(Request $request)
    {
        $data = $request->validate([
            'nama_level' => 'required',
        ]);

        if (Level::create($data)) {
            return response()->json(['message' => 'Success Create New Level']);
        } else {
            return response()->json(['message' => 'Failed Create New Level']);
        }
    }

    public function updateLevel(Request $request, Level $level)
    {
        $data = $request->validate([
            'nama_level' => 'required',
        ]);

        if (Level::find($level->id)->update($data)) {
            return response()->json(['message' => 'Success Update Level']);
        } else {
            return response()->json(['message' => 'Failed Update Level']);
        }
    }

    public function deleteLevel(Level $level)
    {
        if (Level::destroy($level->id)) {
            return response()->json(['message' => 'Success Delete Level']);
        }
        return response()->json(['message' => 'Error Delete Level']);
    }
}
