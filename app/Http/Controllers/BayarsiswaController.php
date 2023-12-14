<?php

namespace App\Http\Controllers;

use App\Models\Bayarsiswa;
use Illuminate\Http\Request;

class BayarsiswaController extends Controller
{
    public function bayarsiswa()
    {
        $data = Bayarsiswa::orderBy('id', 'ASC')->paginate(1000);
        return view('admin/transaksi_pembayaran/bayarsiswa', compact('data',));
    }
    public function prosesbayarsiswa(Request $request)
    {
        $request->validate([

            'nis' => 'required',
            'nama_siswa' => 'required',
            'jurusan' => 'required',
            'level' => 'required',
            'kelas' => 'required',

        ]);

        $bayarsiswa = Bayarsiswa::create([

            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jurusan' => $request->jurusan,
            'level' => $request->level,
            'kelas' => $request->kelas,

        ]);

        if ($bayarsiswa) {
            return redirect('bayarsiswa')->with('success', 'Bayarsiswa Berhasil Di Buat');
        }
    }

    public function updatebayarsiswa(Request $request)
    {
        $request->validate([

            'nis' => 'required',
            'nama_siswa' => 'required',
            'jurusan' => 'required',
            'level' => 'required',
            'kelas' => 'required',

        ]);

        $bayarsiswa = Bayarsiswa::where('id', $request->id)->update([

            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jurusan' => $request->jurusan,
            'level' => $request->level,
            'kelas' => $request->kelas,


        ]);

        if ($bayarsiswa) {
            return redirect('bayarsiswa')->with('success', 'Bayarsiswa Berhasil Di Update');
        }
    }
    public function hapusbayarsiswa(Request $request)
    {
        $del = Bayarsiswa::where('id', $request->id)->delete();

        if ($del) {
            return redirect('bayarsiswa')->with('success', 'Bayarsiswa Berhasil Dihapus.');
        }
    }
}
