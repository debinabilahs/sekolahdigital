<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_pelanggaran';
    protected $guarded = [];
}
