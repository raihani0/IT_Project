<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';

    protected $fillable = ['nama_desa'];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
