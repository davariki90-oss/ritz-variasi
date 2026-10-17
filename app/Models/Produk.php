<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'kategori_produk_id', 'nama_produk', 'deskripsi',
        'harga', 'stok', 'foto', 'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeTersedia($query)
    {
        return $query->where('status', 'tersedia');
    }
}
