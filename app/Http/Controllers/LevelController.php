<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function level()
    {
        $data = Level::orderBy('id', 'ASC')->paginate(1000);
        return view('admin/user/level', compact('data'));
    }
    public function proseslevel(Request $request)
    {
        $request->validate([
            'nama_level' => 'required',
        ]);

        $level = Level::create([
            'nama_level' => $request->nama_level,
        ]);

        if ($level) {
            return redirect('level')->with('success', 'Level Berhasil Di Buat');
        }
    }

    public function updatelevel(Request $request)
    {
        $request->validate([
            'nama_level' => 'required',
        ]);

        $level = Level::where('id', $request->id)->update([
            'nama_level' => $request->nama_level,
        ]);

        if ($level) {
            return redirect('level')->with('success', 'Level Berhasil Di Update');
        }
    }
    public function hapusLevel(Request $request)
    {
        $del = Level::where('id', $request->id)->delete();

        if ($del) {
            return redirect('level')->with('success', 'Level Berhasil Dihapus.');
        }
    }
}
