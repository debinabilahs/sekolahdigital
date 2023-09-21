<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_agama';
    protected $guarded = [];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
