<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RuanganController extends Controller
{
    public function index()
    {
        // Kode ini akan menampilkan file: resources/views/ruangan.blade.php
        // return view('ruangan');

        $ruangans = Ruangan::all();
        return view('admin.ruangan.index', compact('ruangans'));
        
    }

    public function create()
    {
        return view('admin.ruangan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gedung' => 'required|string|max:100',
            'lantai' => 'required|integer',
            'kapasitas' => 'required|integer|min:1',
            'tipe' => 'required|string|max:50',
            'fasilitas' => 'nullable|json',
        ]);

        Ruangan::create($validated);

        return redirect()->route('admin.ruangan.index')
                         ->with('success', 'Ruangan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('admin.ruangan.show', compact('ruangan'));
    }

    public function edit(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('admin.ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gedung' => 'required|string|max:100',
            'lantai' => 'required|integer',
            'kapasitas' => 'required|integer|min:1',
            'tipe' => 'required|string|max:50',
            'fasilitas' => 'nullable|json',
        ]);

        $ruangan = Ruangan::findOrFail($id);
        $ruangan->update($validated);

        return redirect()->route('admin.ruangan.index')
                         ->with('success', 'Data ruangan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();

        return redirect()->route('admin.ruangan.index')
                         ->with('success', 'Ruangan berhasil dihapus!');
    }

    /**
     * Tampilkan jadwal peminjaman untuk Auditorium Utama.
     */
        public function showAuditorium()
    {
        $jadwals = Peminjaman::whereHas('ruangan', function ($query) {
            $query->where('nama', 'Auditorium Utama');
        })
        ->where('status', 'approved')
        ->orderBy('tanggal_pinjam', 'asc')
        ->get();

        return view('audit', compact('jadwals'));
    }

        /**
     * Tampilkan jadwal peminjaman untuk Ruang A201.
     */
        public function showA201()
{
    $ruangan = Ruangan::where('id', '=', 2)->first();
    $jadwals = Peminjaman::whereHas('ruangan', function ($query) {
        $query->where('id', 2);
    })
    ->where('status', 'approved')
    ->orderBy('tanggal_pinjam', 'asc')
    ->get();

    return view('a201', compact('ruangan', 'jadwals'));
    }

        public function showB201()
    {
        $ruangan = Ruangan::where('id', '=', 3)->first();
        $jadwals = Peminjaman::whereHas('ruangan', function ($query) {
            $query->where('id', ' 3');
        })
        ->where('status', 'approved')
        ->orderBy('tanggal_pinjam', 'asc')
        ->get();

        return view('b201', compact('ruangan', 'jadwals'));
    }



}
