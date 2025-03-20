<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\siswa;
use Illuminate\Support\Facades\Hash; // Tambahkan ini

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        siswa::create([
            'name' => 'Lovy',
            'username' => '18758',
            'password' => Hash::make('18758'), // Gunakan Hash::make()
        ]);
    }
}
