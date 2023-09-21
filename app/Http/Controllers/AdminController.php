<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/login');
    }
    public function cekAdmin(Request $request)
    {

        if (isset($request->login)) {
            $cekLogin = DB::table('users')->where('username', $request->username)->get();
            $ada = $cekLogin->count();

            if ($ada > 0) {
                return redirect('jurusan');
            } else {
                return redirect('jurusan');
            }
        }
        return redirect('jurusan');
    }
    //opsi
    public function opsi()
    {
        $data = DB::select('select * From rs_opsi');
        return view('admin/mod_master/opsi')->with('data', $data);
    }
    public function prosesopsi(Request $request)
    {
        if (isset($request->simpan)) {
            DB::table('rs_opsi')->insert([
                'pil_A' => $request->pil_A,
                'pil_B' => $request->pil_B,
                'pil_C' => $request->pil_C,
                'pil_D' => $request->pil_D,
                'pil_E' => $request->pil_E,

            ]);
            return redirect('opsi')->with('success', 'Opsi Berhasil Di Tambahkan');
        } else {
            $id = $request->id;
            DB::table('rs_opsi')
                ->where('id_opsi', $id)
                ->update([
                    'pil_A' => $request->pil_A,
                    'pil_B' => $request->pil_B,
                    'pil_C' => $request->pil_C,
                    'pil_D' => $request->pil_D,
                    'pil_E' => $request->pil_E,
                ]);
            return redirect('opsi')->with('success', 'Opsi Berhasil Di Edit');
        }
    }
    public function hapusopsi($id)
    {
        $deleted = DB::table('rs_opsi')->where('id_opsi', $id)->delete();
        return redirect('opsi')->with('success', 'Opsi Berhasil Di Hapus');
    }

    //soal
    public function soal()
    {
        $data = DB::select('select * From rs_soal a, rs_exam b,rs_opsi');
        return view('admin/mod_master/soal')->with('data', $data);
    }
    public function rekapsoal()
    {
        $data = DB::select('select * From rs_soal order by id_exam id_opsi');
        return view('admin/mod_master/rekapsoal')->with('data', $data);
    }
    public function prosessoal(Request $request)
    {
        if (isset($request->simpan)) {
            DB::table('rs_soal')->insert([

                'id_exam' => $request->id_exam,
                'id_mapel' => $request->id_mapel,
                'id_guru' => $request->id_guru,
                'desk_soal' => $request->desk_soal,
                'jawaban' => $request->jawaban,
                'id_opsi' => $request->id_opsi,
                'pil_A' => $request->pil_A,
                'pil_B' => $request->pil_B,
                'pil_C' => $request->pil_C,
                'pil_D' => $request->pil_D,
                'pil_E' => $request->pil_E,

            ]);
            return redirect('soal')->with('success', 'Soal Berhasil Di Tambahkan');
        } else {
            $id = $request->id;
            DB::table('rs_soal')
                ->where('id_soal', $id)
                ->update([
                    'id_exam' => $request->id_exam,
                    'id_mapel' => $request->id_mapel,
                    'id_guru' => $request->id_guru,
                    'desk_soal' => $request->desk_soal,
                    'jawaban' => $request->jawaban,
                    'id_opsi' => $request->id_opsi,
                    'pil_A' => $request->pil_A,
                    'pil_B' => $request->pil_B,
                    'pil_C' => $request->pil_C,
                    'pil_D' => $request->pil_D,
                    'pil_E' => $request->pil_E,
                ]);
            return redirect('soal')->with('success', 'Soal Berhasil Di Edit');
        }
    }
    public function hapussoal($id)
    {
        $deleted = DB::table('rs_soal')->where('id_soal', $id)->delete();
        return redirect('soal')->with('success', 'Soal Berhasil Di Hapus');
    }
}
