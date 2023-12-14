<?php

namespace App\Http\Controllers;

use App\Models\Detpangkal;
use App\Models\Jurusan;
use App\Models\Tp;
use Illuminate\Http\Request;

class DetpangkalController extends Controller
{
    public function detpangkal()
    {
        $data = Detpangkal::orderBy('id', 'ASC')->paginate(1000);
        $tp = Tp::all();
        $jurusan = Jurusan::all();

        return view('admin/mod_keuangan/detpangkal', compact('data', 'tp', 'jurusan'));
    }
    public function prosesdetpangkal(Request $request)
    {
        $request->validate([

            'deskripsi' => 'required',
            'jumlah' => 'required',
            'id_tp' => 'required',
            'id_jurusan' => 'required',

        ]);

        $detpangkal = Detpangkal::create([
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'id_tp' => $request->id_tp,
            'id_jurusan' => $request->id_jurusan,
        ]);

        if ($detpangkal) {
            return redirect('detpangkal')->with('success', 'Detpangkal Berhasil Di Buat');
        }
    }

    public function updatedetpangkal(Request $request)
    {
        $request->validate([

            'deskripsi' => 'required',
            'jumlah' => 'required',
            'id_tp' => 'required',
            'id_jurusan' => 'required',

        ]);

        $detpangkal = Detpangkal::where('id', $request->id)->update([

            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'id_tp' => $request->id_tp,
            'id_jurusan' => $request->id_jurusan,

        ]);

        if ($detpangkal) {
            return redirect('detpangkal')->with('success', 'Detpangkal Berhasil Di Update');
        }
    }
    public function hapusdetpangkal(Request $request)
    {
        $del = Detpangkal::where('id', $request->id)->delete();

        if ($del) {
            return redirect('detpangkal')->with('success', 'Detpangkal Berhasil Dihapus.');
        }
    }
    // //pangkal
    // public function pangkal()
    // {
    //     $data = DB::select('select * From det_pangkal a, rs_jurusan b, rs_tp c where a.id_jurusan=b.id_jurusan and a.id_tp=c.id_tp order by a.id_tp ');
    //     return view('admin/mod_master/pangkal')-> with('data',$data);
    // }
    // public function rekapPangkal()
    // {
    //     $data = DB::select('select * From det_pangkal order by id_tp');
    //     return view('admin/mod_master/rekappangkal')-> with('data',$data);
    // }
    // function prosesPangkal(Request $request){
    //     if (isset($request->simpan))
    //     {
    //         DB::table('det_pangkal')->insert([
    //             'deskripsi' => $request->deskripsi,
    //             'jumlah' => $request->jumlah,
    //             'id_tp' => $request->id_tp,
    //             'id_jurusan' => $request->id_jurusan
    //         ]);
    //         return redirect('pangkal')->with('success', 'Pangkal Berhasil Di Tambahkan');
    //     }else{
    //         $id = $request->id;
    //         DB::table('det_pangkal')
    //           ->where('id_pangkal', $id)
    //           ->update(['deskripsi' => $request->deskripsi,
    //           'jumlah' => $request->jumlah,
    //           'id_tp' => $request->id_tp,
    //           'id_jurusan' => $request->id_jurusan]);
    //           return redirect('pangkal')->with('success', 'Pangkal Berhasil Di Edit');
    //     }

    // }
    // function hapusPangkal($id){
    //     $deleted = DB::table('det_pangkal')->where('id_pangkal', $id)->delete();
    //      return redirect('pangkal')->with('success', 'Pangkal Berhasil Di Hapus');
    //  }

}
