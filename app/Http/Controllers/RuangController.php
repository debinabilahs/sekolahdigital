<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function ruang()
    {
        $data = Ruang::orderBy('id', 'ASC')->paginate(1000);
        return view('admin/mod_master/ruang', compact('data'));
    }
    public function prosesruang(Request $request)
    {
        $request->validate([
            'nama_ruang' => 'required',

        ]);

        $ruang = Ruang::create([
            'nama_ruang' => $request->nama_ruang,

        ]);

        if ($ruang) {
            return redirect('ruang')->with('success', 'Ruang Berhasil Di Buat');
        }
    }

    public function updateruang(Request $request)
    {
        $request->validate([
            'nama_ruang' => 'required',

        ]);

        $ruang = Ruang::where('id', $request->id)->update([
            'nama_ruang' => $request->nama_ruang,

        ]);

        if ($ruang) {
            return redirect('ruang')->with('success', 'Ruang Berhasil Di Update');
        }
    }
    public function hapusRuang(Request $request)
    {
        $del = Ruang::where('id', $request->id)->delete();

        if ($del) {
            return redirect('ruang')->with('success', 'Ruang Berhasil Dihapus.');
        }
    }
}
