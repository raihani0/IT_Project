<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Desa;
use Illuminate\Http\Request;

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

        Penduduk::create($validated);
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
        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk Berhasil Diupdate');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk Berhasil Dihapus');
    }
}
