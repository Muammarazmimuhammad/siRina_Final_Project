<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Ruangan;
use App\Models\User;
use App\Models\Peminjaman; // Pastikan model Peminjaman ada dan di-import

class DashboardController extends Controller
{
    /**
     * Menerapkan middleware untuk memastikan hanya admin yang bisa mengakses.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Menampilkan halaman dashboard admin dengan data statistik.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Menyiapkan array untuk menampung semua data yang akan dikirim ke view
        $data = [
            // Menghitung total semua user
            'userCount' => User::count(),
            
            // Menghitung total semua inventaris
            'inventarisCount' => Inventaris::count(),
            
            // MENGAMBIL SEMUA DATA RUANGAN (INI YANG MEMPERBAIKI MASALAH ANDA)
            'ruangans' => Ruangan::all(),
            
            // Menghitung jumlah peminjaman yang statusnya masih 'pending'
            // Ganti 'Peminjaman' dengan nama model Anda yang sesuai jika berbeda
            'pendingCount' => Peminjaman::where('status', 'pending')->count()
        ];

        // Mengirim array $data ke view 'admin.dashboard'
        return view('admin.dashboard', compact('data'));
    }
}
