<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function kelas()
    {
        $data = Kelas::orderBy('id', 'ASC')->paginate(1000);
        $jurusan = Jurusan::all();

        return view('admin/mod_master/kelas', compact('data', 'jurusan'));
    }
    public function proseskelas(Request $request)
    {
        $request->validate([

            'id_jurusan' => 'required',
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
        ]);

        $kelas = Kelas::create([
            'id_jurusan' => $request->id_jurusan,
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas' => $request->wali_kelas,
        ]);

        if ($kelas) {
            return redirect('kelas')->with('success', 'Kelas Berhasil Di Buat');
        }
    }

    public function updatekelas(Request $request)
    {
        $request->validate([

            'id_jurusan' => 'required',
            'kode_kelas' => 'required',
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',

        ]);

        $kelas = Kelas::where('id', $request->id)->update([

            'id_jurusan' => $request->id_jurusan,
            'kode_kelas' => $request->kode_kelas,
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas' => $request->wali_kelas,

        ]);

        if ($kelas) {
            return redirect('kelas')->with('success', 'Kelas Berhasil Di Update');
        }
    }
    public function hapuskelas(Request $request)
    {
        $del = Kelas::where('id', $request->id)->delete();

        if ($del) {
            return redirect('kelas')->with('success', 'Kelas Berhasil Dihapus.');
        }
    }
}
