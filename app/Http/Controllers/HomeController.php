<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Detpangkal;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $guru = Guru::count();
        $siswa = Siswa::count();
        $detpangkal = Detpangkal::count();
        $pembayaran = Pembayaran::count();
        $tkj = Detpangkal::count();
        $rpl = Detpangkal::count();
        $tkr = Detpangkal::count();
        $tbsm = Detpangkal::count();
        $titl = Detpangkal::count();
        //pembayaran
        $date = date('y-m-d');
        $pem_jan = Pembayaran::whereMonth('tgl_bayar', '01')->count();
        $pem_feb = Pembayaran::whereMonth('tgl_bayar', '02')->count();
        $pem_mar = Pembayaran::whereMonth('tgl_bayar', '03')->count();
        $pem_apr = Pembayaran::whereMonth('tgl_bayar', '04')->count();
        $pem_mei = Pembayaran::whereMonth('tgl_bayar', '05')->count();
        $pem_jun = Pembayaran::whereMonth('tgl_bayar', '06')->count();
        $pem_jul = Pembayaran::whereMonth('tgl_bayar', '07')->count();
        $pem_agu = Pembayaran::whereMonth('tgl_bayar', '08')->count();
        $pem_sep = Pembayaran::whereMonth('tgl_bayar', '09')->count();
        $pem_okt = Pembayaran::whereMonth('tgl_bayar', '10')->count();
        $pem_nov = Pembayaran::whereMonth('tgl_bayar', '11')->count();
        $pem_des = Pembayaran::whereMonth('tgl_bayar', '12')->count();

        return view('admin.home', compact(
            'guru',
            'siswa',
            'detpangkal',
            'pembayaran',
            'tkj',
            'rpl',
            'tkr',
            'tbsm',
            'titl',

            'pem_jan',
            'pem_feb',
            'pem_mar',
            'pem_apr',
            'pem_mei',
            'pem_jun',
            'pem_jul',
            'pem_agu',
            'pem_sep',
            'pem_okt',
            'pem_nov',
            'pem_des',

        ));
    }
}
