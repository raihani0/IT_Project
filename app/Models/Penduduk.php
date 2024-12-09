<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
        "nik",
        "desa",
        "alamat",
        "jenis_bantuan",
        "nominal",
        "status_bantuan",
    ];
}
