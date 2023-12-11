<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\PaketSoal;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UjianController extends Controller
{
    public function ujian(Request $request)
    {

        $data = Ujian::with(['kelas', 'mapel', 'paketsoal'])->orderBy('id', 'ASC')->paginate(10);
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $paketsoal = PaketSoal::all();
        return view('admin.exam.ujian', compact('data', 'mapel', 'kelas', 'paketsoal'));

    }

    public function prosesUjian(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            'paket_soal_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_ujian' => 'required',
        ]);

        $token = strtoupper(Str::random(8));

        Ujian::create([
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'id_mapel' => $request->id_mapel,
            'paket_soal_id' => $request->paket_soal_id, // Ganti dengan 'paket_soal_id'
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_ujian' => $request->waktu_ujian,
            'token' => $token,
        ]);

        return redirect('/ujian')->with('success', 'Ujian Berhasil Disimpan');
    }

    public function hapusUjian(Request $request)
    {
        $del = Ujian::where('id', $request->id)->delete();

        if ($del) {
            return redirect('ujian')->with('success', 'Ujian Berhasil Dihapus.');
        }
    }

}
