<?php

namespace App\Http\Controllers;

use App\Models\Tp;
use App\Models\Agama;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Ruang;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function siswa()
    {
        $data = Siswa::orderBy('id', 'ASC')->paginate(10);
        $level = Level::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $ruang = Ruang::all();
        $agama = Agama::all();
        $tp = Tp::all();

        return view('admin/akademik/siswa', compact('data', 'level', 'kelas', 'jurusan', 'ruang', 'agama', 'tp'));
    }
    public function prosesSiswa(Request $request)
    {
        $request->validate([

            'nis' => 'required',
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'aktif' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'id_level' => 'required',
            'id_kelas' => 'required',
            'id_jurusan' => 'required',
            'id_ruang' => 'required',
            'id_agama' => 'required',
            'id_tp' => 'required',

        ]);
        $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('gambarsiswa/'), $imageName);

        $siswa = Siswa::create([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'aktif' => $request->aktif,
            'gambar' => $imageName,
            'id_level' => $request->id_level,
            'id_kelas' => $request->id_kelas,
            'id_jurusan' => $request->id_jurusan,
            'id_ruang' => $request->id_ruang,
            'id_agama' => $request->id_agama,
            'id_tp' => $request->id_tp,
        ]);

        if ($siswa) {
            return redirect('siswa')->with('success', 'Siswa Berhasil Di Buat');
        }
    }

    public function updateSiswa(Request $request)
    {

        $imageName = $request->gambarLama;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $image->move(public_path('gambarsiswa/'), $imageName);
        }


        $siswa = Siswa::where('id', $request->id)->update([

            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'aktif' => $request->aktif,
            'gambar' => $imageName,
            'id_level' => $request->id_level,
            'id_kelas' => $request->id_kelas,
            'id_jurusan' => $request->id_jurusan,
            'id_ruang' => $request->id_ruang,
            'id_agama' => $request->id_agama,
            'id_tp' => $request->id_tp,

        ]);

        if ($siswa) {
            return redirect('siswa')->with('success', 'Siswa Berhasil Di Update');
        }
    }
    public function hapussiswa(Request $request)
    {
        $del = Siswa::where('id', $request->id)->delete();

        if ($del) {
            return redirect('siswa')->with('success', 'Siswa Berhasil Dihapus.');
        }
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('DataSiswa', $namafile);
        Excel::import(new SiswaImport, \public_path('/DataSiswa/' . $namafile));
        return \redirect()->back();
    }
}
