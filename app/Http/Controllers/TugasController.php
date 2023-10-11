<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function tugas()
    {
        $data = Tugas::orderBy('id', 'ASC')->paginate(10);
        $mapel = Mapel::all();
        $kelas = Kelas::all();

        return view('admin/akademik/tugas', compact('data', 'mapel', 'kelas'));
    }

    public function prosesTugas(Request $request)
    {
        $request->validate([

            'nama_tugas' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
        ]);
        // dd($request);
        $tugas = Tugas::create([
            'nama_tugas' => $request->nama_tugas,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
        ]);

        if ($tugas) {
            return redirect('tugas')->with('success', 'Tugas Berhasil Di Buat');
        }
    }

    public function updateTugas(Request $request)
    {
        $request->validate([

            'nama_tugas' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
        ]);

        $tugas = Tugas::where('id', $request->id)->update([

            'nama_tugas' => $request->nama_tugas,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,


        ]);

        if ($tugas) {
            return redirect('tugas')->with('success', 'Tugas Berhasil Di Update');
        }
    }

    public function hapusTugas(Request $request)
    {
        $del = Tugas::where('id', $request->id)->delete();

        if ($del) {
            return redirect('tugas')->with('success', 'Tugas Berhasil Dihapus.');
        }
    }

    public function lihatTugas($id)
    {
        // Cari data tugas berdasarkan ID
        $tugas = Tugas::find($id);

        if (!$tugas) {
            // Handle jika tugas tidak ditemukan, misalnya dengan redirect atau pesan error
            return redirect('/tugas')->with('error', 'Tugas Materi tidak ditemukan');
        }

        // Ambil data mapel dan kelas terkait bahan
        $mapel = Mapel::find($tugas->id_mapel);
        $kelas = Kelas::find($tugas->id_kelas);

        // return view('admin.akademik.lihattugas', compact('tugas', 'mapel', 'kelas'));
    }

}
