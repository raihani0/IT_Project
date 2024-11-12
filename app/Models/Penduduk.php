<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    public $fillable = ["nama", "nik", "id_desa", "id_bantuan", "id_kreteria", "alamat", "tanggal_lahir", "kondisi_rumah", "jumlah_tanggungan", "tanggal_penerimaan", "status_penerimaan"];
}
