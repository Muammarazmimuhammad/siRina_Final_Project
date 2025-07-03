<?php

// use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\RuanganController;
// use App\Http\Controllers\Admin\InventarisController;
use App\Http\Controllers\admin\InventarisController; // Tambahkan ini di atas jika belum ada
use App\Http\Controllers\User\PeminjamanInventarisController as UserPeminjamanInventarisController;
use App\Http\Controllers\Admin\PeminjamanInventarisController as AdminPeminjamanInventarisController;
use App\Http\Controllers\CekKetersediaanRuanganController;
use App\Http\Controllers\HomeController;
use App\Models\Inventaris;

use App\Models\Ruangan;


Route::get('/ruangan', [HomeController::class, 'ruangan'])->name('ruangan.index');


// Route::get('/', [HomeController::class, 'index']);

// ✅ Data Inventaris
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris.index');
    Route::get('/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
    Route::post('/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::get('/inventaris/{id}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
    Route::put('/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
    Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');
});


Route::get('/cek-ketersediaan', [CekKetersediaanRuanganController::class, 'form'])
    ->name('cek.ketersediaan.form');

Route::post('/cek-ketersediaan/cek', [CekKetersediaanRuanganController::class, 'cek'])
    ->name('cek.ketersediaan.cek');

// ✅ Cek Ketersediaan Ruangan
Route::get('/cek-ketersediaan-ruangan', [CekKetersediaanRuanganController::class, 'form'])->name('cek.ketersediaan.form');
Route::post('/cek-ketersediaan-ruangan', [CekKetersediaanRuanganController::class, 'cek'])->name('cek.ketersediaan.cek');

// ✅ Static Views
Route::get('/audit', [RuanganController::class, 'showAuditorium'])->name('audit');
Route::get('/auditorium', [RuanganController::class, 'showAuditorium'])->name('auditorium.show');
Route::get('/a201', [RuanganController::class, 'showA201'])->name('a201');
Route::get('/b201', [RuanganController::class, 'showB201'])->name('b201');
Route::get('/inventaris/proyektor', [InventarisController::class, 'showProyektor'])->name('proyektor');



Route::get('/', function () {
    // Ambil 3 item inventaris favorit (contoh)
    $inventarisFavorit = Inventaris::take(3)->get(); 
    return view('welcome', compact('inventarisFavorit'));
});
// Route dinamis untuk menampilkan detail SEMUA item inventaris
Route::get('/inventaris/{inventaris}', [InventarisController::class, 'show'])->name('inventaris.show');


//home
Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    }

    $gedung = \App\Models\Ruangan::select('gedung')->distinct()->pluck('gedung');
    return view('welcome', compact('gedung'));
});


// ✅ USER ROUTES
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Form peminjaman ruangan
    Route::get('/user/peminjaman/ruangan', [PeminjamanController::class, 'formRuangan'])->name('user.peminjaman.ruangan');
    Route::post('/user/peminjaman/ruangan', [PeminjamanController::class, 'storeRuangan'])->name('user.peminjaman.ruangan.store');

    // Form peminjaman inventaris
    Route::get('/user/peminjaman/inventaris', [UserPeminjamanInventarisController::class, 'create'])->name('user.peminjaman.inventaris');
    Route::post('/user/peminjaman/inventaris', [UserPeminjamanInventarisController::class, 'store'])->name('user.peminjaman.inventaris.store');
    
});

// ✅ ADMIN ROUTES
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/user', [AdminDashboardController::class, 'show'])->name('admin.users.index');

    // ✅ Data Inventaris
    Route::get('/admin/inventaris', [InventarisController::class, 'index'])->name('admin.inventaris.index');
    Route::get('/admin/inventaris/create', [InventarisController::class, 'create'])->name('admin.inventaris.create');
    Route::post('/admin/inventaris', [InventarisController::class, 'store'])->name('admin.inventaris.store');
    Route::get('/admin/inventaris/{id}/edit', [InventarisController::class, 'edit'])->name('admin.inventaris.edit');
    Route::put('/admin/inventaris/{id}', [InventarisController::class, 'update'])->name('admin.inventaris.update');
    Route::delete('/admin/inventaris/{id}', [InventarisController::class, 'destroy'])->name('admin.inventaris.destroy');

    // ✅ Data Peminjaman Ruangan
    Route::get('/admin/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/admin/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('admin.peminjaman.show');
    Route::patch('/admin/peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])->name('admin.peminjaman.approve');
    Route::patch('/admin/peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])->name('admin.peminjaman.reject');

    // ✅ Data Peminjaman Inventaris
    Route::get('/admin/peminjaman-inventaris', [AdminPeminjamanInventarisController::class, 'index'])->name('admin.peminjaman_inventaris.index');
    Route::get('/admin/peminjaman-inventaris/{id}', [AdminPeminjamanInventarisController::class, 'show'])->name('admin.peminjaman_inventaris.show');
    Route::patch('/admin/peminjaman-inventaris/{id}/approve', [AdminPeminjamanInventarisController::class, 'approve'])->name('admin.peminjaman_inventaris.approve');
    Route::patch('/admin/peminjaman-inventaris/{id}/reject', [AdminPeminjamanInventarisController::class, 'reject'])->name('admin.peminjaman_inventaris.reject');

    // ✅ Resource Data Ruangan
    Route::resource('/admin/ruangan', RuanganController::class)->names([
        'index'   => 'admin.ruangan.index',
        'create'  => 'admin.ruangan.create',
        'store'   => 'admin.ruangan.store',
        'show'    => 'admin.ruangan.show',
        'edit'    => 'admin.ruangan.edit',
        'update'  => 'admin.ruangan.update',
        'destroy' => 'admin.ruangan.destroy',
    ]);
});

// ✅ Redirect setelah login berdasarkan usertype
Route::get('/redirect-after-login', function () {
    $user = Auth::user();
    return $user?->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
})->middleware('auth');

// ✅ Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// ✅ Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Auth generated routes

Route::get('/admin', function () {
    return 'abcd';
});
require __DIR__ . '/auth.php';
