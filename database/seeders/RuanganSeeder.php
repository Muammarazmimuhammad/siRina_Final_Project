<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{   

    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Ruangan::create([
        'nama' => 'Auditorium Utama',
        'gedung' => 'Gedung B2',
        'lantai' => 1,
        'kapasitas' => 150,
        'tipe' => 'auditorium',
        'fasilitas' => json_encode(['LCD Projector', 'Sound System'])
    ]);

    }

    
}
