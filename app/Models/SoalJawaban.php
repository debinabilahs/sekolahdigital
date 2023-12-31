<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoalJawaban extends Model
{
    protected $table = 'rs_soal_jawaban';

    protected $fillable = [
      'jawaban',
      'media',
      'status'
    ];

    public function soal() {
        return $this->belongsTo(Soal::class, 'soal_id');
    }
}
