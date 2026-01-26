<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Petugas;
class Loket extends Model
{
    protected $fillable=['no_loket','dinas'];

    public function petugas()
    {
        return $this->hasMany(Petugas::class);
    }
}
