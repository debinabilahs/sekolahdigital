<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru()
    {
        $data = Guru::orderBy('id', 'ASC')->paginate(1000);
        return view('admin/data_pengguna/guru', compact('data'));
    }
    public function prosesguru(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama_guru' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'username' => 'required',
            'password' => 'required',
            'aktif_guru' => 'required',
            'ttd' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',

        ]);

        $imageName = time() . '_' . $request->file('foto')->getClientOriginalName();

        $request->foto->move(public_path('fotoguru/'), $imageName);

        $guru = Guru::create([

            'nik' => $request->nik,
            'nama_guru' => $request->nama_guru,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'username' => $request->username,
            'password' => $request->password,
            'aktif_guru' => $request->aktif_guru,
            'ttd' => $request->ttd,
            'foto' => $imageName,

        ]);

        if ($guru) {
            return redirect('guru')->with('success', 'Guru Berhasil Di Buat');
        }
    }

    public function updateguru(Request $request)
    {

        $imageName = $request->gambarLama;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $image->move(public_path('fotoguru/'), $imageName);
        }

        $guru = Guru::where('id', $request->id)->update([

            'nik' => $request->nik,
            'nama_guru' => $request->nama_guru,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'username' => $request->username,
            'password' => $request->password,
            'aktif_guru' => $request->aktif_guru,
            'ttd' => $request->ttd,
            'foto' => $imageName,

        ]);

        if ($guru) {
            return redirect('guru')->with('success', 'Guru Berhasil Di Update');
        }
    }
    public function hapusguru(Request $request)
    {
        $del = Guru::where('id', $request->id)->delete();

        if ($del) {
            return redirect('guru')->with('success', 'Guru Berhasil Dihapus.');
        }
    }
    //    public function guru()
    //  {
    //      $data = DB::select('select * From rs_guru');
    //      return view('admin/mod_master/guru')-> with('data',$data);
    //  }
    //  function prosesGuru(Request $request){
    //      if (isset($request->simpan))
    //      {
    //          DB::table('rs_guru')->insert([
    //              'nik' => $request->nik,
    //              'nama_guru' => $request->nama_guru,
    //              'no_hp' => $request->no_hp,
    //              'email' => $request->email,
    //              'tmp_lahir' => $request->tmp_lahir,
    //              'tgl_lahir' => $request->tgl_lahir,
    //              'username' => $request->username,
    //              'password' => $request->password,
    //              'aktif_guru' => $request->aktif_guru,
    //              'ttd' => $request->ttd,
    //              'foto' => $request->foto

    //          ]);

    //          return redirect('guru')->with('success', 'Guru Berhasil Di Tambahkan');
    //      }else{
    //          $id = $request->id;
    //          DB::table('rs_guru')
    //            ->where('id', $id)
    //            ->update(['nik' => $request->nik,
    //            'nama_guru' => $request->nama_guru,
    //            'no_hp' => $request->no_hp,
    //            'email' => $request->email,
    //            'tmp_lahir' => $request->tmp_lahir,
    //            'tgl_lahir' => $request->tgl_lahir,
    //            'username' => $request->username,
    //            'password' => $request->password,
    //            'aktif_guru' => $request->aktif_guru,
    //            'ttd' => $request->ttd,
    //            'foto' => $request->foto
    //         ]);

    //            return redirect('guru')->with('success', 'Guru Berhasil Di Edit');
    //      }

    //  }
    //  function hapusGuru($id){
    //      $deleted = DB::table('rs_guru')->where('id', $id)->delete();
    //       return redirect('guru')->with('success', 'Guru Berhasil Di Hapus');
    //   }
}
