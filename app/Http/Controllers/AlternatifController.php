<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    // Menampilkan halaman utama data alternatif
    public function index() {
        return view('dataalternatif', [
            'users' => Alternatif::all(), // Mengambil semua data alternatif dari database
            'title' => 'Data alternatif' // Judul halaman
        ]);
    }

    // Menampilkan halaman tambah data alternatif
    public function add() {
        return view('adddataalternatif',[
            'title' => 'Tambah Data alternatif' // Judul halaman tambah data
        ]);
    }

    // Menampilkan halaman edit data alternatif berdasarkan ID
    public function edit($id){
        $alternatif = Alternatif::where('id', $id)->first(); // Mengambil data alternatif berdasarkan ID

        return view('editalternatif', [
            'alternatif' => $alternatif, // Data alternatif yang akan diedit
            'title' => 'Edit Data alternatif' // Judul halaman edit
        ]);
    }

    // Mengupdate data alternatif berdasarkan input dari user
    public function update(Request $request, $id) {
        $kode_alternatif = $request->input('kode_alternatif'); // Input kode alternatif
        $kriteria_1 = $request->input('kriteria_1'); // Input kriteria 1
        $kriteria_2 = $request->input('kriteria_2'); // Input kriteria 2
        $kriteria_3 = $request->input('kriteria_3'); // Input kriteria 3
        
        $alternatif = Alternatif::where('id', $id)->first(); // Mengambil data alternatif berdasarkan ID
        $alternatif->kode_alternatif = $kode_alternatif;
        $alternatif->kriteria_1 = $kriteria_1;
        $alternatif->kriteria_2 = $kriteria_2;
        $alternatif->kriteria_3 = $kriteria_3;
        $alternatif->save(); // Menyimpan perubahan data ke database

        return redirect()->to('/alternatif'); // Redirect ke halaman alternatif
    }

    // Menampilkan dashboard dengan jumlah data alternatif
    public function dashboard(){
        $alternatif = Alternatif::count(); // Menghitung jumlah data alternatif

        return view('main', compact('alternatif')); // Menampilkan halaman dashboard
    }

    // Menyimpan data alternatif baru ke database
    public function store(Request $request) {
        $kode_alternatif = $request->input('kode_alternatif'); // Input kode alternatif
        $kriteria_1 = $request->input('kriteria_1'); // Input kriteria 1
        $kriteria_2 = $request->input('kriteria_2'); // Input kriteria 2
        $kriteria_3 = $request->input('kriteria_3'); // Input kriteria 3

        $alternatif = new Alternatif; // Membuat instance model Alternatif
        $alternatif->kode_alternatif = $kode_alternatif;
        $alternatif->kriteria_1 = $kriteria_1;
        $alternatif->kriteria_2 = $kriteria_2;
        $alternatif->kriteria_3 = $kriteria_3;

        $alternatif->save(); // Menyimpan data baru ke database

        return redirect()->to('/alternatif'); // Redirect ke halaman alternatif
    }

    // Menghapus data alternatif berdasarkan ID
    public function delete($id) {
        $alternatif = Alternatif::where('id', $id)->first(); // Mengambil data alternatif berdasarkan ID
        $alternatif->delete(); // Menghapus data dari database
        return redirect()->back(); // Redirect kembali ke halaman sebelumnya
    }
}
