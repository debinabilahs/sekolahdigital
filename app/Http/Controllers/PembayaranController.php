<?php

namespace App\Http\Controllers;

use App\Models\Detpangkal;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function pembayaran()
    {
        $data = Pembayaran::orderBy('id', 'ASC')->paginate(10);
        $siswa = Siswa::all();
        $detpangkal = Detpangkal::all();
        $users = User::all();

        return view('admin/transaksi_pembayaran/pembayaran', compact('data', 'siswa', 'detpangkal', 'users'));
    }
    public function prosespembayaran(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_pangkal' => 'required',
            'jumlah' => 'required',
            'id_users' => 'required',
            'tgl_bayar' => 'required',
        ]);

        $pembayaran = Pembayaran::create([

            'id_siswa' => $request->id_siswa,
            'id_pangkal' => $request->id_pangkal,
            'jumlah' => $request->jumlah,
            'id_users' => $request->id_users,
            'tgl_bayar' => $request->tgl_bayar,

        ]);

        if ($pembayaran) {
            return redirect('pembayaran')->with('success', 'Pembayaran Berhasil Di Buat');
        }
    }

    public function updatepembayaran(Request $request)
    {
        $request->validate([

            'id_siswa' => 'required',
            'id_pangkal' => 'required',
            'jumlah' => 'required',
            'id_users' => 'required',
            'tgl_bayar' => 'required',
        ]);

        $pembayaran = Pembayaran::where('id', $request->id)->update([

            'id_siswa' => $request->id_siswa,
            'id_pangkal' => $request->id_pangkal,
            'jumlah' => $request->jumlah,
            'id_users' => $request->id_users,
            'tgl_bayar' => $request->tgl_bayar,

        ]);

        if ($pembayaran) {
            return redirect('pembayaran')->with('success', 'Pembayaran Berhasil Di Update');
        }
    }
    public function hapuspembayaran(Request $request)
    {
        $del = Pembayaran::where('id', $request->id)->delete();

        if ($del) {
            return redirect('pembayaran')->with('success', 'Pembayaran Berhasil Dihapus.');
        }
    }
}
