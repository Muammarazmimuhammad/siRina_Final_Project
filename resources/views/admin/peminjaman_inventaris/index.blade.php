@extends('layouts.app')

@section('title', 'Peminjaman Inventaris')

@push('styles')
    {{-- CSS untuk DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <style>
        /* === Custom Peminjaman Page Styling === */

        /* Kartu Filter */
        .filter-card {
            background-color: #fff;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            padding: 1.25rem;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            margin-bottom: 1rem;
        }
        .filter-card .icon {
            position: absolute;
            right: -10px;
            bottom: -15px;
            font-size: 4rem;
            color: rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        .filter-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(28, 58, 138, 0.1);
        }
        .filter-card:hover .icon {
            transform: scale(1.1) rotate(-5deg);
        }
        .filter-card h3 {
            font-size: 2.25rem;
            font-weight: 800;
            margin: 0;
            color: #1e293b;
        }
        .filter-card p {
            margin: 0;
            font-weight: 600;
            color: #64748b;
        }
        .filter-card.active {
            border-color: #4f46e5;
            background-color: #eef2ff;
        }
        .filter-card.active p {
            color: #4f46e5;
        }
        
        /* Tabel Custom */
        .table-custom { width: 100% !important; }
        .table-custom thead th { background-color: #f8fafc; color: #334155; font-weight: 600; text-transform: uppercase; font-size: 0.8rem; border-bottom: 2px solid #e2e8f0; }
        .table-custom tbody tr:hover { background-color: #f8fafc; }
        .table-custom td { vertical-align: middle; }

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
        .status-badge i { font-size: 0.6em; margin-right: 6px; }
        .status-badge.menunggu { background-color: #fef9c3; color: #ca8a04; } /* yellow */
        .status-badge.disetujui { background-color: #dcfce7; color: #16a34a; } /* green */
        .status-badge.ditolak { background-color: #fee2e2; color: #ef4444; } /* red */
        .status-badge.selesai { background-color: #e5e7eb; color: #4b5563; } /* gray */

        /* Tombol Aksi */
        .action-btn {
            display: inline-flex;
            align-items: center; justify-content: center;
            width: 32px; height: 32px;
            border-radius: 50%; border: none;
            color: #fff; transition: all 0.2s ease;
            font-size: 0.9rem; margin: 0 2px;
        }
        .action-btn.btn-approve { background-color: #22c55e; }
        .action-btn.btn-approve:hover { background-color: #16a34a; }
        .action-btn.btn-reject { background-color: #ef4444; }
        .action-btn.btn-reject:hover { background-color: #dc2626; }
    </style>
@endpush

@section('content')
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 800; color: #1e293b;">Manajemen Peminjaman Inventaris</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Peminjaman Inventaris</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            
            <!-- Filter Cards -->
            <div class="row">
                <div class="col-lg-3 col-6"><div class="filter-card active" data-status=""><i class="fas fa-list-alt icon"></i><h3>{{ $peminjamans->count() }}</h3><p>Semua</p></div></div>
                <div class="col-lg-3 col-6"><div class="filter-card" data-status="Menunggu"><i class="fas fa-clock icon"></i><h3>{{ $peminjamans->where('status', 'menunggu')->count() }}</h3><p>Menunggu</p></div></div>
                <div class="col-lg-3 col-6"><div class="filter-card" data-status="Disetujui"><i class="fas fa-check-circle icon"></i><h3>{{ $peminjamans->where('status', 'disetujui')->count() }}</h3><p>Disetujui</p></div></div>
                <div class="col-lg-3 col-6"><div class="filter-card" data-status="Selesai"><i class="fas fa-check-double icon"></i><h3>{{ $peminjamans->where('status', 'selesai')->count() }}</h3><p>Selesai</p></div></div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            <div class="card mt-4">
                <div class="card-body">
                    <table id="peminjaman-table" class="table-custom">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Inventaris</th>
                                <th>Peminjam</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peminjamans as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="font-weight-bold">{{ $peminjaman->inventaris->nama ?? '-' }}</div>
                                        <small class="text-muted">Jumlah: {{ $peminjaman->jumlah }}</small>
                                    </td>
                                    <td>{{ $peminjaman->user->name ?? '-' }}</td>
                                    <td>
                                        <div class="font-weight-bold">{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->isoFormat('D MMM Y') }}</div>
                                        <small class="text-muted">{{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}</small>
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = str_replace(' ', '-', $peminjaman->status);
                                            $statusIcon = 'fa-question-circle';
                                            if ($peminjaman->status == 'menunggu') $statusIcon = 'fa-clock';
                                            if ($peminjaman->status == 'disetujui') $statusIcon = 'fa-check-circle';
                                            if ($peminjaman->status == 'ditolak') $statusIcon = 'fa-times-circle';
                                            if ($peminjaman->status == 'selesai') $statusIcon = 'fa-check-double';
                                        @endphp
                                        <span class="status-badge {{ $statusClass }}"><i class="fas {{ $statusIcon }}"></i> {{ $peminjaman->status }}</span>
                                    </td>
                                    <td>
                                        @if($peminjaman->status == 'menunggu')
                                            <form action="{{ route('admin.peminjaman_inventaris.approve', $peminjaman->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Setujui peminjaman ini?')">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="action-btn btn-approve" title="Setujui"><i class="fas fa-check"></i></button>
                                            </form>
                                            <form action="{{ route('admin.peminjaman_inventaris.reject', $peminjaman->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tolak peminjaman ini?')">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="action-btn btn-reject" title="Tolak"><i class="fas fa-times"></i></button>
                                            </form>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data peminjaman inventaris.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#peminjaman-table').DataTable({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json" },
                "columnDefs": [
                    { "orderable": false, "targets": [5] }, // Disable sorting on 'Aksi'
                    { "searchable": false, "targets": [5] } 
                ]
            });

            // Filter logic
            $('.filter-card').on('click', function() {
                var status = $(this).data('status');
                $('.filter-card').removeClass('active');
                $(this).addClass('active');
                // Apply filter to the 4th column (Status)
                table.column(4).search(status).draw();
            });
        });
    </script>
@endpush