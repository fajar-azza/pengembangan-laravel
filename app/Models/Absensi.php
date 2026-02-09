<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [
        'petugas_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
    ];
    protected $casts = [
    'tanggal' => 'date',
];


    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
