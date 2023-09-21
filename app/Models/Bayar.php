<?php

namespace App\Models;

use App\Models\Detpangkal;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rk_bayar';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function detpangkal()
    {
        return $this->belongsTo(Detpangkal::class, 'id_det');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
