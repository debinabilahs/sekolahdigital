<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nis'     => $row[0],
            'nisn'     => $row[1],
            'nama_siswa'   => $row[2], 
            'username'     => $row[3],
            'password'     => $row[4],
            'email'        => $row[5],
            'aktif'        => $row[6],
            'gambar'       => $row[7],
            'id_level'     => $row[8],
            'id_kelas'     => $row[9],
            'id_jurusan'   => $row[10],
            'id_ruang'     => $row[11],
            'id_agama'     => $row[12],
            'id_tp'        => $row[13],

        ]);
    }
}
