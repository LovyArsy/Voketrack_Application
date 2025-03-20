<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class guru extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function peminjams()
{
    return $this->morphMany(Peminjam::class, 'peminjam');
}

}
