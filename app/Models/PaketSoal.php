<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketSoal extends Model
{
    protected $table = 'rs_paket_soal';

    protected $fillable = ['nama', 'keterangan', 'id_kelas', 'id_mapel', 'kode_paket'];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function mapel() {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function soal() {
        return $this->hasMany(Soal::class);
    }

    public function ujian() {
        return $this->hasMany(Ujian::class);
    }
}
