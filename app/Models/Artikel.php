<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['judul', 'slug', 'ringkasan', 'isi', 'foto', 'penulis'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
