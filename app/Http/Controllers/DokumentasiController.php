<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DokumentasiController extends Controller
{
    // Menampilkan daftar dokumentasi
    public function index()
    {
        $dokumentasi = Dokumentasi::all();
        $desas = ['Desa 1', 'Desa 2', 'Desa 3'];
        return view('dokumentasi.index', compact('dokumentasi', 'desas'));
    }

    // Menampilkan form untuk menambah dokumentasi
    public function create(Request $request)
    {
        $desas = ['Desa 1', 'Desa 2', 'Desa 3'];
        $desa = $request->query('desa');
        return view('dokumentasi.create', compact('desas', 'desa'));
    }

    // Menyimpan dokumentasi baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desa' => 'required|string',
        ]);

        // Simpan gambar ke storage
        $imagePath = $request->file('image')->store('dokumentasi', 'public');
        Log::info('Gambar berhasil diunggah.', ['image_path' => $imagePath]);

        // Simpan data dokumentasi ke database
        Dokumentasi::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'desa' => $request->desa,
        ]);

        Log::info('Dokumentasi berhasil dibuat.', ['title' => $request->title]);
        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil diupload.');
    }

    // Menampilkan halaman edit dokumentasi
    public function edit($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        $desas = ['Desa 1', 'Desa 2', 'Desa 3'];
        return view('dokumentasi.edit', compact('dokumentasi', 'desas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desa' => 'required|string',
        ]);

        $dokumentasi = Dokumentasi::findOrFail($id);
        $dokumentasi->title = $request->title;
        $dokumentasi->desa = $request->desa;

        // Cek jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($dokumentasi->image_path) {
                Storage::disk('public')->delete($dokumentasi->image_path);
            }

            // Upload gambar baru
            $imagePath = $request->file('image')->store('dokumentasi', 'public');
            $dokumentasi->image_path = $imagePath;
        }

        $dokumentasi->save();

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    // Menghapus dokumentasi
    public function destroy($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);

        if ($dokumentasi->image_path) {
            Storage::disk('public')->delete($dokumentasi->image_path);
            Log::info('Gambar berhasil dihapus.', ['image_path' => $dokumentasi->image_path]);
        }

        $dokumentasi->delete();
        Log::info('Dokumentasi berhasil dihapus.', ['id' => $id]);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }

    // Menampilkan detail dokumentasi
    public function show($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        return view('dokumentasi.show', compact('dokumentasi'));
    }
}
