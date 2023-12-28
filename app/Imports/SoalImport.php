<?php

namespace App\Imports;

use App\Models\Soal;
use Maatwebsite\Excel\Concerns\ToModel;

class SoalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Soal([
            'nama' => row[1],
            'kode_paket' => row[2],
            'nama_mapel' => row[3],
            'nama_kelas' => row[4],
            'jenis' => row[5],
            
        ]);
    }
}
