<?php

namespace Database\Seeders;

use App\Models\KategoriLayanan;
use App\Models\KategoriProduk;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Interior', 'Eksterior', 'Audio', 'Lampu', 'Kaca Film', 'Custom / Modifikasi'] as $nama) {
            KategoriLayanan::updateOrCreate(['nama_kategori' => $nama]);
        }

        foreach (['Audio', 'Lampu / Lighting', 'Aksesoris Interior', 'Aksesoris Eksterior'] as $nama) {
            KategoriProduk::updateOrCreate(['nama_kategori' => $nama]);
        }
    }
}
