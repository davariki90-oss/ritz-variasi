<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan kategori ini sudah ada di tabel kategori_produks
        // (Anda bisa menambahkannya manual via phpMyAdmin atau tambahkan di KategoriSeeder)
        $kategoriAudio = KategoriProduk::firstOrCreate(['nama_kategori' => 'Audio'])->id;
        $kategoriLampu = KategoriProduk::firstOrCreate(['nama_kategori' => 'Lampu / Lighting'])->id;
        $kategoriAksesoris = KategoriProduk::firstOrCreate(['nama_kategori' => 'Aksesoris Interior'])->id;

        // ---------------------------------------------------------
        // 1. DATA HEAD UNIT / ANDROID (Dari PDF mitra)
        // ---------------------------------------------------------
        $headunits = [
            ['nama' => 'Android AHD 10" 2/32', 'stok' => 1, 'foto' => 'ahd-10.jpg'],
            ['nama' => 'Android AMC 9" 4/64', 'stok' => 3, 'foto' => 'amc.jpg'],
            ['nama' => 'Android Autolab Full HD 4/64', 'stok' => 1, 'foto' => 'autolab.jpg'],
            ['nama' => 'Android Avante Draco', 'stok' => 2, 'foto' => 'avante-draco.jpg'],
            ['nama' => 'Android Avix 9" 2/32', 'stok' => 4, 'foto' => 'avix.jpg'],
            ['nama' => 'Android Cedio CA8 Pro 9" 12/256 Support 360', 'stok' => 1, 'foto' => 'cedio.jpg'],
            ['nama' => 'Android Enigma', 'stok' => 2, 'foto' => 'enigma.jpg'],
            ['nama' => 'Android Microtech', 'stok' => 1, 'foto' => 'microtech.jpg'],
            ['nama' => 'Android Miray S Series', 'stok' => 1, 'foto' => 'miray-s.jpg'],
            ['nama' => 'Android Mobile Tech Quantum Lite 9" 4/64', 'stok' => 2, 'foto' => 'mtech-quantum.jpg'],
            ['nama' => 'Android Nakamichi Legend', 'stok' => 3, 'foto' => 'nakamichi-legend.jpg'],
            ['nama' => 'Android Orca Pro G2', 'stok' => 2, 'foto' => 'orca-pro.jpg'],
            ['nama' => 'Android Orca Standar G2', 'stok' => 2, 'foto' => 'orca-standar.jpg'],
            ['nama' => 'Android Osca 4/64 9"', 'stok' => 3, 'foto' => 'osca.jpg'],
            ['nama' => 'Android Sansui Beta', 'stok' => 4, 'foto' => 'sansui-beta.jpg'],
            ['nama' => 'Android Sansui Classic Series', 'stok' => 4, 'foto' => 'sansui-classic.jpg'],
            ['nama' => 'Android Sansui Duragon', 'stok' => 1, 'foto' => 'sansui-duragon.jpg'],
            ['nama' => 'Android Throne KX 9" 4/64', 'stok' => 0, 'foto' => 'throne.jpg'],
        ];

        foreach ($headunits as $item) {
            Produk::updateOrCreate(
                ['nama_produk' => $item['nama']],
                [
                    'kategori_produk_id' => $kategoriAudio,
                    'deskripsi' => 'Head unit android ' . $item['nama'] . '. Ketersediaan dan harga silakan konfirmasi ke bengkel.',
                    'harga' => 0, // Harga 0 karena belum ada data
                    'stok' => $item['stok'],
                    'foto' => 'produk/' . $item['foto'],
                    'status' => $item['stok'] > 0 ? 'tersedia' : 'habis',
                ]
            );
        }

        // ---------------------------------------------------------
        // 2. DATA LAMPU & BILED (Contoh beberapa dari PDF)
        // ---------------------------------------------------------
        $lampus = [
            ['nama' => 'Lampu Alis AES RGB 60 Cm', 'stok' => 2],
            ['nama' => 'Lampu Alis AES RGB 30 Cm', 'stok' => 5],
            ['nama' => 'Lampu AES 30 Cm non RGB', 'stok' => 7],
            ['nama' => 'Lampu Demon ICC RGB', 'stok' => 4],
            ['nama' => 'Mini Projie LED Y7', 'stok' => 4],
            ['nama' => 'Mini Projie LED Y6', 'stok' => 10],
            ['nama' => 'Biled AES Experience (Single)', 'stok' => 11],
            ['nama' => 'Biled AES Experience (Double)', 'stok' => 5],
            ['nama' => 'Biled AES Lux 3" 3C', 'stok' => 2],
            ['nama' => 'LED DRL AES HURACAN RGB 60CM', 'stok' => 11],
        ];

        foreach ($lampus as $item) {
            Produk::updateOrCreate(
                ['nama_produk' => $item['nama']],
                [
                    'kategori_produk_id' => $kategoriLampu,
                    'deskripsi' => 'Lampu variasi mobil berkualitas.',
                    'harga' => 0,
                    'stok' => $item['stok'],
                    'foto' => null, // Isi jika sudah ada fotonya (contoh: 'produk/lampu-ali.jpg')
                    'status' => $item['stok'] > 0 ? 'tersedia' : 'habis',
                ]
            );
        }

        // ---------------------------------------------------------
        // 3. DATA AUDIO (Speaker, Subwofer, DSP)
        // ---------------------------------------------------------
        $audios = [
            ['nama' => 'DSP MB Quart DSP-M6', 'stok' => 1],
            ['nama' => 'Speaker Coaxial JBL Club 622', 'stok' => 4],
            ['nama' => 'Speaker Split JBL Stage 1 601', 'stok' => 4],
            ['nama' => 'Subkolong JBL Basspro Micro', 'stok' => 0],
            ['nama' => 'Subkolong JBL Club A754', 'stok' => 1],
            ['nama' => 'Subwofer JBL 122 D', 'stok' => 1],
            ['nama' => 'Subwofer Nakamichi', 'stok' => 1],
        ];

        foreach ($audios as $item) {
            Produk::updateOrCreate(
                ['nama_produk' => $item['nama']],
                [
                    'kategori_produk_id' => $kategoriAudio,
                    'deskripsi' => 'Peralatan audio mobil untuk kenyamanan berkendara.',
                    'harga' => 0,
                    'stok' => $item['stok'],
                    'foto' => null,
                    'status' => $item['stok'] > 0 ? 'tersedia' : 'habis',
                ]
            );
        }
    }
}