<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller {

    // Menampilkan daftar semua kriteria
    public function index() {
        return view('datakriteria', [
            'users' => Kriteria::all(),
            'title' => 'Data kriteria'
        ]);
    }

    // Menampilkan form untuk menambah kriteria baru
    public function add() {
        return view('adddatakriteria',[
            'title' => 'Tambah Data kriteria'
        ]);
    }

    // Menampilkan form untuk mengedit data kriteria berdasarkan ID
    public function edit($id) {
        // Mengambil data kriteria berdasarkan ID
        $kriteria = Kriteria::where('id', $id)->first();

        return view('editkriteria', [
            'kriteria' => $kriteria,
            'title' => 'Edit Data kriteria'
        ]);
    }

    // Memperbarui data kriteria yang telah ada
    public function update(Request $request, $id) {
        // Mengambil data input dari request
        $kode_kriteria = $request->input('kode_kriteria');
        $nama_kriteria = $request->input('nama_kriteria');
        $bobot = $request->input('bobot');
        $jenis = $request->input('jenis');
        
        // Menemukan kriteria berdasarkan ID dan memperbarui data
        $kriteria = Kriteria::where('id', $id)->first();
        $kriteria->kode_kriteria = $kode_kriteria;
        $kriteria->nama_kriteria = $nama_kriteria;
        $kriteria->bobot = $bobot;
        $kriteria->jenis = $jenis;

        $kriteria->save();

        return redirect()->to('/kriteria');
    }

    // Menampilkan dashboard dengan jumlah kriteria
    public function dashboard(){
        $kriteria = Kriteria::count();

        return view('main', compact('kriteria'));
    }

    // Menyimpan kriteria baru ke database
    public function store(Request $request) {
        // Mengambil data input dari request
        $kode_kriteria = $request->input('kode_kriteria');
        $nama_kriteria = $request->input('nama_kriteria');
        $bobot = $request->input('bobot');
        $jenis = $request->input('jenis');

        // Membuat objek kriteria baru dan menyimpan data
        $kriteria = new Kriteria;
        $kriteria->kode_kriteria = $kode_kriteria;
        $kriteria->nama_kriteria = $nama_kriteria;
        $kriteria->bobot = $bobot;
        $kriteria->jenis = $jenis;

        $kriteria->save();

        return redirect()->to('/kriteria');
    }

    // Menghapus kriteria berdasarkan ID
    public function delete($id) {
        $kriteria = Kriteria::where('id', $id)->first();
        $kriteria->delete();
        return redirect()->back();
    }
}
