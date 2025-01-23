<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuhtController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'user_nama' => 'required',
            'user_pass' => 'required',
        ]);

        $credentials = [
            'user_nama' => $request->user_nama,
            'user_pass' => $request->user_pass,
        ];

        $user = User::where('user_nama', $credentials['user_nama'])->first();
        if ($user && Hash::check($credentials['user_pass'], $user->user_pass)) {
            Auth::login($user);
            return redirect('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['user_nama' => 'ID pengguna atau password salah.'])->withInput();
    }
}
