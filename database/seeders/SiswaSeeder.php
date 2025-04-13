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
        // siswa::create([
        //     'name' => 'Danu',
        //     'username' => '18767',
        //     'password' => Hash::make('18767'), // Gunakan Hash::make()
        // ]);
        // siswa::create([
        //     'name' => 'Luna',
        //     'username' => '18755',
        //     'password' => Hash::make('18755'), // Gunakan Hash::make()
        // ]);
        // siswa::create([
        //     'name' => 'Adi',
        //     'username' => '18752',
        //     'password' => Hash::make('18752'), // Gunakan Hash::make()
        // ]);
        siswa::create([
            'name' => 'Radit',
            'username' => '18804',
            'password' => Hash::make('18804'),
            'gambar' => 'siswa1.png'
        ]);
    }
}
