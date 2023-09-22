<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_sekolah';
    protected $guarded = [];
}