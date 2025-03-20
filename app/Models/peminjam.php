<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Peminjam extends Model
{
    use HasFactory;

    protected $table = 'peminjams'; // Sesuai perubahan tabel

    protected $fillable = [
    'peminjam_id',
    'peminjam_type',
    'barang_id',
    'pinjam_date',
    'kembali_date',
    'kembalinya_date', // Tambahkan ini
    'foto_bukti',      // Tambahkan ini
    'denda',           // Tambahkan ini
    'status',
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

