<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduks = Penduduk::paginate(5);
        return view("penduduks.index", compact('penduduks'));
    }

    public function create()
    {
        return view("penduduks.create");
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            "nama" => "required|string|max:255",
            "nik" => "required|digits:16|unique:penduduks,nik", // Pastikan NIK hanya 16 digit
            "desa" => "required|string|max:255",
            "alamat" => "required|string|max:255",
            "jenis_bantuan" => "required|string|max:100",
            "nominal" => "required|numeric|min:0", // Nominal tidak boleh negatif
            "status_bantuan" => "required|boolean", // Pastikan bernilai 0 atau 1
        ]);

        // Simpan data penduduk
        $penduduk = Penduduk::create([
            "nama" => $request->nama,
            "nik" => $request->nik,
            "desa" => $request->desa,
            "alamat" => $request->alamat,
            "jenis_bantuan" => $request->jenis_bantuan,
            "nominal" => $request->nominal,
            "status_bantuan" => $request->status_bantuan,
        ]);

        // Simpan riwayat ke tabel history
        History::create([
            'id_user' => Auth::id(),
            'name' => Auth::user()->name,
            'status' => 'Menambahkan penduduk',
            'timestamp' => now(),
            'role' => Auth::user()->role,
        ]);

        return redirect()->route("penduduks.index")->with("success", "Penduduk berhasil ditambahkan.");
    }

    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view("penduduks.edit", compact('penduduk'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            "nama" => "required|string|max:255",
            "nik" => "required|digits:16|unique:penduduks,nik," . $id,
            "desa" => "required|string|max:255",
            "alamat" => "required|string|max:255",
            "jenis_bantuan" => "required|string|max:100",
            "nominal" => "required|numeric|min:0",
            "status_bantuan" => "required|boolean",
        ]);

        $penduduk = Penduduk::findOrFail($id);

        // Update data penduduk
        $penduduk->update([
            "nama" => $request->nama,
            "nik" => $request->nik,
            "desa" => $request->desa,
            "alamat" => $request->alamat,
            "jenis_bantuan" => $request->jenis_bantuan,
            "nominal" => $request->nominal,
            "status_bantuan" => $request->status_bantuan,
        ]);

        // Simpan riwayat perubahan
        History::create([
            'id_user' => Auth::id(),
            'name' => Auth::user()->name,
            'status' => 'Mengubah penduduk',
            'timestamp' => now(),
            'role' => Auth::user()->role,
        ]);

        return redirect()->route("penduduks.index")->with("success", "Penduduk berhasil diperbarui.");
    }

    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);

        // Simpan riwayat penghapusan
        History::create([
            'id_user' => Auth::id(),
            'name' => Auth::user()->name,
            'status' => 'Menghapus penduduk',
            'timestamp' => now(),
            'role' => Auth::user()->role,
        ]);

        $penduduk->delete();

        return redirect()->route("penduduks.index")->with("success", "Penduduk berhasil dihapus.");
    }

    // Menambahkan metode show() untuk menampilkan detail penduduk berdasarkan ID
    public function show($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view("penduduks.show", compact('penduduk'));
    }
}
