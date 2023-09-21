<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_jadualmengajar';
    protected $guarded = [];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
