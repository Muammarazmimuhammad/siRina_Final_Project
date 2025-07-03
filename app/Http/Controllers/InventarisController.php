<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;
use App\Models\PeminjamanInventaris;


class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('admin.inventaris.index', compact('inventaris'));
    }


    public function showProyektor()
    {
        $inventaris = Inventaris::where('nama', 'LCD Projector')->first();
        $jadwals = PeminjamanInventaris::where('inventaris_id', $inventaris->id ?? null)->latest()->get();
        return view('proyektor', compact('inventaris', 'jadwals'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status()
    {
        $inventaris = Inventaris::all(); // Menggunakan model Inventaris
        return view('inventaris.status', compact('inventaris'));
    }
}
