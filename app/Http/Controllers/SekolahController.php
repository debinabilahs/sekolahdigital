<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function sekolah()
    {
        $data = Sekolah::orderBy('id', 'ASC')->paginate(10);
        return view('admin/akademik/sekolah', compact('data'));
    }
    public function prosessekolah(Request $request)
    {
        $request->validate([
            'npsn' => 'required',
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'maps' => 'required',
            'nama_kepalasekolah' => 'required',
            'nip_kepsek' => 'required',
            'logo_kepsek' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'aktif_sekolah' => 'required',

        ]);

        $imageName = time() . '_' . $request->file('logo_kepsek')->getClientOriginalName();

        $request->logo_kepsek->move(public_path('logokepsek/'), $imageName);

        $sekolah = Sekolah::create([

            'npsn' => $request->npsn,
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'maps' => $request->maps,
            'nama_kepalasekolah' => $request->nama_kepalasekolah,
            'nip_kepsek' => $request->nip_kepsek,
            'logo_kepsek' => $imageName,
            'aktif_sekolah' => $request->aktif_sekolah,

        ]);

        if ($sekolah) {
            return redirect('sekolah')->with('success', 'Sekolah Berhasil Di Buat');
        }
    }

    public function updatesekolah(Request $request)
    {

        $imageName = $request->gambarLama;

        if ($request->hasFile('logo_kepsek')) {
            $image = $request->file('logo_kepsek');
            $imageName = time() . '_' . $request->file('logo_kepsek')->getClientOriginalName();
            $image->move(public_path('logokepsek/'), $imageName);
        }
        $sekolah = Sekolah::where('id', $request->id)->update([


            'npsn' => $request->npsn,
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'maps' => $request->maps,
            'nama_kepalasekolah' => $request->nama_kepalasekolah,
            'nip_kepsek' => $request->nip_kepsek,
            'logo_kepsek' => $imageName,
            'aktif_sekolah' => $request->aktif_sekolah,
        ]);

        if ($sekolah) {
            return redirect('sekolah')->with('success', 'Sekolah Berhasil Di Update');
        }
    }
    public function hapussekolah(Request $request)
    {
        $del = Sekolah::where('id', $request->id)->delete();

        if ($del) {
            return redirect('sekolah')->with('success', 'Sekolah Berhasil Dihapus.');
        }
    }
}
