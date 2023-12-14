<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;


class AgamaController extends Controller
{
    public function agama()
    {
        $data = Agama::orderBy('id', 'ASC')->paginate(1000);
        return view('admin/mod_master/agama', compact('data'));
    }
    public function prosesagama(Request $request)
    {
        $request->validate([
            'nama_agama' => 'required',
        ]);

        $agama = Agama::create([
            'nama_agama' => $request->nama_agama,
        ]);

        if ($agama) {
            return redirect('agama')->with('success', 'Agama Berhasil Di Buat');
        }
    }

    public function updateagama(Request $request)
    {
        $request->validate([
            'nama_agama' => 'required',
        ]);

        $agama = Agama::where('id', $request->id)->update([
            'nama_agama' => $request->nama_agama,
        ]);

        if ($agama) {
            return redirect('agama')->with('success', 'Agama Berhasil Di Update');
        }
    }
    public function hapusAgama(Request $request)
    {
        $del = Agama::where('id', $request->id)->delete();

        if ($del) {
            return redirect('agama')->with('success', 'Agama Berhasil Dihapus.');
        }
    }
}
