<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    protected $fillable = [
        'kode_booking', 'user_id', 'layanan_id', 'produk_id',
        'nama_pemesan', 'no_hp', 'merk_mobil', 'tipe_mobil', 'tahun_mobil', 'plat_nomor',
        'tanggal_booking', 'jam_booking', 'catatan', 'status', 'alasan_tolak',
    ];

    protected $casts = [
        'tanggal_booking' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }

    /** Generate kode booking unik, mis. RTZ-20260910-4821 */
    public static function generateKode(): string
    {
        do {
            $kode = 'RTZ-' . now()->format('Ymd') . '-' . random_int(1000, 9999);
        } while (self::where('kode_booking', $kode)->exists());

        return $kode;
    }

    /** Label status dalam Bahasa Indonesia + kelas warna CSS badge */
    public function statusLabel(): array
    {
        return match ($this->status) {
            'menunggu_konfirmasi' => ['Menunggu Konfirmasi', 'status-pending'],
            'diterima'            => ['Diterima', 'status-accepted'],
            'ditolak'             => ['Ditolak', 'status-rejected'],
            'dikerjakan'          => ['Sedang Dikerjakan', 'status-progress'],
            'selesai'             => ['Selesai', 'status-done'],
            default               => [Str::title($this->status), ''],
        };
    }
}
