<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Loket;

class LoketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Loket::all();
        return view ('admin.pages.loket',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view ('admin.pages.formdosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Loket::create([
            'no_loket'=> $request->no_loket,
            'dinas'=> $request->dinas,

        ]);
        return redirect()->route('admin.loket');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $dataloket = Loket::find($id);
        return view('admin.pages.loket',compact('dataloket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataloket = Loket::find($id);
        $dataloket->no_loket = $request->no_loket;
        $dataloket->dinas = $request->dinas;
        $dataloket->save();

        return redirect()->route('admin.loket');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataloket = Loket:: find($id);
        $dataloket->delete();

        return redirect()->route('admin.loket');
    }
}
