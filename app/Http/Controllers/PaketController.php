<?php

namespace App\Http\Controllers;

use App\Models\PaketSoal;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketController extends Controller
{
    public function paket()
    {
        $data = PaketSoal::orderBy('id', 'ASC')->paginate(1000);
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $data = PaketSoal::with(['kelas', 'mapel'])->get();

        return view('admin/exam/paketsoal', compact('data', 'mapel', 'kelas'));
    }

    public function prosesPaket(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'keterangan' => 'required',
            
        ]);

        $kode_paket = strtoupper(Str::random(5));

        $paket = PaketSoal::create([
            'nama' => $request->nama,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'keterangan' => $request->keterangan,
            'kode_paket' => $kode_paket,
        ]);

        if ($paket) {
            return redirect('paketsoal')->with('success', 'Paket Berhasil Di Buat');
        }
    }

    public function updatePaket(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'keterangan' => 'required',
        ]);

        $paket = PaketSoal::where('id', $request->id)->update([

            'nama' => $request->nama,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'keterangan' => $request->keterangan,


        ]);

        if ($paket) {
            return redirect('paketsoal')->with('success', 'Paket Berhasil Di Update');
        }
    }

    public function hapusPaket(Request $request)
    {
        $del = PaketSoal::where('id', $request->id)->delete();

        if ($del) {
            return redirect('paketsoal')->with('success', 'Paket Berhasil Dihapus.');
        }
    }

    public function lihatPaket($id)
    {
        // Cari data paket berdasarkan ID
        $paket = PaketSoal::find($id);

        if (!$paket) {
            // Handle jika paket tidak ditemukan, misalnya dengan redirect atau pesan error
            return redirect('/paketsoal')->with('error', 'Paket Materi tidak ditemukan');
        }

        // Ambil data mapel dan kelas terkait bahan
        $mapel = Mapel::find($paket->id_mapel);
        $kelas = Kelas::find($paket->id_kelas);

        // return view('admin.akademik.lihatpaket', compact('paket', 'mapel', 'kelas'));
    }

}
