<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    /**
     * statusLabel
     * 
     * Helper untuk mendapatkan label status.
     *
     * @return string
     */
    public function getStatusLabelAttribute(): string
    {
        return $this->status ? 'Aktif' : 'Tidak Aktif';
    }
}
