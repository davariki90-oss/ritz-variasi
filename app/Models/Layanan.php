<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'kategori_layanan_id', 'nama_layanan', 'deskripsi',
        'estimasi_waktu', 'harga_mulai', 'foto', 'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriLayanan::class, 'kategori_layanan_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}
