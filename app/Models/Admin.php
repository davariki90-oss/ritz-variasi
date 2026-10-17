<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['nama', 'username', 'password'];

    protected $hidden = ['password'];

    public function bookingsDiproses()
    {
        return $this->hasMany(Booking::class);
    }
}
