<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table = 'rs_ujian';

    protected $fillable = ['id_kelas', 'paket_soal_id', 'id_mapel', 'nama', 'waktu_mulai', 'waktu_ujian', 'token'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function paketsoal()
    {
        return $this->belongsTo(PaketSoal::class, 'paket_soal_id');

    }

    // public function ujian_siswa()
    // {
    //     return $this->hasMany(UjianSiswa::class);
    // }
}
