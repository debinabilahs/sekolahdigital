<?php

namespace App\Imports;

use App\Models\Bayarsiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class BayarSiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bayarsiswa([
            'nis' => row[1],
            'nama_siswa' => row[2],
            'jurusan' => row[3],
            'level' => row[4],
            'kelas' => row[5],
            
        ]);
    }
}
