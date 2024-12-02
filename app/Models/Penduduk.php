<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "nama",
        "nik",
        "kecamatan",
        "kelurahan",
        "alamat",
        "jenis_bantuan",
        "nominal",
        "status_bantuan"

    ];
}

