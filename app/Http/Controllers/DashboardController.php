<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = auth()->user()->petugas;

        if (!$petugas) {
            abort(403);
        }

        $absenHariIni = Absensi::where('petugas_id', $petugas->id)
            ->whereDate('tanggal', today())
            ->first();

        return view('user.pages.absensi', compact('absenHariIni'));
    }
    public function riwayat()
    {
        $petugas = auth()->user()->petugas;

        if (!$petugas) {
            abort(403);
        }

        $riwayat = Absensi::where('petugas_id', $petugas->id)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('user.pages.riwayatabsen', compact('riwayat'));
    }
}
