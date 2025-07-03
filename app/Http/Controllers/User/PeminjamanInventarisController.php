<?php

namespace App\Http\Controllers\User;

use App\Models\Inventaris;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PeminjamanInventaris;
use Carbon\Carbon;



class PeminjamanInventarisController extends Controller

{

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class, 'inventaris_id');
    }


    public function store(Request $request)
    {
        $request->validate([
            'inventaris_id' => 'required|exists:inventaris,id',
            'jumlah_pinjam' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keperluan' => 'required|string',
        ]);


        // $peminjaman = PeminjamanInventaris::create([
        //     'user_id' => Auth::id(),
        //     'inventaris_id' => $request->inventaris_id,
        //     'jumlah' => $request->jumlah_pinjam,
        //     'tanggal_pinjam' => $request->tanggal_pinjam,
        //     'tanggal_kembali' => $request->tanggal_pinjam, // ✅ SOLUSI
        //     'jam_mulai' => $request->jam_mulai,
        //     'jam_selesai' => $request->jam_selesai,
        //     'status' => 'menunggu',
        //     'keperluan' => $request->keperluan,
        // ]);
        $peminjaman = PeminjamanInventaris::create([
            'user_id' => Auth::id(),
            'inventaris_id' => $request->inventaris_id,
            'jumlah' => $request->jumlah_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => Carbon::parse($request->tanggal_pinjam)->addDay(), // ✅ +1 hari
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'menunggu',
            'keperluan' => $request->keperluan,
        ]);




        return redirect()->route('user.dashboard')->with('success', 'Peminjaman inventaris berhasil diajukan!');
    }
    public function create()
    {
        $inventaris = Inventaris::all(); // ambil semua inventaris dari database
        return view('user.peminjaman.form-inventaris', compact('inventaris'));
    }
}
