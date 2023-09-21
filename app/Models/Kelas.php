<?php

namespace App\Models;

use App\Models\Jadwal;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_kelas';

    protected $guarded = [];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

}
