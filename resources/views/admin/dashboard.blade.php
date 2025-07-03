@extends('layouts.app')

@section('title', 'Admin Dashboard')

@push('styles')
<style>
    /* === Custom Dashboard Theme: Blue Professional === */

    /* Body background color for a cohesive look */
    .content-wrapper {
        background-color: #f8fafc; /* slate-50 */
    }

    /* Header Styling */
    .dashboard-header .welcome-text {
        color: #475569; /* slate-600 */
    }
    .dashboard-header .welcome-text .user-name {
        font-weight: 600;
        color: #1e3a8a; /* blue-900 */
    }
    .dashboard-header .main-title {
        font-weight: 800;
        color: #1e293b; /* slate-800 */
    }

    /* Modern Stat Card */
    .stat-card-v2 {
        background-color: #ffffff;
        border-radius: 0.75rem;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #e2e8f0; /* slate-200 */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    .stat-card-v2:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(28, 58, 138, 0.1);
    }
    .stat-card-v2 .stat-icon {
        position: absolute;
        right: 1.5rem;
        top: 1.5rem;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.75rem;
        background-color: var(--icon-bg-color, #e0e7ff);
        color: var(--icon-color, #3730a3);
        opacity: 0.9;
    }
    .stat-card-v2 .stat-title {
        color: #64748b; /* slate-500 */
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .stat-card-v2 .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e293b; /* slate-800 */
        line-height: 1;
    }
    .stat-card-v2 .stat-footer {
        margin-top: 1.5rem;
        padding-top: 0.75rem;
        border-top: 1px solid #e2e8f0; /* slate-200 */
    }
    .stat-card-v2 .stat-footer a {
        color: #475569; /* slate-600 */
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .stat-card-v2 .stat-footer a:hover {
        color: #1e3a8a; /* blue-900 */
    }

    /* Custom Card for Activity/Upcoming Loans */
    .info-card {
        background-color: #ffffff;
        border-radius: 0.75rem;
        border: 1px solid #e2e8f0;
        height: 100%;
    }
    .info-card .card-header {
        border-bottom: 1px solid #e2e8f0;
    }
    .info-card .card-title {
        font-weight: 600;
        color: #1e293b;
    }
    .activity-list .activity-item {
        display: flex;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f1f5f9; /* slate-100 */
    }
    .activity-list .activity-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    .activity-list .activity-icon {
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #ffffff;
        margin-right: 1rem;
    }
    .activity-list .activity-text {
        color: #475569;
    }
    .activity-list .activity-time {
        font-size: 0.8rem;
        color: #94a3b8; /* slate-400 */
        margin-top: 2px;
    }
</style>
@endpush

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header dashboard-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 main-title">Dashboard</h1>
                <p class="welcome-text">Selamat datang kembali, <span class="user-name">{{ Auth::user()->name ?? 'Administrator' }}</span>!</p>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Baris Kartu Statistik -->
        <div class="row">
            <!-- Card Total Ruangan -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-card-v2" style="--icon-bg-color: #e0e7ff; --icon-color: #4338ca;">
                    <div>
                        <div class="stat-icon"><i class="fas fa-door-open"></i></div>
                        <p class="stat-title">Total Ruangan</p>
                        <h3 class="stat-number">{{ count($data['ruangans'] ?? []) }}</h3>
                    </div>
                    <div class="stat-footer">
                        <a href="{{ route('admin.ruangan.index') }}">Lihat Detail <i class="fas fa-arrow-right ml-1 text-xs"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card Total Inventaris -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-card-v2" style="--icon-bg-color: #dcfce7; --icon-color: #16a34a;">
                    <div>
                        <div class="stat-icon"><i class="fas fa-boxes-stacked"></i></div>
                        <p class="stat-title">Total Inventaris</p>
                        <h3 class="stat-number">{{ $data['inventarisCount'] ?? '0' }}</h3>
                    </div>
                    <div class="stat-footer">
                        <a href="{{ route('admin.inventaris.index') }}">Lihat Detail <i class="fas fa-arrow-right ml-1 text-xs"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card Total Pengguna -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-card-v2" style="--icon-bg-color: #cffafe; --icon-color: #0891b2;">
                    <div>
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <p class="stat-title">Total Pengguna</p>
                        <h3 class="stat-number">{{ $data['userCount'] ?? '0' }}</h3>
                    </div>
                    <div class="stat-footer">
                        <a href="#">Lihat Detail <i class="fas fa-arrow-right ml-1 text-xs"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card Peminjaman Pending -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="stat-card-v2" style="--icon-bg-color: #fef9c3; --icon-color: #ca8a04;">
                    <div>
                        <div class="stat-icon"><i class="fas fa-clock"></i></div>
                        <p class="stat-title">Perlu Persetujuan</p>
                        <h3 class="stat-number">{{ $data['pendingCount'] ?? '0' }}</h3>
                    </div>
                    <div class="stat-footer">
                        <a href="#">Lihat Detail <i class="fas fa-arrow-right ml-1 text-xs"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Baris Info Tambahan -->
        <div class="row mt-4">
            <div class="col-lg-7">
                <div class="card info-card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-history mr-2"></i>Aktivitas Terkini</h3>
                    </div>
                    <div class="card-body activity-list">
                        <!-- Contoh Item Aktivitas -->
                        <div class="activity-item">
                            <div class="activity-icon bg-success"><i class="fas fa-check"></i></div>
                            <div>
                                <p class="activity-text mb-0">Peminjaman <strong>Ruang Rapat</strong> disetujui.</p>
                                <p class="activity-time mb-0">5 menit yang lalu</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon bg-warning"><i class="fas fa-hourglass-start"></i></div>
                            <div>
                                <p class="activity-text mb-0">Permintaan baru untuk <strong>Proyektor A1</strong> menunggu persetujuan.</p>
                                <p class="activity-time mb-0">30 menit yang lalu</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon bg-info"><i class="fas fa-plus"></i></div>
                            <div>
                                <p class="activity-text mb-0">Inventaris baru <strong>Kursi Ergonomis</strong> ditambahkan.</p>
                                <p class="activity-time mb-0">2 jam yang lalu</p>
                            </div>
                        </div>
                         <div class="activity-item">
                            <div class="activity-icon bg-danger"><i class="fas fa-times"></i></div>
                            <div>
                                <p class="activity-text mb-0">Peminjaman <strong>Aula Utama</strong> ditolak.</p>
                                <p class="activity-time mb-0">1 hari yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                 <div class="card info-card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-calendar-alt mr-2"></i>Peminjaman Mendatang</h3>
                    </div>
                    <div class="card-body activity-list">
                        <!-- Contoh Peminjaman Mendatang -->
                        <div class="activity-item">
                            <div class="activity-icon bg-primary"><i class="fas fa-door-open"></i></div>
                            <div>
                                <p class="activity-text mb-0"><strong>Ruang Diskusi</strong> oleh DPM IM STT-NF</p>
                                <p class="activity-time mb-0">Besok, 10:00 WIB</p>
                            </div>
                        </div>
                         <div class="activity-item">
                            <div class="activity-icon bg-purple"><i class="fas fa-microphone"></i></div>
                            <div>
                                <p class="activity-text mb-0"><strong>Sound System</strong> oleh UKM </p>
                                <p class="activity-time mb-0">Besok, 14:00 WIB</p>
                            </div>
                        </div>
                         <div class="activity-item">
                            <div class="activity-icon bg-primary"><i class="fas fa-chalkboard-teacher"></i></div>
                            <div>
                                <p class="activity-text mb-0"><strong>Laboratorium Komputer</strong> oleh HIMAT II</p>
                                <p class="activity-time mb-0">Lusa, 08:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection