<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $penduduks = Penduduk::paginate(5);

        return view("penduduks.index", compact('penduduks'));
    }

    public function create(Request $request)
    {
        return view("penduduks.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "nik" => "required",
            "kecamatan" => "required",
            "kelurahan" => "required",
            "alamat" => "required|string",
            "jenis_bantuan" => "required",
            "nominal" => "required",
            "status_bantuan" => "required",
        ]);
        Penduduk::create([
            "nama" => $request->nama,
            "nik" => $request->nik,
            "kecamatan" => $request->kecamatan,
            "kelurahan" => $request->kelurahan,
            "alamat" => $request->alamat,
            "jenis_bantuan" => $request->alamat,
            "nominal" => $request->nominal,
            "status_bantuan" => $request->alamat,
        ]);
        return redirect()->route("penduduks.index")->with("success", "Penduduk berhasil ditambahkan.");
    }
    public function edit(Request $request, $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view("penduduks.edit", compact('penduduk'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => "required",
            "nik" => "required",
            "kecamatan" => "required",
            "kelurahan" => "required",
            "alamat" => "required|string",
            "jenis_bantuan" => "required",
            "nominal" => "required",
            "status_bantuan" => "required",
        ]);
        $penduduk = Penduduk::find($id);
        $penduduk->nama = $request->nama;
        $penduduk->nik = $request->nik;
        $penduduk->kecamatan = $request->kecamatan;
        $penduduk->kelurahan = $request->kelurahan;
        $penduduk->alamat = $request->alamat;
        $penduduk->jenis_bantuan = $request->jenis_bantuan;
        $penduduk->nominal = $request->nominal;
        $penduduk->status_bantuan = $request->status_bantuan;
        $penduduk->save();
        return redirect()->route("penduduks.index")->with("success", "penduduk updated.");
    }
    public function show(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);
        return view("penduduks.show", compact('penduduk'));
    }
    public function destroy(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);
        $penduduk->delete();
        return redirect()->route("penduduks.index")->with("success", "penduduk deleted successfully");
    }
}
