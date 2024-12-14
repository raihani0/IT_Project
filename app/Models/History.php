<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    // Menambahkan kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'id_user',
        'name',
        'status',
        'timestamp',
        'role',
    ];
}