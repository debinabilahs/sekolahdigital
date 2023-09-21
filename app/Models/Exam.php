<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_exam';
    protected $guarded = [];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
