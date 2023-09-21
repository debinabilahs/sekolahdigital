<?php

namespace App\Models;

use App\Models\Ekstra;
use App\Models\Exam;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_guru';
    protected $guarded = [];

    public function ekstra()
    {
        return $this->hasMany(Ekstra::class);
    }

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
