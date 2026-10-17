<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::withCount('bookings')->latest()->paginate(12);

        return view('admin.customer.index', compact('customers'));
    }

    public function show(User $user)
    {
        $user->load(['bookings' => fn ($q) => $q->with(['layanan', 'produk'])->latest()]);

        return view('admin.customer.show', ['customer' => $user]);
    }
}
