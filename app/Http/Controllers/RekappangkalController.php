<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Rekappangkal;
use App\Models\Tp;
use Illuminate\Http\Request;

class RekappangkalController extends Controller
{
    public function rekappangkal()
    {
        $data = Rekappangkal::orderBy('id', 'ASC')->paginate(10);
        $jurusan = Jurusan::all();
        $tp = Tp::all();

        return view('admin/mod_keuangan/rekappangkal', compact('data', 'jurusan', 'tp'));
    }
    public function prosesRekappangkal(Request $request)
    {
        $request->validate([

            'id_tp' => 'required',
            'id_jurusan' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',

        ]);

        $rekappangkal = Rekappangkal::create([

            'id_tp' => $request->id_tp,
            'id_jurusan' => $request->id_jurusan,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
        ]);

        if ($rekappangkal) {
            return redirect('rekappangkal')->with('success', 'Rekappangkal Berhasil Di Buat');
        }
    }

    public function updateRekappangkal(Request $request)
    {
        $request->validate([
            'id_tp' => 'required',
            'id_jurusan' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
        ]);

        $rekappangkal = Rekappangkal::where('id', $request->id)->update([

            'id_tp' => $request->id_tp,
            'id_jurusan' => $request->id_jurusan,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,

        ]);

        if ($rekappangkal) {
            return redirect('rekappangkal')->with('success', 'Rekappangkal Berhasil Di Update');
        }
    }
    public function hapusrekappangkal(Request $request)
    {
        $del = Rekappangkal::where('id', $request->id)->delete();

        if ($del) {
            return redirect('rekappangkal')->with('success', 'Rekappangkal Berhasil Dihapus.');
        }
    }
}
