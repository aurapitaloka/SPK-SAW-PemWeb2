<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifKriteria extends Model
{
    use HasFactory;

    protected $table = 'alternatif_kriterias';

    protected $fillable = [
        'nama_alternatif',
        'harga',
        'fasilitas',
        'keamanan',
        'kebersihan',
        'rating',
    ];

    // Relationship with Alternatif model
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'nama_alternatif', 'nama');
    }
}
