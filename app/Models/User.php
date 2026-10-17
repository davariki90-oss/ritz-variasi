<?php

namespace App\Models;

// Perhatian: file ini MENGGANTIKAN app/Models/User.php bawaan Laravel.
// Cukup timpa isi file lama dengan isi ini.

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Catatan: kolom nama pengguna memakai "name" (default Laravel), bukan "nama".
    // Di form/view kita tetap bisa memberi label "Nama" ke pengguna.
    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
