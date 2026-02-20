<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function absenMasuk()
    {
        $petugas = auth()->user()->petugas;

        // Guard tambahan (aman)
        if (!$petugas) {
            return back()->with('error', 'Akun ini tidak memiliki data petugas');
        }

        $today = now()->toDateString();

        // Cek apakah sudah absen hari ini
        $sudahAbsen = Absensi::where('petugas_id', $petugas->id)
            ->where('tanggal', $today)
            ->first();

        if ($sudahAbsen) {
            return back()->with('error', 'Anda sudah absen masuk hari ini');
        }

        Absensi::create([
            'petugas_id' => $petugas->id,
            'tanggal'    => now()->toDateString(),
            'jam_masuk'  => now()->toTimeString(),
        ]);

        return back()->with('success', 'Absen masuk berhasil');
    }

    public function absenPulang()
{
    $petugas = auth()->user()->petugas;

    if (!$petugas) {
        return back()->with('error', 'Akun ini tidak memiliki data petugas');
    }

    $today = now()->toDateString();

    $absen = Absensi::where('petugas_id', $petugas->id)
        ->where('tanggal', $today)
        ->first();

    // ❌ Belum absen masuk
    if (!$absen) {
        return back()->with('error', 'Anda belum absen masuk hari ini');
    }

    // ❌ Sudah absen pulang
    if ($absen->jam_pulang) {
        return back()->with('error', 'Anda sudah absen pulang hari ini');
    }

    $absen->update([
        'jam_pulang' => now()->toTimeString(),
    ]);

    return back()->with('success', 'Absen pulang berhasil');
}
}

