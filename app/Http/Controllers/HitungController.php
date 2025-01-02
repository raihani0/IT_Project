<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HitungController extends Controller
{

    public function hitung(Request $request){

        $kriteria = Kriteria::sum('bobot');

        $bobot1 = 50/$kriteria;
        $bobot2 = 20/$kriteria;
        $bobot3 = 30/$kriteria;
        $widget1 = [
            'kriteria' => $bobot1,
        ];
        $widget2 = [
            'kriteria' => $bobot2,
        ];
        $widget3 = [
            'kriteria' => $bobot3,
        ];


        $Alternatif = Alternatif::get();
        $data = Alternatif::orderby('kode_alternatif', 'asc')->get();

        $minC1 = Alternatif::min('kriteria_1');
        $maxC1 = Alternatif::max('kriteria_1');
        $minC2 = Alternatif::min('kriteria_2');
        $maxC2 = Alternatif::max('kriteria_2');
        $minC3 = Alternatif::min('kriteria_3');
        $maxC3 = Alternatif::max('kriteria_3');

        $C1min =[
            'alternatif' => $minC1,
        ];
        $C1max =[
            'alternatif' => $maxC1,
        ];
        $C2min =[
            'alternatif' => $minC2,
        ];
        $C2max =[
            'alternatif' => $maxC2,
        ];
        $C3min =[
            'alternatif' => $minC3,
        ];
        $C3max =[
            'alternatif' => $maxC3,
        ];

        $hasil = $minC1/$maxC1;
        $hasil1 =[
            'alternatif' => $hasil,
        ];

        return view('hitung', compact('hasil1','data', 'widget1', 'widget2', 'widget3', 'C1min', 'C1max', 'C2min', 'C2max', 'C3min', 'C3max'));
    }

}
