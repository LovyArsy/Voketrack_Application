<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class siswa extends Authenticatable
{
    use Notifiable; 


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
