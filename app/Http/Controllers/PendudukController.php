<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Desa;
use App\Models\History;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::with('desa')->get();
        return view('penduduk.index', compact('penduduk'));
    }

    public function create()
    {
        $desa = Desa::all();
        return view('penduduk.create', compact('desa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:penduduk',
            'desa_id' => 'required|exists:desa,id',
            'alamat' => 'required',
            'jenis_bantuan' => 'required',
            'nominal' => 'required|numeric',
            'status_bantuan' => 'required',
        ]);

        $penduduk = Penduduk::create($validated);

        // Mencatat aksi penambahan penduduk ke tabel history
        History::create([
            'id_user' => Auth::id(),
            'name' => Auth::user()->name,
            'status' => "Menambahkan penduduk: {$penduduk->nama}",
            'timestamp' => now(),
            'role' => Auth::user()->role,
        ]);

        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $penduduk = Penduduk::with('desa')->findOrFail($id);
        return view('penduduk.show', compact('penduduk'));
    }

    public function edit(Penduduk $penduduk)
    {
        $desa = Desa::all();
        return view('penduduk.edit', compact('penduduk', 'desa'));
    }

    public function update(Request $request, Penduduk $penduduk)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:penduduk,nik,' . $penduduk->id,
            'desa_id' => 'required|exists:desa,id',
            'alamat' => 'required',
            'jenis_bantuan' => 'required',
            'nominal' => 'required|numeric',
            'status_bantuan' => 'required',
        ]);

        $penduduk->update($validated);

        // Mencatat aksi perubahan penduduk ke tabel history
        History::create([
            'id_user' => Auth::id(),
            'name' => Auth::user()->name,
            'status' => "Mengubah penduduk: {$penduduk->nama}",
            'timestamp' => now(),
            'role' => Auth::user()->role,
        ]);

        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk Berhasil Diupdate');
    }

    public function destroy(Penduduk $penduduk)
    {
        // Mencatat aksi penghapusan penduduk ke tabel history
        History::create([
            'id_user' => Auth::id(),
            'name' => Auth::user()->name,
            'status' => "Menghapus penduduk: {$penduduk->nama}",
            'timestamp' => now(),
            'role' => Auth::user()->role,
        ]);

        $penduduk->delete();

        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk Berhasil Dihapus');
    }

    public function pdf_generator_get(Request $request)
    {
        $penduduk = Penduduk::get();

        $data = [
            'title' => 'Data Masyarakat Miskin Di Kecamatan Batu-Ampar',
            'date' => date('d/m/Y'),
            'penduduk' => $penduduk,
        ];

        $pdf = PDF::loadview('myPDF', $data);
        return $pdf->download('Data Masyarakat Miskin.pdf');
    }
}
