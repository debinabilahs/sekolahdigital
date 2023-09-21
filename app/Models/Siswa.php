<?php

namespace App\Models;

use App\Models\Agama;
use App\Models\Bayar;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Ruang;
use App\Models\Tp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_siswa';
    protected $guarded = [];

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }

    public function tp()
    {
        return $this->belongsTo(Tp::class, 'id_tp');
    }

    public function bayar()
    {
        return $this->hasMany(Bayar::class);
    }
}
