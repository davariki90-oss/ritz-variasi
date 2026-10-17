<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function create()
    {
        return view('auth.admin_login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (! Auth::guard('admin')->attempt($credentials)) {
            return back()
                ->withErrors(['username' => 'Username atau password salah.'])
                ->onlyInput('username');
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
