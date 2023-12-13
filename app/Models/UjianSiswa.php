<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianSiswa extends Model
{
    protected $table = 'rs_ujian_siswa';

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'id_kelas');
    }

    public function ujian() {
        return $this->belongsTo(Ujian::class, 'id_ujian');
    }
}
