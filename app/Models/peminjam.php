<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Peminjam extends Model
{
    use HasFactory;

    protected $table = 'peminjams'; 

    protected $fillable = [
    'peminjam_id',
    'peminjam_type',
    'barang_id',
    'pinjam_date',
    'kembali_date',
    'kembalinya_date', 
    'foto_bukti',      
    'denda',           
    'status',
    'jumlah',
];


    public function peminjam(): MorphTo
    {
        return $this->morphTo();
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}

