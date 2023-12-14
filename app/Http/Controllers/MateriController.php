<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function materi()
    {
        $data = Materi::orderBy('id', 'ASC')->paginate(1000);
        $mapel = Mapel::all();
        $kelas = Kelas::all();

        return view('admin/akademik/materi', compact('data', 'mapel', 'kelas'));
    }

    public function prosesMateri(Request $request)
    {

        $request->validate([

            'nama_materi' => 'required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'isi' => 'required',
            'file' => 'required|mimes:jpeg,png,pdf',
        ]);
        $fileName = time() . '_' . $request->file('file')->getClientOriginalName();

        $request->file->move(public_path('filemateri/'), $fileName);

        $materi = Materi::create([
            'nama_materi' => $request->nama_materi,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'isi' => $request->isi,
            'file' => $request->file,
        ]);

        if ($materi) {
            return redirect('materi')->with('success', 'Materi Berhasil Di Buat');
        }
    }

    public function updateMateri(Request $request)
    {

        $fileName = $request->fileLama;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $file->move(public_path('filemateri/'), $fileName);
        }

        $materi = Materi::where('id', $request->id)->update([

            'nama_materi' => $request->nama_materi,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'isi' => $request->isi,
            'file' => $fileName,

        ]);

        if ($materi) {
            return redirect('materi')->with('success', 'Materi Berhasil Di Update');
        }
    }

    public function hapusMateri(Request $request)
    {
        $del = materi::where('id', $request->id)->delete();

        if ($del) {
            return redirect('materi')->with('success', 'Materi Berhasil Dihapus.');
        }
    }

    public function lihatMateri($id)
    {
        // Cari data materi berdasarkan ID
        $materi = materi::find($id);

        if (!$materi) {
            // Handle jika materi tidak ditemukan, misalnya dengan redirect atau pesan error
            return redirect('/materi')->with('error', 'Materi tidak ditemukan');
        }

        // Ambil data mapel dan kelas terkait bahan
        $mapel = Mapel::find($materi->id_mapel);
        $kelas = Kelas::find($materi->id_kelas);

        // return view('admin.akademik.lihatmateri', compact('materi', 'mapel', 'kelas'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . "." . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

}
