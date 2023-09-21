<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function notifikasi()
    {
        $data = Notifikasi::orderBy('id', 'ASC')->paginate(10);
        $guru = Guru::all();

        return view('admin/mod_master/notifikasi', compact('data', 'guru'));
    }
    public function prosesnotifikasi(Request $request)
    {
        $request->validate([

            'id_guru' => 'required',
            'kode_notif' => 'required',

        ]);

        $notifikasi = Notifikasi::create([
            'id_guru' => $request->id_guru,
            'kode_notif' => $request->kode_notif,

        ]);

        if ($notifikasi) {
            return redirect('notifikasi')->with('success', 'Notifikasi Berhasil Di Buat');
        }
    }

    public function updatenotifikasi(Request $request)
    {
        $request->validate([

            'id_guru' => 'required',
            'kode_notif' => 'required',

        ]);

        $notifikasi = Notifikasi::where('id', $request->id)->update([

            'id_guru' => $request->id_guru,
            'kode_notif' => $request->kode_notif,

        ]);

        if ($notifikasi) {
            return redirect('notifikasi')->with('success', 'Notifikasi Berhasil Di Update');
        }
    }
    public function hapusnotifikasi(Request $request)
    {
        $del = Notifikasi::where('id', $request->id)->delete();

        if ($del) {
            return redirect('notifikasi')->with('success', 'Notifikasi Berhasil Dihapus.');
        }
    }
}
