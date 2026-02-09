<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loket;
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
        $bulan = $request->bulan ?? now()->month;
        $tahun = $request->tahun ?? now()->year;

        // range tanggal bulan aktif
        $start = Carbon::create($tahun, $bulan, 1)->startOfMonth()->toDateString();
        $end   = Carbon::create($tahun, $bulan, 1)->endOfMonth()->toDateString();

        // daftar tanggal kerja
        $hariKerja = $this->daftarHariKerja($bulan, $tahun);
        $jumlahHariKerja = count($hariKerja);

        // ambil data absensi per loket (FIX)
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
}
