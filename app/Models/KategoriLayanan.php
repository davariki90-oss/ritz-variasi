<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriLayanan extends Model
{
    protected $fillable = ['nama_kategori'];

    public function layanans()
    {
        return $this->hasMany(Layanan::class);
    }

    public function portofolios()
    {
        return $this->hasMany(Portofolio::class);
    }
}
