<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loket;
use App\Models\Petugas;
use App\Models\Absensi;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AdminRekapController extends Controller
{
    private function daftarHariKerja($bulan, $tahun)
    {
        $start = Carbon::create($tahun, $bulan, 1);
        $end   = $start->copy()->endOfMonth();

        $periode = CarbonPeriod::create($start, $end);

        $hariKerja = [];

        foreach ($periode as $tanggal) {
            if (! $tanggal->isWeekend()) {
                $hariKerja[] = $tanggal->format('Y-m-d');
            }
        }

        return $hariKerja;
    }

    public function index(Request $request)
{
    // 1️⃣ Ambil bulan & tahun (default: bulan ini)
    $bulan = $request->bulan ?? now()->month;
    $tahun = $request->tahun ?? now()->year;

    // 2️⃣ Validasi aman
    $bulan = (int) $bulan;
    $tahun = (int) $tahun;

    if ($bulan < 1 || $bulan > 12) {
        $bulan = now()->month;
    }

    if ($tahun < 2000 || $tahun > now()->year) {
        $tahun = now()->year;
    }

    // 3️⃣ Range tanggal bulan aktif
    $start = Carbon::create($tahun, $bulan, 1)->startOfMonth()->toDateString();
    $end   = Carbon::create($tahun, $bulan, 1)->endOfMonth()->toDateString();

    // 4️⃣ Daftar hari kerja
    $hariKerja = $this->daftarHariKerja($bulan, $tahun);
    $jumlahHariKerja = count($hariKerja);

    // 5️⃣ Ambil data absensi per loket
    $lokets = Loket::with([
        'petugas.absensis' => function ($q) use ($start, $end) {
            $q->whereBetween('tanggal', [$start, $end]);
        }
    ])->get();

    return view('admin.pages.rekapabsen', compact(
        'lokets',
        'bulan',
        'tahun',
        'hariKerja',
        'jumlahHariKerja'
    ));
}


public function edit(Request $request)
{
    $bulan = $request->bulan;
    $tahun = $request->tahun;

    $start = Carbon::create($tahun, $bulan, 1);
    $end   = $start->copy()->endOfMonth();

    // hari kerja
    $hariKerja = [];
    foreach (CarbonPeriod::create($start, $end) as $tgl) {
        if (! $tgl->isWeekend()) {
            $hariKerja[] = $tgl->toDateString();
        }
    }

    // semua petugas
    $petugas = Petugas::all();

    // semua absensi bulan ini
    $absensi = Absensi::whereBetween('tanggal', [$start, $end])
        ->get()
        ->groupBy('tanggal');

    return view('admin.pages.editrekap', compact(
        'hariKerja',
        'petugas',
        'absensi',
        'bulan',
        'tahun'
    ));
}
public function update(Request $request)
{
    $bulan = $request->bulan;
    $tahun = $request->tahun;

    if ($request->has('absen')) {
        foreach ($request->absen as $tanggal => $petugasList) {
            foreach ($petugasList as $petugasId => $status) {

                Absensi::updateOrCreate(
                    [
                        'petugas_id' => $petugasId,
                        'tanggal' => $tanggal
                    ],
                    [
                        'status' => 'hadir',
                        'jam_masuk' => '08:00:00'
                    ]
                );
            }
        }
    }

    return redirect()->route('admin.rekap.absen', [
        'bulan' => $bulan,
        'tahun' => $tahun
    ])->with('success', 'Absensi bulanan berhasil diperbarui');
}

}
