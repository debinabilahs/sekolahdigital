<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_mapel';
    protected $guarded = [];

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
