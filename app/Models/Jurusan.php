<?php

namespace App\Models;

use App\Models\Detpangkal;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_jurusan';
    protected $guarded = [];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function detpangkal()
    {
        return $this->hasMany(Detpangkal::class);
    }
}
