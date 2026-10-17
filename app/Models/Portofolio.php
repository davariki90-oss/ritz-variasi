<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $fillable = [
        'kategori_layanan_id', 'judul', 'deskripsi', 'foto_sebelum', 'foto_sesudah',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriLayanan::class, 'kategori_layanan_id');
    }
}
