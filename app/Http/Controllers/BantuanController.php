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
        // Validasi input
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'status' => 'required|boolean',
        ]);

        // Simpan bantuan baru
        $bantuan = Bantuan::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // Simpan riwayat ke tabel history
        History::create([
            'id_user' => Auth::id(),  // ID pengguna yang sedang login
            'name' => Auth::user()->name, // Nama pengguna
            'status' => 'Menambahkan bantuan',  // Status aksi
            'timestamp' => now(),  // Waktu aksi
            'role' => Auth::user()->role,  // Role pengguna
        ]);

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
        // Validasi input
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'status' => 'required|boolean',
        ]);

        $bantuan = Bantuan::findOrFail($id);

        // Simpan riwayat perubahan bantuan
        History::create([
            'id_user' => Auth::id(),  // ID pengguna yang sedang login
            'name' => Auth::user()->name, // Nama pengguna
            'status' => 'Mengubah bantuan',  // Status aksi
            'timestamp' => now(),  // Waktu aksi
            'role' => Auth::user()->role,  // Role pengguna
        ]);

        // Update data bantuan
        $bantuan->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

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
        // Cari bantuan berdasarkan ID
        $bantuan = Bantuan::findOrFail($id);

        // Simpan ke dalam history sebelum menghapus
        History::create([
            'id_user' => Auth::id(),  // ID pengguna yang sedang login
            'name' => Auth::user()->name, // Nama pengguna
            'status' => 'Menghapus bantuan',  // Status aksi
            'timestamp' => now(),  // Waktu aksi
            'role' => Auth::user()->role,  // Role pengguna
        ]);

        // Hapus data bantuan
        $bantuan->delete();

        return redirect()->route('bantuans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
