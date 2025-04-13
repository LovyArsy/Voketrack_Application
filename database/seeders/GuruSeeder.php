<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\guru;
use Illuminate\Support\Facades\Hash; // Tambahkan ini

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        guru::create([
            'name' => 'Dennim',
            'username' => '123456',
            'password' => Hash::make('123456'),
            'gambar' => 'guru1.png'
        ]);
    }
}
