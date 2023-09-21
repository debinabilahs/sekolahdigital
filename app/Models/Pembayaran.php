<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rk_pembayaran';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function detpangkal()
    {
        return $this->belongsTo(Detpangkal::class, 'id_pangkal');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
