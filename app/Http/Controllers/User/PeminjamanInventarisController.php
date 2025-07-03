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
    /**
     * Menampilkan form untuk membuat peminjaman inventaris baru.
     */
    public function create()
    {
        $inventaris = Inventaris::where('jumlah', '>', 0)->get(); // Hanya tampilkan inventaris yang stoknya ada
        return view('user.peminjaman.form-inventaris', compact('inventaris'));
    }

    /**
     * Menyimpan data peminjaman inventaris baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk dari form
        $validatedData = $request->validate([
            'inventaris_id' => 'required|exists:inventaris,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'keperluan' => 'required|string|max:500',
        ]);

        // 2. Tambahkan ID Pengguna yang Sedang Login
        $validatedData['user_id'] = Auth::id();

        // 3. Set Status Awal Peminjaman menggunakan konstanta dari Model
        $validatedData['status'] = PeminjamanInventaris::STATUS_MENUNGGU;
        
        // 4. Set Tanggal Kembali (Contoh: +1 hari, bisa disesuaikan)
        $validatedData['tanggal_kembali'] = Carbon::parse($request->tanggal_pinjam)->addDay();

        // 5. Simpan Data ke Database
        PeminjamanInventaris::create($validatedData);

        // 6. Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('user.dashboard')
                         ->with('success', 'Permintaan peminjaman inventaris berhasil diajukan!');
    }
}
