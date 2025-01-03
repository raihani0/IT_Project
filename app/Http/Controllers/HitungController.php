<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HitungController extends Controller
{

    public function hitung()
    {
        // Mengambil semua data alternatif
        $data = Alternatif::all();

        // Menentukan nilai minimum untuk kriteria_1 (Cost)
        $C1min = Alternatif::min('kriteria_1'); // Cost

        // Menentukan nilai maksimum untuk kriteria_2 dan kriteria_3 (Benefit)
        $C2max = Alternatif::max('kriteria_2'); // Benefit
        $C3max = Alternatif::max('kriteria_3'); // Benefit
    
        // Bobot kriteria untuk setiap alternatif
        $widget1 = ['kriteria' => 0.5]; // C1 (Bobot untuk Cost)
        $widget2 = ['kriteria' => 0.2]; // C2 (Bobot untuk Benefit)
        $widget3 = ['kriteria' => 0.3]; // C3 (Bobot untuk Benefit)
    
        // Mengirim data ke tampilan 'hitung'
        return view('hitung', compact('data', 'C1min', 'C2max', 'C3max', 'widget1', 'widget2', 'widget3'));
    }
    

}
