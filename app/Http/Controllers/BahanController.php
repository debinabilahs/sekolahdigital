<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    public function bahan()
    {
        $data = bahan::orderBy('id', 'ASC')->paginate(10);
        $mapel = Mapel::all();
        $kelas = Kelas::all();

        return view('admin/akademik/bahan', compact('data', 'mapel', 'kelas'));
    }

    public function prosesBahan(Request $request)
    {
        $request->validate([

            'nama_materi' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
        ]);
        // dd($request);
        $bahan = Bahan::create([
            'nama_materi' => $request->nama_materi,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
        ]);

        if ($bahan) {
            return redirect('bahan')->with('success', 'Bahan Berhasil Di Buat');
        }
    }

    public function updateBahan(Request $request)
    {
        $request->validate([

            'nama_materi' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
        ]);

        $bahan = Bahan::where('id', $request->id)->update([

            'nama_materi' => $request->nama_materi,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,


        ]);

        if ($bahan) {
            return redirect('bahan')->with('success', 'Bahan Berhasil Di Update');
        }
    }

    public function hapusBahan(Request $request)
    {
        $del = Bahan::where('id', $request->id)->delete();

        if ($del) {
            return redirect('bahan')->with('success', 'Bahan Berhasil Dihapus.');
        }
    }


    public function lihatBahan(Request $request)
    {
        $request->validate([

            'nama_mapel' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            
        ]);

        $bahan = Bahan::where('id', $request->id)->get([

            'nama_mapel' => $request->nama_mapel,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,

        ]);

        // Pastikan bahan ditemukan
        if (!$bahan) {
            return redirect('bahan')->with('error', 'Bahan Materi tidak ditemukan.');
        }

        // Tampilkan halaman lihat bahan dengan data bahan yang dipilih
        // return view('admin/akademik/lihatbahan', compact('bahan'));
    }
}
