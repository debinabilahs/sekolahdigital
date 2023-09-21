<?php

namespace App\Models;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstra extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'rs_ekstra';
    protected $guarded = [];

    /**
     * Get the user that owns the Ekstra
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
