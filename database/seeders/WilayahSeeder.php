<?php

namespace Database\Seeders;

use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WilayahSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $wilayahs = [
            ['kode' => 'WLY001', 'nama' => 'Kota Surabaya'],
            ['kode' => 'WLY002', 'nama' => 'Kota Malang'],
            ['kode' => 'WLY003', 'nama' => 'Kota Sidoarjo'],
            ['kode' => 'WLY004', 'nama' => 'Kota Gresik'],
            ['kode' => 'WLY005', 'nama' => 'Kabupaten Pasuruan'],
            ['kode' => 'WLY006', 'nama' => 'Kabupaten Mojokerto'],
            ['kode' => 'WLY007', 'nama' => 'Kota Batu'],
            ['kode' => 'WLY008', 'nama' => 'Kabupaten Jombang'],
        ];

        foreach ($wilayahs as $wilayah) {
            Wilayah::create($wilayah);
        }
    }
}
