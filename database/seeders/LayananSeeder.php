<?php

namespace Database\Seeders;

use App\Models\KategoriLayanan;
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $kat = fn ($nama) => KategoriLayanan::where('nama_kategori', $nama)->first()->id;

        // Data layanan asli dari Ritz Variasi Karawang.
        // Kategori & estimasi waktu masih perkiraan — sesuaikan lewat panel admin kalau ada koreksi.
        // Catatan: nomor 4 "Pemasangan Billed" ditulis persis sesuai info dari bengkel,
        // kemungkinan typo (bel/behel) — cek ulang ke pihak bengkel.
        $data = [
            ['kategori_layanan_id' => $kat('Custom / Modifikasi'), 'nama_layanan' => 'Pemasangan Alarm', 'deskripsi' => 'Instalasi sistem alarm keamanan mobil.'],
            ['kategori_layanan_id' => $kat('Audio'), 'nama_layanan' => 'Pemasangan Audio', 'deskripsi' => 'Instalasi sistem audio mobil (speaker, subwoofer, power, dll).'],
            ['kategori_layanan_id' => $kat('Audio'), 'nama_layanan' => 'Pemasangan Head Unit', 'deskripsi' => 'Instalasi head unit android/touchscreen berbagai merk dan tipe.'],
            ['kategori_layanan_id' => $kat('Custom / Modifikasi'), 'nama_layanan' => 'Pemasangan Billed', 'deskripsi' => 'Layanan pemasangan billed. (Nama layanan menunggu konfirmasi ulang dari bengkel.)'],
            ['kategori_layanan_id' => $kat('Custom / Modifikasi'), 'nama_layanan' => 'Pemasangan Central Lock', 'deskripsi' => 'Instalasi sistem central lock (kunci pintu otomatis).'],
            ['kategori_layanan_id' => $kat('Kaca Film'), 'nama_layanan' => 'Pemasangan Kaca Film', 'deskripsi' => 'Pemasangan kaca film untuk kenyamanan dan perlindungan dari panas & UV.'],
        ];

        foreach ($data as $row) {
            Layanan::updateOrCreate(
                ['nama_layanan' => $row['nama_layanan']],
                $row + ['estimasi_waktu' => null, 'harga_mulai' => 0, 'status' => 'aktif']
            );
        }
    }
}
