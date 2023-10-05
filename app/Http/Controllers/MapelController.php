<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function mapel()
    {
        $data = Mapel::orderBy('id', 'ASC')->paginate(5);
        $kelas = Kelas::all();
        return view('admin/akademik/mapel', compact('data', 'kelas'));
    }
    public function prosesmapel(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required',
            'icon_mapel' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'id_kelas' => 'required',
            'kkm' => 'required',
        ]);
        $imageName = time() . '_' . $request->file('icon_mapel')->getClientOriginalName();
        $request->icon_mapel->move(public_path('iconmapel/'), $imageName);

        $mapel = Mapel::create([
            'nama_mapel' => $request->nama_mapel,
            'icon_mapel' => $imageName,
            'id_kelas' => $request->id_kelas,
            'kkm' => $request->kkm,
        ]);

        if ($mapel) {
            return redirect('mapel')->with('success', 'Mapel Berhasil Di Buat');
        }
    }

    public function updatemapel(Request $request)
    {


        $imageName = $request->gambarLama;
        if ($request->hasFile('icon_mapel')) {
            $icon_mapel = $request->file('icon_mapel');
            $imageName = time() . '_' . $request->file('icon_mapel')->getClientOriginalName();
            $icon_mapel->move(public_path('iconmapel/'), $imageName);
        }


        $mapel = Mapel::where('id', $request->id)->update([
            'nama_mapel' => $request->nama_mapel,
            'icon_mapel' =>  $imageName,
            'id_kelas' => $request->id_kelas,
            'kkm' => $request->kkm,
        ]);

        if ($mapel) {
            return redirect('mapel')->with('success', 'Mapel Berhasil Di Update');
        }
    }
    public function hapusMapel(Request $request)
    {
        $del = Mapel::where('id', $request->id)->delete();

        if ($del) {
            return redirect('mapel')->with('success', 'Mapel Berhasil Dihapus.');
        }
    }
}
