<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayarsiswa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rk_bayarsiswa';
    protected $guarded = [];
}
