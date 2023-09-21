<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'username'     => $row[0],
            'nama_lengkap'     => $row[1],
            'email'    => $row[2], 
            'no_hp'     => $row[3],
            'status'     => $row[4],
            'level'     => $row[5],
            'blokir'     => $row[6],
            'password'     => $row[7],
        ]);
    }
    
}
