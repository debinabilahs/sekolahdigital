<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_soal';
    protected $guarded = [];
}
