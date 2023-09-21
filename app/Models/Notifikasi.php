<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_notifikasi';
    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
