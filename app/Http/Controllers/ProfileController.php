<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Method untuk menampilkan form edit profil
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(), // Mengambil data pengguna yang sedang login
        ]);
    }

    // Method untuk memperbarui data profil pengguna
    public function update(Request $request)
    {
        // Validasi input dari form edit profil
        $request->validate([
            'name' => 'required|string|max:255', // Nama harus diisi dan berupa string maksimal 255 karakter
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(), // Email harus unik, kecuali milik pengguna saat ini
            'password' => 'nullable|min:8|confirmed', // Password opsional, tetapi jika diisi harus minimal 8 karakter dan cocok dengan konfirmasi
        ]);

        // Mengambil data pengguna yang sedang login
        $user = Auth::user();
        $user->name = $request->name; // Mengupdate nama pengguna
        $user->email = $request->email; // Mengupdate email pengguna

        // Jika password diisi, maka password diperbarui setelah di-hash
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Menyimpan perubahan ke database

        // Redirect ke halaman edit profil dengan pesan status sukses
        return redirect()->route('profile.edit')->with('status', 'Profil berhasil diperbarui.');
    }

    // Method untuk menampilkan halaman profil pengguna
    public function view()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('profile.view', compact('user')); // Mengirimkan data pengguna ke view 'profile.view'
    }
}
