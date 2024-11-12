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
            "id_desa" => "required",
            "id_bantuan" => "required",
            "id_kreteria" => "required",
            "alamat" => "required",
            "tanggal_lahir" => "required|date",
            "kondisi_rumah" => "required",
            "jumlah_tanggungan" => "required|integer",
            "tanggal_penerimaan" => "required|date",
            "status_penerimaan" => "required",
        ]);

        Penduduk::create([
            "nama" => $request->nama,
            "nik" => $request->nik,
            "id_desa" => $request->id_desa,
            "id_bantuan" => $request->id_bantuan,
            "id_kreteria" => $request->id_kreteria,
            "alamat" => $request->alamat,
            "tanggal_lahir" => $request->tanggal_lahir,
            "kondisi_rumah" => $request->kondisi_rumah,
            "jumlah_tanggungan" => $request->jumlah_tanggungan,
            "tanggal_penerimaan" => $request->tanggal_penerimaan,
            "status_penerimaan" => $request->status_penerimaan,
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
      "id_desa" => "required",
      "id_bantuan" => "required",
      "id_kreteria" => "required",
      "alamat" => "required",
      "tanggal_lahir" => "required|date",
      "kondisi_rumah" => "required",
      "jumlah_tanggungan" => "required|integer",
      "tanggal_penerimaan" => "required|date",
      "status_penerimaan" => "required",
    ]);

    $penduduk = Penduduk::find($id);

    $penduduk->nama= $request->nama;
    $penduduk->nik = $request->nik;
    $penduduk->id_desa = $request->id_desa;
    $penduduk->id_bantuan = $request->id_bantuan;
    $penduduk->id_kreteria = $request->id_kreteria;
    $penduduk->alamat = $request->alamat;
    $penduduk->tanggal_lahir = $request->tanggal_lahir;
    $penduduk->kondisi_rumah = $request->kondisi_rumah;
    $penduduk->jumlah_tanggungan = $request->jumlah_tanggungan;
    $penduduk->tanggal_penerimaan = $request->tanggal_penerimaan;
    $penduduk->status_penerimaan = $request->status_penerimaan;
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
