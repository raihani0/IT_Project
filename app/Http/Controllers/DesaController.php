<?php

namespace App\Http\Controllers;

use App\Models\Desa;

class DesaController extends Controller
{
    // Menampilkan daftar desa
    public function index()
    {
        $desas = Desa::all();  // Mendapatkan semua data desa
        return view('desas.index', ['desas' => $desas]);  // Kirim data desa ke view
    }

    // Menampilkan data penduduk berdasarkan nama desa
    public function show($nama_desa)
    {
        // Mengambil data desa yang memiliki nama desa yang diberikan dan termasuk penduduk
        $desa = Desa::with('penduduk')->where('nama_desa', $nama_desa)->first();

        if (!$desa) {
            return redirect()->back()->with('error', 'Desa tidak ditemukan.');
        }

        return view('desa.show', ['desa' => $desa]);
    }
}
