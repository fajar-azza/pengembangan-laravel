<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Petugas;
use App\Models\Loket;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function store(Request $request)
{
    // 1. VALIDASI INPUT FORM
    $request->validate([
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'nik' => 'required|unique:petugas',
        'nama_petugas' => 'required',
        'loket_id' => 'required|exists:lokets,id'
    ]);

    // 2. SIMPAN DATA (PAKAI TRANSACTION)
    DB::transaction(function () use ($request) {

        // SIMPAN USER (LOGIN)
        $user = User::create([
            'name' => $request->nama_petugas,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        // SIMPAN PETUGAS
        Petugas::create([
            'user_id' => $user->id,
            'nik' => $request->nik,
            'nama_petugas' => $request->nama_petugas,
            'loket_id' => $request->loket_id
        ]);
    });

    // 3. REDIRECT
    return redirect()->route('admin.datapetugas')
        ->with('success', 'Akun petugas berhasil dibuat');
}

public function create()
{
    $lokets = Loket::all(); // ⬅️ ambil data loket
    $petugas = Petugas::all(); // ⬅️ ambil data loket


    return view('admin.pages.tambahuser', compact('lokets','petugas'));
}

public function update(Request $request, string $id)
    {
        $datapetugas = Petugas::find($id);
        $datapetugas->nik = $request->nik;
        $datapetugas->nama_petugas = $request->nama_petugas;
        $datapetugas->loket_id = $request->loket_id;
        $datapetugas->save();

        return redirect()->route('admin.datapetugas');
    }


public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
        $petugas = Petugas::findOrFail($id);

        $petugas->user()->delete();
        $petugas->delete();
    });
        return redirect()->route('admin.datapetugas');
    }

}
