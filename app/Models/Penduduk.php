<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = [
        'nama', 'nik', 'desa_id', 'alamat', 'jenis_bantuan', 'nominal', 'status_bantuan'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
