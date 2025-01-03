<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BantuanController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        // Ambil daftar bantuan terbaru dengan paginasi 10 item per halaman
        $bantuans = Bantuan::latest()->paginate(10);
        return view('bantuans.index', compact('bantuans'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        // Tampilkan form untuk menambahkan bantuan baru
        return view('bantuans.create');
    }

    /**
     * store
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input dari form tambah bantuan
        $request->validate([
            'title' => 'required|min:3', // Judul bantuan minimal 3 karakter
            'description' => 'required|min:10', // Deskripsi minimal 10 karakter
            'status' => 'required|boolean', // Status harus berupa nilai boolean
        ]);

        // Simpan bantuan baru ke database
        $bantuan = Bantuan::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // Simpan log ke tabel history
        History::create([
            'id_user' => Auth::id(),  // ID pengguna yang sedang login
            'name' => Auth::user()->name, // Nama pengguna yang melakukan aksi
            'status' => 'Menambahkan bantuan',  // Jenis aksi yang dilakukan
            'timestamp' => now(),  // Waktu aksi dilakukan
            'role' => Auth::user()->role,  // Role pengguna
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bantuans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  string $id
     * @return View
     */
    public function show(string $id): View
    {
        // Ambil data bantuan berdasarkan ID
        $bantuan = Bantuan::findOrFail($id);
        return view('bantuans.show', compact('bantuan'));
    }

    /**
     * edit
     *
     * @param  string $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Ambil data bantuan berdasarkan ID untuk diedit
        $bantuan = Bantuan::findOrFail($id);
        return view('bantuans.edit', compact('bantuan'));
    }

    /**
     * update
     *
     * @param  Request $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validasi input dari form edit bantuan
        $request->validate([
            'title' => 'required|min:3', // Judul bantuan minimal 3 karakter
            'description' => 'required|min:10', // Deskripsi minimal 10 karakter
            'status' => 'required|boolean', // Status harus berupa nilai boolean
        ]);

        // Ambil data bantuan berdasarkan ID
        $bantuan = Bantuan::findOrFail($id);

        // Simpan log perubahan ke tabel history
        History::create([
            'id_user' => Auth::id(),  // ID pengguna yang sedang login
            'name' => Auth::user()->name, // Nama pengguna yang melakukan aksi
            'status' => 'Mengubah bantuan',  // Jenis aksi yang dilakukan
            'timestamp' => now(),  // Waktu aksi dilakukan
            'role' => Auth::user()->role,  // Role pengguna
        ]);

        // Update data bantuan di database
        $bantuan->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bantuans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        // Ambil data bantuan berdasarkan ID
        $bantuan = Bantuan::findOrFail($id);

        // Simpan log penghapusan ke tabel history
        History::create([
            'id_user' => Auth::id(),  // ID pengguna yang sedang login
            'name' => Auth::user()->name, // Nama pengguna yang melakukan aksi
            'status' => 'Menghapus bantuan',  // Jenis aksi yang dilakukan
            'timestamp' => now(),  // Waktu aksi dilakukan
            'role' => Auth::user()->role,  // Role pengguna
        ]);

        // Hapus data bantuan dari database
        $bantuan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bantuans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
