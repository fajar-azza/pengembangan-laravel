<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Petugas;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
{
    $today = Carbon::today()->toDateString();

    $petugas = Petugas::with(['loket', 'absensis' => function ($query) use ($today) {
        $query->whereDate('tanggal', $today);
    }])->get();

    return view('welcome', compact('petugas'));
}
}
