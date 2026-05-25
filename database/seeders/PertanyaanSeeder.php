<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $pertanyaans = [
            // Pelayanan Administrasi
            ['pertanyaan' => 'Bagaimana pelayanan sikap dan perilaku petugas dalam memberikan pelayanan?', 'layanan_id' => 1],
            ['pertanyaan' => 'Bagaimana pemahaman petugas terhadap prosedur pelayanan?', 'layanan_id' => 1],
            ['pertanyaan' => 'Bagaimana ketersediaan informasi tentang prosedur pelayanan?', 'layanan_id' => 1],
            
            // Pelayanan Kesehatan
            ['pertanyaan' => 'Bagaimana kualitas pelayanan kesehatan yang diberikan?', 'layanan_id' => 2],
            ['pertanyaan' => 'Bagaimana kecepatan waktu pelayanan di fasilitas kesehatan?', 'layanan_id' => 2],
            ['pertanyaan' => 'Bagaimana kemudahan akses ke fasilitas kesehatan?', 'layanan_id' => 2],
            
            // Pelayanan Pendidikan
            ['pertanyaan' => 'Bagaimana kualitas pengajaran di institusi pendidikan?', 'layanan_id' => 3],
            ['pertanyaan' => 'Bagaimana ketersediaan sarana dan prasarana pendidikan?', 'layanan_id' => 3],
            ['pertanyaan' => 'Bagaimana keterbukaan informasi tentang biaya pendidikan?', 'layanan_id' => 3],
            
            // Pelayanan Transportasi
            ['pertanyaan' => 'Bagaimana kenyamanan menggunakan transportasi umum?', 'layanan_id' => 4],
            ['pertanyaan' => 'Bagaimana ketepatan waktu keberangkatan transportasi?', 'layanan_id' => 4],
            ['pertanyaan' => 'Bagaimana keamanan selama menggunakan transportasi?', 'layanan_id' => 4],
            
            // Pelayanan Perizinan
            ['pertanyaan' => 'Bagaimana kemudahan proses pengurusan izin?', 'layanan_id' => 5],
            ['pertanyaan' => 'Bagaimana kejelasan persyaratan pengurusan izin?', 'layanan_id' => 5],
            ['pertanyaan' => 'Bagaimana kecepatan proses penerbitan izin?', 'layanan_id' => 5],
            
            // Pelayanan Informasi
            ['pertanyaan' => 'Bagaimana kualitas informasi yang diberikan?', 'layanan_id' => 6],
            ['pertanyaan' => 'Bagaimana kemudahan mendapatkan informasi yang dibutuhkan?', 'layanan_id' => 6],
            ['pertanyaan' => 'Bagaimana ketepatan informasi yang diberikan?', 'layanan_id' => 6],
            
            // Pelayanan Sosial
            ['pertanyaan' => 'Bagaimana kemudahan akses ke layanan sosial?', 'layanan_id' => 7],
            ['pertanyaan' => 'Bagaimana responsiveness petugas terhadap keluhan?', 'layanan_id' => 7],
            ['pertanyaan' => 'Bagaimana keadilan dalam pemberian bantuan sosial?', 'layanan_id' => 7],
            
            // Pelayanan Ekonomi
            ['pertanyaan' => 'Bagaimana kemudahan akses ke peluang ekonomi?', 'layanan_id' => 8],
            ['pertanyaan' => 'Bagaimana dukungan pemerintah terhadap pelaku ekonomi?', 'layanan_id' => 8],
            ['pertanyaan' => 'Bagaimana kemudahan akses permodalan?', 'layanan_id' => 8],
        ];

        foreach ($pertanyaans as $pertanyaan) {
            Pertanyaan::create($pertanyaan);
        }
    }
}
