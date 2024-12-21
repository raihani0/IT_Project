<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\History; // Mengimpor model History untuk mencatat riwayat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesaController extends Controller
{
    // Menampilkan daftar desa
    public function index()
    {
        $desa = Desa::withCount('penduduk')->get(); // Mengambil data desa beserta jumlah penduduknya
        return view('desa.index', compact('desa')); // Menampilkan view dengan data desa
    }

    // Menampilkan form untuk menambahkan desa baru
    public function create()
    {
        return view('desa.create'); // Menampilkan form untuk menambahkan desa baru
    }

    // Menyimpan data desa baru dan mencatat riwayat aksi
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'nama_desa' => 'required|unique:desa', // Nama desa harus unik
        ]);

        // Menyimpan data desa baru ke database
        Desa::create($validated);

        // Mencatat aksi penambahan desa ke tabel history
        History::create([
            'id_user' => Auth::id(), // ID user yang sedang login
            'name' => Auth::user()->name, // Nama user yang sedang login
            'status' => 'Menambahkan desa', // Deskripsi aksi
            'timestamp' => now(), // Waktu aksi dilakukan
            'role' => Auth::user()->role, // Role atau peran user
        ]);

        // Mengarahkan kembali ke halaman daftar desa dengan pesan sukses
        return redirect()->route('desa.index')->with('success', 'Data Desa Berhasil Ditambahkan');
    }

    // Menampilkan detail desa berdasarkan ID
    public function show($id)
    {
        $desa = Desa::with('penduduk')->findOrFail($id); // Mengambil data desa beserta penduduk berdasarkan ID
        return view('desa.show', compact('desa')); // Menampilkan detail desa
    }

    // Menampilkan form untuk mengedit data desa
    public function edit(Desa $desa)
    {
        return view('desa.edit', compact('desa')); // Menampilkan form edit dengan data desa
    }

    // Memperbarui data desa yang sudah ada dan mencatat riwayat perubahan
    public function update(Request $request, Desa $desa)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'nama_desa' => 'required|unique:desa,nama_desa,' . $desa->id, // Nama desa harus unik kecuali untuk data yang sedang diedit
        ]);

        // Memperbarui data desa
        $desa->update($validated);

        // Mencatat aksi perubahan data desa ke tabel history
        History::create([
            'id_user' => Auth::id(), // ID user yang sedang login
            'name' => Auth::user()->name, // Nama user yang sedang login
            'status' => 'Mengubah desa', // Deskripsi aksi
            'timestamp' => now(), // Waktu aksi dilakukan
            'role' => Auth::user()->role, // Role atau peran user
        ]);

        // Mengarahkan kembali ke halaman daftar desa dengan pesan sukses
        return redirect()->route('desa.index')->with('success', 'Data Desa Berhasil Diupdate');
    }

    // Menghapus data desa dan mencatat riwayat penghapusan
    public function destroy(Desa $desa)
    {
        // Mencatat aksi penghapusan data desa ke tabel history
        History::create([
            'id_user' => Auth::id(), // ID user yang sedang login
            'name' => Auth::user()->name, // Nama user yang sedang login
            'status' => 'Menghapus desa', // Deskripsi aksi
            'timestamp' => now(), // Waktu aksi dilakukan
            'role' => Auth::user()->role, // Role atau peran user
        ]);

        // Menghapus data desa
        $desa->delete();

        // Mengarahkan kembali ke halaman daftar desa dengan pesan sukses
        return redirect()->route('desa.index')->with('success', 'Data Desa Berhasil Dihapus');
    }
}
