<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Detpangkal;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class BayarController extends Controller
{
    public function bayar()
    {
        $data = Bayar::orderBy('id', 'ASC')->paginate(10);
        $siswa = Siswa::all();
        $detpangkal = Detpangkal::all();
        $users = User::all();

        return view('admin/transaksi_pembayaran/bayar', compact('data', 'siswa', 'detpangkal', 'users'));
    }
    public function prosesbayar(Request $request)
    {
        $request->validate([

            'id_siswa' => 'required',
            'id_det' => 'required',
            'jml_bayar' => 'required',
            'id_users' => 'required',

        ]);

        $bayar = Bayar::create([

            'id_siswa' => $request->id_siswa,
            'id_det' => $request->id_det,
            'jml_bayar' => $request->jml_bayar,
            'id_users' => $request->id_users,

        ]);

        if ($bayar) {
            return redirect('bayar')->with('success', 'Bayar Berhasil Di Buat');
        }
    }

    public function updatebayar(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_det' => 'required',
            'jml_bayar' => 'required',
            'id_users' => 'required',

        ]);

        $bayar = Bayar::where('id', $request->id)->update([

            'id_siswa' => $request->id_siswa,
            'id_det' => $request->id_det,
            'jml_bayar' => $request->jml_bayar,
            'id_users' => $request->id_users,

        ]);

        if ($bayar) {
            return redirect('bayar')->with('success', 'Bayar Berhasil Di Update');
        }
    }
    public function hapusbayar(Request $request)
    {
        $del = Bayar::where('id', $request->id)->delete();

        if ($del) {
            return redirect('bayar')->with('success', 'Bayar Berhasil Dihapus.');
        }
    }
}
