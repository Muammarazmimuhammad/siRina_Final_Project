@extends('layouts.app')

@section('title', 'Peminjaman Ruangan')

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
        .status-badge.pending { background-color: #fef9c3; color: #ca8a04; } /* yellow */
        .status-badge.approved { background-color: #dcfce7; color: #16a34a; } /* green */
        .status-badge.rejected { background-color: #fee2e2; color: #ef4444; } /* red */
        .status-badge.completed { background-color: #e0e7ff; color: #4f46e5; } /* indigo */

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
        .action-btn.btn-detail { background-color: #3b82f6; }
        .action-btn.btn-detail:hover { background-color: #2563eb; }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 800; color: #1e293b;">Manajemen Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Peminjaman Ruangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                {{-- Data count ini idealnya dikirim dari Controller --}}
                <div class="col-lg-3 col-6"><div class="filter-card active" data-status=""><i class="fas fa-list-alt icon"></i><h3>{{ $peminjamans->count() }}</h3><p>Semua Peminjaman</p></div></div>
                <div class="col-lg-3 col-6"><div class="filter-card" data-status="Menunggu"><i class="fas fa-clock icon"></i><h3>{{ $peminjamans->where('status', 'pending')->count() }}</h3><p>Menunggu Persetujuan</p></div></div>
                <div class="col-lg-3 col-6"><div class="filter-card" data-status="Disetujui"><i class="fas fa-check-circle icon"></i><h3>{{ $peminjamans->where('status', 'approved')->count() }}</h3><p>Disetujui</p></div></div>
                <div class="col-lg-3 col-6"><div class="filter-card" data-status="Ditolak"><i class="fas fa-times-circle icon"></i><h3>{{ $peminjamans->where('status', 'rejected')->count() }}</h3><p>Ditolak</p></div></div>
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
                                <th>Ruangan</th>
                                <th>Peminjam</th>
                                <th>Tanggal & Waktu</th>
                                <th>Status</th>
                                <th style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peminjamans as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="font-weight-bold">{{ $peminjaman->ruangan->nama ?? '-' }}</div>
                                        <small class="text-muted">{{ $peminjaman->keperluan }}</small>
                                    </td>
                                    <td>{{ $peminjaman->user->name ?? '-' }}</td>
                                    <td>
                                        <div class="font-weight-bold">{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->isoFormat('dddd, D MMMM Y') }}</div>
                                        <small class="text-muted">{{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}</small>
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = '';
                                            $statusIcon = 'fa-question-circle';
                                            $statusText = $peminjaman->status;

                                            if ($peminjaman->status == 'pending') {
                                                $statusClass = 'pending';
                                                $statusIcon = 'fa-clock';
                                                $statusText = 'Menunggu';
                                            } elseif ($peminjaman->status == 'approved') {
                                                $statusClass = 'approved';
                                                $statusIcon = 'fa-check-circle';
                                                $statusText = 'Disetujui';
                                            } elseif ($peminjaman->status == 'rejected') {
                                                $statusClass = 'rejected';
                                                $statusIcon = 'fa-times-circle';
                                                $statusText = 'Ditolak';
                                            } elseif ($peminjaman->status == 'completed') {
                                                $statusClass = 'completed';
                                                $statusIcon = 'fa-check-double';
                                                $statusText = 'Selesai';
                                            }
                                        @endphp
                                        <span class="status-badge {{ $statusClass }}"><i class="fas {{ $statusIcon }}"></i> {{ $statusText }}</span>
                                    </td>
                                    <td>
                                        @if($peminjaman->status == 'pending')
                                            <form action="{{ route('admin.peminjaman.approve', $peminjaman->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Setujui peminjaman ini?')">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="action-btn btn-approve" title="Setujui"><i class="fas fa-check"></i></button>
                                            </form>
                                            <form action="{{ route('admin.peminjaman.reject', $peminjaman->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tolak peminjaman ini?')">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="action-btn btn-reject" title="Tolak"><i class="fas fa-times"></i></button>
                                            </form>
                                        @endif
                                        <a href="{{-- route('admin.peminjaman.show', $peminjaman->id) --}}" class="action-btn btn-detail" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data peminjaman.</td>
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
                    { "orderable": false, "targets": [5] }, // Disable sorting on 'Aksi' column
                    { "searchable": false, "targets": [5] } // Disable search on 'Aksi' column
                ]
            });

            // Filter logic
            $('.filter-card').on('click', function() {
                var status = $(this).data('status');
                
                // Toggle active class
                $('.filter-card').removeClass('active');
                $(this).addClass('active');

                // Apply filter to the 4th column (Status)
                table.column(4).search(status).draw();
            });
        });
    </script>
@endpush