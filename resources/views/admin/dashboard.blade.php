@extends('layouts.app')

@section('title', 'Admin Dashboard')

@push('styles')
{{-- Style kustom untuk kartu statistik yang lebih modern --}}
<style>
    .stat-card {
        background-color: #ffffff;
        border: 1px solid #e5e7eb; /* Warna border yang halus */
        border-radius: 0.75rem; /* Sudut yang lebih membulat */
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.07);
    }
    .stat-card .icon-container {
        padding: 1rem;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
    }
    .stat-card .stat-title {
        font-size: 0.9rem;
        font-weight: 500;
        color: #64748b; /* slate-500 */
    }
    .stat-card .stat-number {
        font-size: 2.25rem;
        font-weight: 700;
        color: #1e293b; /* slate-800 */
    }
    .stat-card .card-footer-link {
        display: block;
        margin-top: 1rem;
        padding-top: 0.75rem;
        border-top: 1px solid #e5e7eb;
        text-align: center;
        font-weight: 500;
        transition: color 0.2s ease-in-out;
    }
</style>
@endpush

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- Judul Halaman --}}
                <h1 class="m-0 text-3xl font-bold text-slate-800">Dashboard</h1>
            </div>
        </div>
        {{-- Pesan Selamat Datang --}}
        <p class="text-slate-600">Selamat datang kembali, {{ Auth::user()->name ?? 'Administrator' }}!</p>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Baris Kartu Statistik -->
        <div class="row">

            <!-- Card Total Ruangan -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-card">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="stat-title">Total Ruangan</p>
                            {{-- MENGAMBIL TOTAL RUANGAN DARI DATA --}}
                            <h3 class="stat-number">{{ count($data['ruangans'] ?? []) }}</h3>
                        </div>
                        <div class="icon-container bg-indigo-100 text-indigo-600">
                            <i class="fas fa-door-open text-2xl"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin.ruangan.index') }}" class="card-footer-link text-indigo-600 hover:text-indigo-800">
                        Lihat Detail <i class="fas fa-arrow-circle-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Card Total Inventaris -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-card">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="stat-title">Total Inventaris</p>
                            <h3 class="stat-number">{{ $data['inventarisCount'] ?? '0' }}</h3>
                        </div>
                        <div class="icon-container bg-emerald-100 text-emerald-600">
                            <i class="fas fa-boxes-stacked text-2xl"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin.inventaris.index') }}" class="card-footer-link text-emerald-600 hover:text-emerald-800">
                        Lihat Detail <i class="fas fa-arrow-circle-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Card Total Pengguna -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-card">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="stat-title">Total Pengguna</p>
                            <h3 class="stat-number">{{ $data['userCount'] ?? '0' }}</h3>
                        </div>
                        <div class="icon-container bg-blue-100 text-blue-600">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                    </div>
                    <a href="{{-- route('admin.users.index') --}}" class="card-footer-link text-blue-600 hover:text-blue-800">
                        Lihat Detail <i class="fas fa-arrow-circle-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Card Peminjaman Pending -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-card">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="stat-title">Perlu Persetujuan</p>
                            <h3 class="stat-number">{{ $data['pendingCount'] ?? '0' }}</h3>
                        </div>
                        <div class="icon-container bg-amber-100 text-amber-600">
                            <i class="fas fa-clock text-2xl"></i>
                        </div>
                    </div>
                    <a href="{{-- route('admin.peminjaman.pending') --}}" class="card-footer-link text-amber-600 hover:text-amber-800">
                        Lihat Detail <i class="fas fa-arrow-circle-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
