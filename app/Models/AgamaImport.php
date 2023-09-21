<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgamaImport extends Model
{
    use HasFactory;
    protected $table = 'rs_agama';
    protected $fillable = [
        'nama_agama',
    ];
}
