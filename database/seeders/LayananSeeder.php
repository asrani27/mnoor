<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $layanans = [
            ['kode' => 'LYN001', 'nama' => 'Pelayanan Administrasi'],
            ['kode' => 'LYN002', 'nama' => 'Pelayanan Kesehatan'],
            ['kode' => 'LYN003', 'nama' => 'Pelayanan Pendidikan'],
            ['kode' => 'LYN004', 'nama' => 'Pelayanan Transportasi'],
            ['kode' => 'LYN005', 'nama' => 'Pelayanan Perizinan'],
            ['kode' => 'LYN006', 'nama' => 'Pelayanan Informasi'],
            ['kode' => 'LYN007', 'nama' => 'Pelayanan Sosial'],
            ['kode' => 'LYN008', 'nama' => 'Pelayanan Ekonomi'],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}
