<?php

namespace App\Models;

use App\Models\Bayar;
use App\Models\Jurusan;
use App\Models\Tp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detpangkal extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'det_pangkal';
    protected $guarded = [];

    public function tp()
    {
        return $this->belongsTo(Tp::class, 'id_tp');
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function bayar()
    {
        return $this->hasMany(Bayar::class);
    }
}
