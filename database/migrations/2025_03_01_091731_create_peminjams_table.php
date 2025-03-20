<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->morphs('peminjam'); // Bisa berisi ID dari guru atau siswa
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->timestamp('pinjam_date')->useCurrent();
            $table->timestamp('kembali_date')->nullable();
            $table->timestamp('kembalinya_date')->nullable(); // Menyimpan kapan barang benar-benar dikembalikan
            $table->string('foto_bukti')->nullable(); // Menyimpan gambar bukti pengembalian
            $table->integer('denda')->nullable(); // Menyimpan jumlah denda jika terlambat mengembalikan
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjams');
    }
};
