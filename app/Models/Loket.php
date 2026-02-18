<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Petugas;
class Loket extends Model
{
    protected $fillable=['no_loket','dinas'];

    protected $table = 'lokets'; // atau 'loket' → SESUAI DB

    public function petugas()
    {
        return $this->hasMany(Petugas::class, 'loket_id', 'id');
    }
    
}
