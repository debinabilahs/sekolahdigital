<?php

namespace App\Models;

use App\Models\Detpangkal;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tp extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_tp';
    protected $guarded = [];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function detpangkal()
    {
        return $this->hasOne(Detpangkal::class);
    }
}
