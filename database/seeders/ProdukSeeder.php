<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $kat = fn ($nama) => KategoriProduk::where('nama_kategori', $nama)->first()->id;

        // Produk lampu & aksesoris masih data contoh (belum ada data asli dari bengkel).
        $lainnya = [
            ['kategori_produk_id' => $kat('Lampu / Lighting'), 'nama_produk' => 'Lampu LED Projector H4', 'deskripsi' => 'Sepasang lampu LED projector putih 6000K.', 'harga' => 0, 'stok' => 0],
            ['kategori_produk_id' => $kat('Lampu / Lighting'), 'nama_produk' => 'Lampu Sein LED Dinamis', 'deskripsi' => 'Lampu sein LED berjalan model sequential.', 'harga' => 0, 'stok' => 0],
            ['kategori_produk_id' => $kat('Aksesoris Interior'), 'nama_produk' => 'Karpet Dasar Mobil Premium', 'deskripsi' => 'Karpet dasar bahan kulit anti air, custom sesuai model mobil.', 'harga' => 0, 'stok' => 0],
            ['kategori_produk_id' => $kat('Aksesoris Eksterior'), 'nama_produk' => 'Spoiler Belakang Universal', 'deskripsi' => 'Spoiler belakang model custom, bahan ABS.', 'harga' => 0, 'stok' => 0],
        ];

        // 24 unit head unit android — nama, spek, DAN foto persis dari katalog yang dikirim bengkel.
        // File foto ada di storage/app/public/produk/ (lihat ZIP terpisah foto-produk-headunit.zip).
        // Harga belum tersedia dari mitra: di-set 0, otomatis ditampilkan tanpa label harga di katalog.
        $headunit = [
            ['Miray S Series 9" 6/256', 'miray-s-series-9-6-256.jpg'],
            ['Nakamichi Legend 10" 4/64', 'nakamichi-legend-10-4-64.jpg'],
            ['Throne KX 9" 4/64', 'throne-kx-9-4-64.jpg'],
            ['Avante Phoenix AD-9910', 'avante-phoenix-ad-9910.jpg'],
            ['Osca 9" 4/64', 'osca-9-4-64.jpg'],
            ['Autolab Full HD 4/64', 'autolab-full-hd-4-64.jpg'],
            ['Sansui Ryuu QLED', 'sansui-ryuu-qled.jpg'],
            ['Sansui Duragon Gen 2 QLED', 'sansui-duragon-gen2-qled.jpg'],
            ['AMC Car Android Player', 'amc-car-android-player.jpg'],
            ['Sansui Reguler Series QLED', 'sansui-reguler-series-qled.jpg'],
            ['DCX-880D Standard Series', 'dcx-880d-standard-series.jpg'],
            ['AVIX AX2AND10X13', 'avix-ax2and10x13.jpg'],
            ['Orca Standard G2', 'orca-standard-g2.jpg'],
            ['MTech Sigma Lite MM-8803 2/32', 'mtech-sigma-lite-mm-8803-2-32.jpg'],
            ['Alvante Draco AD-9910', 'alvante-draco-ad-9910.jpg'],
            ['Nakamichi Sagres DSP', 'nakamichi-sagres-dsp.jpg'],
            ['Orca Pro+ G2', 'orca-pro-plus-g2.jpg'],
            ['Enigma EG-1078 QLED 9.5/10.5"', 'enigma-eg-1078-qled.jpg'],
            ['Microtech MC-1225 Polo 2/32', 'microtech-mc-1225-polo-2-32.jpg'],
            ['Cedio CA8 Pro Series 12+256', 'cedio-ca8-pro-series-12-256.jpg'],
            ['AHD-7910 Premium Series', 'ahd-7910-premium-series.jpg'],
            ['MTech Quantum Lite MM-8903 Android 13 4/64', 'mtech-quantum-lite-mm-8903-4-64.jpg'],
            ['Sansui Beta Series QLED', 'sansui-beta-series-qled.jpg'],
            ['Sansui Classic Series QLED NFC', 'sansui-classic-series-qled-nfc.jpg'],
        ];

        foreach ($lainnya as $row) {
            Produk::updateOrCreate(['nama_produk' => $row['nama_produk']], $row + ['status' => 'tersedia']);
        }

        foreach ($headunit as [$nama, $fileFoto]) {
            Produk::updateOrCreate(
                ['nama_produk' => $nama],
                [
                    'kategori_produk_id' => $kat('Audio'),
                    'deskripsi' => 'Head unit android ' . $nama . '. Spesifikasi detail & ketersediaan bisa dikonfirmasi langsung ke bengkel.',
                    'harga' => 0,
                    'stok' => 5,
                    'foto' => 'produk/' . $fileFoto,
                    'status' => 'tersedia',
                ]
            );
        }
    }
}
