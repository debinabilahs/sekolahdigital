<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;


class JurusanController extends Controller
{
    public function jurusan(Request $request)
    {
        $data = Jurusan::orderBy('id', 'ASC')->paginate(10);
        return view('admin/mod_master/jurusan', compact('data'));
    }
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $data  = Jurusan::where('nama', 'LIKE', '%' . $request->search . '%');
        }
    }
    public function prosesjurusan(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required',

        ]);

        $jurusan = Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,

        ]);

        if ($jurusan) {
            return redirect('jurusan')->with('success', 'Jurusan Berhasil Di Buat');
        }
    }

    public function updatejurusan(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required',
        ]);

        $jurusan = Jurusan::where('id', $request->id)->update([
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        if ($jurusan) {
            return redirect('jurusan')->with('success', 'Jurusan Berhasil Di Update');
        }
    }
    public function hapusjurusan(Request $request)
    {
        $del = Jurusan::where('id', $request->id)->delete();

        if ($del) {
            return redirect('jurusan')->with('success', 'Jurusan Berhasil Dihapus.');
        }
    }
}
