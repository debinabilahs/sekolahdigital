<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawabexam extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_jawabexam';
    protected $guarded = [];
}
