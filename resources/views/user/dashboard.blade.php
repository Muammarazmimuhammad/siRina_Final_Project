@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

@push('styles')
    {{-- CSS untuk DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <style>
        /* === Custom User Dashboard Styling === */
        .content-wrapper {
            background-color: #f8fafc; /* slate-50 */
        }

        .dashboard-header .main-title {
            font-weight: 800;
            color: #1e293b; /* slate-800 */
        }
        .dashboard-header .subtitle {
            color: #64748b; /* slate-500 */
        }

        /* Kartu Ringkasan */
        .summary-card {
            background-color: #fff;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }
        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.07);
        }
        .summary-card .icon-wrapper {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 1rem;
        }
        .summary-card .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
        }
        .summary-card .stat-label {
            font-weight: 500;
            color: #64748b;
        }

        /* Tab Styling */
        .nav-tabs .nav-link {
            font-weight: 600;
            color: #475569;
            border: none;
            border-bottom: 3px solid transparent;
            transition: all 0.2s ease;
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
            color: #1e3a8a;
            border-color: #2563eb;
            background-color: transparent;
        }
        .nav-tabs .nav-link:hover {
            border-color: #dbeafe;
        }

        /* Tabel Custom */
        .table-custom { width: 100% !important; border-collapse: collapse !important; }
        .table-custom thead th { 
            background-color: #f8fafc; 
            color: #334155; 
            font-weight: 600; 
            text-transform: uppercase; 
            font-size: 0.8rem; 
            border-bottom: 2px solid #e2e8f0;
            padding: 0.75rem 1rem; /* PERUBAHAN: Menambah padding */
        }
        .table-custom tbody tr:hover { background-color: #f8fafc; }
        .table-custom td { 
            vertical-align: middle; 
            color: #475569; 
            padding: 0.75rem 1rem; /* PERUBAHAN: Menambah padding */
            border-top: 1px solid #eef2f6;
        }
        .table-custom tbody tr:first-child td {
            border-top: none;
        }


        /* Badge Status */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.3em 0.75em;
            font-size: 0.85em;
            font-weight: 600;
            border-radius: 9999px;
            text-transform: capitalize;
        }
        .status-badge i { font-size: 0.7em; margin-right: 6px; position: relative; top: -1px; }
        .status-badge.pending, .status-badge.menunggu { background-color: #fef9c3; color: #ca8a04; } /* yellow */
        .status-badge.approved, .status-badge.disetujui { background-color: #dcfce7; color: #16a34a; } /* green */
        .status-badge.rejected, .status-badge.ditolak { background-color: #fee2e2; color: #ef4444; } /* red */
        .status-badge.completed, .status-badge.selesai { background-color: #e5e7eb; color: #4b5563; } /* gray */
    </style>
@endpush

@section('content')
    <!-- Content Header -->
    <div class="content-header dashboard-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 main-title">Selamat datang, {{ Auth::user()->name }}!</h1>
                    <p class="subtitle">Dasbor ini adalah pusat kendali untuk semua aktivitas peminjaman Anda.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            
            <!-- Kartu Ringkasan -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="summary-card">
                        <div class="icon-wrapper" style="background-color: #fef9c3; color: #ca8a04;"><i class="fas fa-clock"></i></div>
                        <div>
                            <div class="stat-number">{{ $peminjamans->where('status', 'pending')->count() + $riwayatInventaris->where('status', 'menunggu')->count() }}</div>
                            <div class="stat-label">Menunggu Persetujuan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="summary-card">
                        <div class="icon-wrapper" style="background-color: #dcfce7; color: #16a34a;"><i class="fas fa-check-circle"></i></div>
                        <div>
                            <div class="stat-number">{{ $peminjamans->where('status', 'approved')->count() + $riwayatInventaris->where('status', 'disetujui')->count() }}</div>
                            <div class="stat-label">Peminjaman Disetujui</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="summary-card">
                        <div class="icon-wrapper" style="background-color: #fee2e2; color: #ef4444;"><i class="fas fa-times-circle"></i></div>
                        <div>
                            <div class="stat-number">{{ $peminjamans->where('status', 'rejected')->count() + $riwayatInventaris->where('status', 'ditolak')->count() }}</div>
                            <div class="stat-label">Permintaan Ditolak</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabbed Card untuk Riwayat -->
            <div class="card mt-2">
                <div class="card-header p-0">
                    <ul class="nav nav-tabs" id="history-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active px-4 py-3" id="ruangan-tab" data-toggle="tab" href="#ruangan-history" role="tab" aria-controls="ruangan-history" aria-selected="true">
                                <i class="fas fa-door-open mr-2"></i>Riwayat Peminjaman Ruangan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-3" id="inventaris-tab" data-toggle="tab" href="#inventaris-history" role="tab" aria-controls="inventaris-history" aria-selected="false">
                               <i class="fas fa-boxes-stacked mr-2"></i>Riwayat Peminjaman Inventaris
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="history-tabs-content">
                        <!-- Tab Riwayat Ruangan -->
                        <div class="tab-pane fade show active" id="ruangan-history" role="tabpanel" aria-labelledby="ruangan-tab">
                            <table id="ruangan-table" class="table-custom">
                                <thead>
                                    <tr><th>No</th><th>Nama Ruangan</th><th>Tanggal</th><th>Waktu</th><th>Keperluan</th><th>Status</th></tr>
                                </thead>
                                <tbody>
                                    @forelse($peminjamans as $peminjaman)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peminjaman->ruangan->nama ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->isoFormat('D MMM YYYY') }}</td>
                                        <td>{{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}</td>
                                        <td>{{ $peminjaman->keperluan }}</td>
                                        <td>
                                            @php $status = strtolower($peminjaman->status); $icon = 'fa-question-circle'; if($status == 'pending') $icon = 'fa-clock'; if($status == 'approved') $icon = 'fa-check-circle'; if($status == 'rejected') $icon = 'fa-times-circle'; @endphp
                                            <span class="status-badge {{ $status }}"><i class="fas {{ $icon }}"></i> {{ ucfirst($status) }}</span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="6" class="text-center py-5">Belum ada data peminjaman ruangan.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- Tab Riwayat Inventaris -->
                        <div class="tab-pane fade" id="inventaris-history" role="tabpanel" aria-labelledby="inventaris-tab">
                            <table id="inventaris-table" class="table-custom">
                                <thead>
                                    <tr><th>No</th><th>Nama Inventaris</th><th>Jumlah</th><th>Tanggal</th><th>Waktu</th><th>Status</th></tr>
                                </thead>
                                <tbody>
                                    @forelse($riwayatInventaris as $inventaris)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $inventaris->inventaris->nama ?? '-' }}</td>
                                        <td>{{ $inventaris->jumlah }}</td>
                                        <td>{{ \Carbon\Carbon::parse($inventaris->tanggal_pinjam)->isoFormat('D MMM YYYY') }}</td>
                                        <td>{{ $inventaris->jam_mulai }} - {{ $inventaris->jam_selesai }}</td>
                                        <td>
                                            @php $status = strtolower($inventaris->status); $icon = 'fa-question-circle'; if($status == 'menunggu') $icon = 'fa-clock'; if($status == 'disetujui') $icon = 'fa-check-circle'; if($status == 'ditolak') $icon = 'fa-times-circle'; if($status == 'selesai') $icon = 'fa-check-double'; @endphp
                                            <span class="status-badge {{ $status }}"><i class="fas {{ $icon }}"></i> {{ ucfirst($status) }}</span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="6" class="text-center py-5">Belum ada data peminjaman inventaris.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Memastikan jQuery dan Bootstrap JS termuat SEBELUM script lain --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Scripts untuk DataTables --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Opsi kustom untuk menyembunyikan beberapa elemen
            var customOptions = {
                "language": { "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json" },
                "responsive": true,
                "autoWidth": false,
                "info": false, // PERUBAHAN: Menghilangkan teks "Showing x of y entries"
                "lengthChange": false // PERUBAHAN: Menghilangkan dropdown "Show X entries"
            };

            // Inisialisasi DataTable untuk kedua tabel dengan opsi kustom
            var ruanganTable = $('#ruangan-table').DataTable(customOptions);
            var inventarisTable = $('#inventaris-table').DataTable(customOptions);

            // Memastikan tabel di-adjust ulang saat tab ditampilkan
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
            });
        });
    </script>
@endpush