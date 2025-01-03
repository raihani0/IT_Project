<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HitungController extends Controller
{

    public function hitung()
    {
        $data = Alternatif::all();
        $C1min = Alternatif::min('kriteria_1'); // Cost
        $C2max = Alternatif::max('kriteria_2'); // Benefit
        $C3max = Alternatif::max('kriteria_3'); // Benefit
    
        // Bobot kriteria
        $widget1 = ['kriteria' => 0.5]; // C1
        $widget2 = ['kriteria' => 0.2]; // C2
        $widget3 = ['kriteria' => 0.3]; // C3
    
        return view('hitung', compact('data', 'C1min', 'C2max', 'C3max', 'widget1', 'widget2', 'widget3'));
    }
    

}
