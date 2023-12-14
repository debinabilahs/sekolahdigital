<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function jadwal()
    {
        $data = Jadwal::orderBy('id', 'ASC')->paginate(1000);
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $guru = Guru::all();

        return view('admin/akademik/jadwal', compact('data', 'mapel', 'kelas', 'guru'));
    }
    public function prosesjadwal(Request $request)
    {
        $request->validate([

            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'id_guru' => 'required',
        ]);
        // dd($request);
        $jadwal = Jadwal::create([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,
        ]);

        if ($jadwal) {
            return redirect('jadwal')->with('success', 'Jadwal Berhasil Di Buat');
        }
    }

    public function updatejadwal(Request $request)
    {
        $request->validate([

            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'id_guru' => 'required',
        ]);

        $jadwal = Jadwal::where('id', $request->id)->update([

            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,

        ]);

        if ($jadwal) {
            return redirect('jadwal')->with('success', 'Jadwal Berhasil Di Update');
        }
    }
    public function hapusjadwal(Request $request)
    {
        $del = Jadwal::where('id', $request->id)->delete();

        if ($del) {
            return redirect('jadwal')->with('success', 'Jadwal Berhasil Dihapus.');
        }
    }
}
