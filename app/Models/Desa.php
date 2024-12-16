<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';

    protected $fillable = ['alamat'];

    // Relasi dengan penduduk
    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'alamat', 'alamat');
    }
}