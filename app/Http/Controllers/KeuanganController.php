<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    public function bayarSiswa()
    {
        $data = DB::select('select * From rs_siswa a, rs_level b, rs_kelas c, rs_jurusan d where a.id_jurusan=d.id_jurusan and a.id_level=b.id_level and a.id_kelas=c.id_kelas');
        return view('admin/mod_keuangan/bayar')->with('data', $data);
    }
    public function prosesBayar(Request $request)
    {
        if (isset($request->simpan)) {
            DB::table('rk_pembayaran')->insert([
                'id_siswa' => $request->id_siswa,
                'tgl_bayar' => $request->tgl_bayar,
                'id_pangkal' => $request->id_pangkal,
                'jumlah' => $request->jumlah,
                'id_users' => '1',
            ]);
            return redirect('bayarSiswa');
        } else {
            $id = $request->id;
            DB::table('rs_jurusan')
                ->where('id_jurusan', $id)
                ->update(['id_siswa' => $request->id_siswa,
                    'tgl_bayar' => $request->tgl_bayar,
                    'id_pangkal' => $request->id_pangkal,
                    'jumlah' => $request->jumlah,
                    'id_users' => '1']);
            return redirect('bayarSiswa');
        }

    }
    public function hapusBayar($id)
    {
        $deleted = DB::table('rk_pembayaran')->where('id_pembayaran', $id)->delete();
        return redirect('bayarSiswa');
    } //
}
