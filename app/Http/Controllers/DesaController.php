<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $desa = Desa::withCount('penduduk')->get();
        return view('desa.index', compact('desa'));
    }

    public function create()
    {
        return view('desa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|unique:desa',
        ]);

        Desa::create($validated);
        return redirect()->route('desa.index')->with('success', 'Data Desa Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $desa = Desa::with('penduduk')->findOrFail($id);
        return view('desa.show', compact('desa'));
    }


    public function edit(Desa $desa)
    {
        return view('desa.edit', compact('desa'));
    }

    public function update(Request $request, Desa $desa)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|unique:desa,nama_desa,' . $desa->id,
        ]);

        $desa->update($validated);
        return redirect()->route('desa.index')->with('success', 'Data Desa Berhasil Diupdate');
    }

    public function destroy(Desa $desa)
    {
        $desa->delete();
        return redirect()->route('desa.index')->with('success', 'Data Desa Berhasil Dihapus');
    }
}
