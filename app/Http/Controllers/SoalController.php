<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\PaketSoal;
use App\Models\SoalJawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SoalController extends Controller
{
    public function soal()
{
    $data = Soal::orderBy('id', 'ASC')->paginate(10);
    $mapel = Mapel::all();
    $kelas = Kelas::all();
    $paketsoal = PaketSoal::all();

    return view('admin.exam.soal', compact('data', 'mapel', 'kelas', 'paketsoal'));
}

public function prosesSoal(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'id_mapel' => 'required',
        'id_kelas' => 'required',
        'paket_soal_id' => 'required',
        'jenis' => 'required',
        'soal' => 'required',
    ]);

    $soal = Soal::create([
        'nama' => $request->nama,
        'id_mapel' => $request->id_mapel,
        'id_kelas' => $request->id_kelas,
        'paket_soal_id' => $request->paket_soal_id, // Ganti dengan 'paket_soal_id'
        'jenis' => $request->jenis,
        'soal' => $request->soal,
    ]);
    echo var_dump($soal);

    if ($request->hasFile('media')) {
        $media_soal = $request->file('media');
        $soal->media = $media_soal->store('media-soal', 'public');
    }

    if ($request->jenis == 'pilihan_ganda') {
        $soal->save();
        $jwb = $request->input('jawaban');
        foreach ($jwb['pilgan'] as $key => $value) {
            $jawaban = new SoalJawaban;
            $jawaban->soal_id = $soal->id;
            $jawaban->jawaban = $value['jawaban'];
            if (!empty($value['media'])) {
                $jawaban->media = $value['media']->store('media-jawaban', 'public');
            }
            // jawaban benar
            if ($jwb['benar'] == $key) {
                $jawaban->status = '1';
            } else {
                $jawaban->status = '0';
            }
            $jawaban->save();
        }
    } elseif ($request->jenis == 'essai') {
        $soal->save();
        $jawaban = new SoalJawaban;
        $jawaban->soal_id = $soal->id;
        $jawaban->jawaban = $request->input('jawaban.essai');
        $jawaban->status = '1';
        $jawaban->save();
    }

    return redirect('/soal')->with('success', 'Soal Berhasil Disimpan');
}


    public function updateSoal(Request $request)
    {
        $request->validate([

        'nama' => 'required',
        'id_mapel' => 'required',
        'id_kelas' => 'required',
        'paket_soal_id' => 'required',
        'jenis' => 'required',
        'soal' => 'required',
        ]);

        $soal = Soal::find($request->id)->update([

        'nama' => $request->nama,
        'id_mapel' => $request->id_mapel,
        'id_kelas' => $request->id_kelas,
        'paket_soal_id' => $request->paket_soal_id, // Ganti dengan 'paket_soal_id'
        'jenis' => $request->jenis,
        'soal' => $request->soal,

        ]);

        if ($soal) {
            return redirect('soal')->with('success', 'Soal Berhasil Di Update');
        }
    }

    public function hapusSoal(Request $request)
    {
        $del = Soal::where('id', $request->id)->delete();

        if ($del) {
            return redirect('soal')->with('success', 'Soal Berhasil Dihapus.');
        }
    }

    public function lihatSoal($id)
    {
        // Cari data soal berdasarkan ID
        $soal = Soal::find($id);

        if (!$soal) {
            // Handle jika soal tidak ditemukan, misalnya dengan redirect atau pesan error
            return redirect('/soal')->with('error', 'Soal Materi tidak ditemukan');
        }

        // Ambil data mapel dan kelas terkait bahan
        $mapel = Mapel::find($soal->id_mapel);
        $kelas = Kelas::find($soal->id_kelas);

        
    }

}
