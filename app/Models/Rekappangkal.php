<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekappangkal extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rekap_pangkal';
    protected $guarded = [];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function tp()
    {
        return $this->belongsTo(Tp::class, 'id_tp');
    }
}
