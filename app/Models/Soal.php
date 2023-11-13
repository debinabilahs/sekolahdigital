<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    // public $timestamps = false;

    protected $table = 'rs_soal';
    protected $fillable = [
        'id_kelas',
        'id_mapel',
        'paket_soal_id',
        'jenis',
        'nama',
        'soal',
        'media'
      ];
  
      public function kelas() {
          return $this->belongsTo(Kelas::class, 'id_kelas');
      }
  
      public function mapel() {
          return $this->belongsTo(Mapel::class, 'id_mapel');
      }
  
      public function paketsoal() {
          return $this->belongsTo(PaketSoal::class, 'paket_soal_id');
      }
  
      public function soal_jawaban() {
          return $this->hasMany(SoalJawaban::class);
      }
}
