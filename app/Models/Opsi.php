<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_opsi';
    protected $guarded = [];
}
