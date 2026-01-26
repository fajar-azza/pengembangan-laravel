<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'user_id',
        'nik',
        'nama_petugas',
        'loket_id'
    ];

    // RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // RELASI KE LOKET
    public function loket()
    {
        return $this->belongsTo(Loket::class);
    }
}
