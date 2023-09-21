<?php

namespace App\Http\Controllers;

use App\Models\Tp;
use Illuminate\Http\Request;

class TpController extends Controller
{
    public function tp()
    {
        $data = Tp::orderBy('id', 'ASC')->paginate(10);
        return view('admin/mod_master/tp', compact('data'));
    }
    public function prosestp(Request $request)
    {
        $request->validate([
            'tahun_pelajaran' => 'required',
        ]);

        $tp = Tp::create([
            'tahun_pelajaran' => $request->tahun_pelajaran,
        ]);

        if ($tp) {
            return redirect('tp')->with('success', 'Tp Berhasil Di Buat');
        }
    }

    public function updatetp(Request $request)
    {
        $request->validate([
            'tahun_pelajaran' => 'required',
        ]);

        $tp = Tp::where('id', $request->id)->update([
            'tahun_pelajaran' => $request->tahun_pelajaran,
        ]);

        if ($tp) {
            return redirect('tp')->with('success', 'Tp Berhasil Di Update');
        }
    }
    public function hapusTp(Request $request)
    {
        $del = Tp::where('id', $request->id)->delete();

        if ($del) {
            return redirect('tp')->with('success', 'Tp Berhasil Dihapus.');
        }
    }
}
