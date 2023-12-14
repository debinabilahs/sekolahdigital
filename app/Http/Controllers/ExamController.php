<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function exam()
    {
        $data = Exam::orderBy('id', 'ASC')->paginate(1000);
        $mapel = Mapel::all();
        $guru = Guru::all();

        return view('admin/exam/exam', compact('data', 'mapel', 'guru'));
    }
    public function prosesexam(Request $request)
    {
        $request->validate([

            'id_mapel' => 'required',
            'id_guru' => 'required',
        ]);

        $exam = Exam::create([

            'id_mapel' => $request->id_mapel,
            'id_guru' => $request->id_guru,
        ]);

        if ($exam) {
            return redirect('exam')->with('success', 'Exam Berhasil Di Buat');
        }
    }

    public function updateexam(Request $request)
    {
        $request->validate([

            'id_mapel' => 'required',
            'id_guru' => 'required',
        ]);

        $exam = Exam::where('id', $request->id)->update([

            'id_mapel' => $request->id_mapel,
            'id_guru' => $request->id_guru,

        ]);

        if ($exam) {
            return redirect('exam')->with('success', 'Exam Berhasil Di Update');
        }
    }
    public function hapusexam(Request $request)
    {
        $del = Exam::where('id', $request->id)->delete();

        if ($del) {
            return redirect('exam')->with('success', 'Exam Berhasil Dihapus.');
        }
    }

    //  public function exam()
    //  {
    //      $data = DB::select('select * From rs_exam a, rs_mapel b, rs_guru c where a.id_mapel=b.id_mapel and a.id_guru=c.id_guru order by a.id_guru ');
    //      return view('admin/mod_master/exam')-> with('data',$data);
    //  }
    //  public function rekapexam()
    //  {
    //      $data = DB::select('select * From rs_exam order by id_guru');
    //      return view('admin/mod_master/rekapexam')-> with('data',$data);
    //  }
    //  function prosesexam(Request $request){
    //      if (isset($request->simpan))
    //      {
    //          DB::table('rs_exam')->insert([

    //              'id_guru' => $request->id_guru,
    //              'id_mapel' => $request->id_mapel
    //          ]);
    //          return redirect('exam')->with('success', 'Exam Berhasil Di Tambahkan');
    //      }else{
    //          $id = $request->id;
    //          DB::table('rs_exam')
    //            ->where('id_exam', $id)
    //            ->update([ 'id_guru' => $request->id_guru,
    //            'id_mapel' => $request->id_mapel]);
    //            return redirect('exam')->with('success', 'Exam Berhasil Di Edit');
    //      }

    //  }
    //  function hapusexam($id){
    //      $deleted = DB::table('rs_exam')->where('id_exam', $id)->delete();
    //       return redirect('exam')->with('success', 'Exam Berhasil Di Hapus');
    //   }

}
