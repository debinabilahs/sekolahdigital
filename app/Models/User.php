<?php

namespace App\Models;

use App\Models\Bayar;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    protected $table = 'users';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'username',
        'no_hp',
        'email',
        'password',
        'level',
        'status',
        'blokir',
    ];

    public function bayar(){
        return $this->hasMany(Bayar::class);
    }
}
