@extends('layouts.app')

@section('title', 'Data Ruangan')

@push('styles')
    {{-- CSS untuk DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <style>
        /* === Custom Grid & Table Styling === */

        /* View Switcher */
        .view-switcher .btn {
            background-color: #f1f5f9; /* slate-100 */
            color: #64748b; /* slate-500 */
            border: none;
            font-size: 1rem;
        }
        .view-switcher .btn.active {
            background-color: #1e3a8a; /* blue-900 */
            color: #ffffff;
        }

        /* --- Grid View Styling --- */
        .ruangan-card {
            background-color: #fff;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .ruangan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(28, 58, 138, 0.1);
        }
        .ruangan-card-img {
            height: 180px;
            background-size: cover;
            background-position: center;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }
        .ruangan-card-body {
            padding: 1rem 1.25rem;
            flex-grow: 1;
        }
        .ruangan-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .ruangan-card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e293b;
        }
        .ruangan-card-type {
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.2rem 0.5rem;
            border-radius: 0.25rem;
            background-color: #e0e7ff;
            color: #4338ca;
            text-transform: uppercase;
        }
        .ruangan-card-details {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
            color: #475569;
        }
        .ruangan-card-details li {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .ruangan-card-details .fas {
            width: 20px;
            color: #94a3b8;
            margin-right: 0.75rem;
        }
        .ruangan-card-facilities {
            margin-bottom: 1rem;
        }
        .facility-badge {
            display: inline-block;
            padding: 0.3em 0.6em;
            font-size: 0.85em;
            font-weight: 500;
            border-radius: 0.375rem;
            background-color: #f1f5f9;
            color: #475569;
            margin: 2px;
        }
        .ruangan-card-footer {
            padding: 1rem 1.25rem;
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            border-bottom-left-radius: 0.75rem;
            border-bottom-right-radius: 0.75rem;
        }
        .action-btn {
            border-radius: 0.375rem;
            font-weight: 600;
            border: none;
        }

        /* --- Table View Styling (Copied from previous solution) --- */
        #table-view { display: none; } /* Hidden by default */
        .table-custom { width: 100% !important; }
        .table-custom thead th { background-color: #f8fafc; color: #334155; font-weight: 600; text-transform: uppercase; font-size: 0.8rem; border-bottom: 2px solid #e2e8f0; }
        .table-custom tbody tr:hover { background-color: #f8fafc; }
        .dataTables_wrapper .dataTables_paginate .paginate_button.page-item.active .page-link { background-color: #1e3a8a; border-color: #1e3a8a; }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 800; color: #1e293b;">Data Ruangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Ruangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group view-switcher" role="group">
                            <button type="button" class="btn active" id="show-grid-view" title="Grid View"><i class="fas fa-th-large"></i></button>
                            <button type="button" class="btn" id="show-table-view" title="Table View"><i class="fas fa-list"></i></button>
                        </div>
                        <a href="{{ route('admin.ruangan.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus mr-1"></i> Tambah Ruangan
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif

                    <div id="grid-view">
                        <div class="row">
                            @forelse($ruangans as $ruangan)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="ruangan-card">
                                        <div class="ruangan-card-img" style="background-image: url('https://placehold.co/600x400/e2e8f0/334155?text={{ urlencode($ruangan->nama) }}')"></div>
                                        <div class="ruangan-card-body">
                                            <div class="ruangan-card-header">
                                                <h3 class="ruangan-card-title">{{ $ruangan->nama }}</h3>
                                                <span class="ruangan-card-type">{{ $ruangan->tipe }}</span>
                                            </div>
                                            <ul class="ruangan-card-details">
                                                <li><i class="fas fa-building"></i> {{ $ruangan->gedung }}</li>
                                                <li><i class="fas fa-layer-group"></i> Lantai {{ $ruangan->lantai }}</li>
                                                <li><i class="fas fa-users"></i> Kapasitas {{ $ruangan->kapasitas }} orang</li>
                                            </ul>
                                            <div class="ruangan-card-facilities">
                                                @foreach(json_decode($ruangan->fasilitas ?? '[]') as $fas)
                                                    <span class="facility-badge">{{ $fas }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="ruangan-card-footer">
                                            <form action="{{ route('admin.ruangan.destroy', $ruangan->id) }}" method="POST" class="d-flex justify-content-end" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">
                                                <a href="{{ route('admin.ruangan.edit', $ruangan->id) }}" class="btn btn-sm btn-outline-secondary action-btn mr-2">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger action-btn">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center text-muted">Belum ada data ruangan.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div id="table-view">
                        <table id="ruangan-table" class="table-custom">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gedung</th>
                                    <th>Lantai</th>
                                    <th>Kapasitas</th>
                                    <th>Tipe</th>
                                    <th>Fasilitas</th>
                                    <th style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ruangans as $ruangan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ruangan->nama }}</td>
                                        <td>{{ $ruangan->gedung }}</td>
                                        <td>{{ $ruangan->lantai }}</td>
                                        <td>{{ $ruangan->kapasitas }}</td>
                                        <td>{{ $ruangan->tipe }}</td>
                                        <td>
                                            @foreach(json_decode($ruangan->fasilitas ?? '[]') as $fas)
                                                <span class="facility-badge">{{ $fas }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.ruangan.edit', $ruangan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.ruangan.destroy', $ruangan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Scripts untuk DataTables --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#ruangan-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });

            // View Switcher Logic
            $('#show-grid-view').on('click', function() {
                $('#table-view').hide();
                $('#grid-view').show();
                $(this).addClass('active').siblings().removeClass('active');
            });

            $('#show-table-view').on('click', function() {
                $('#grid-view').hide();
                $('#table-view').show();
                $(this).addClass('active').siblings().removeClass('active');
                // Re-draw the table to fix header width issues
                table.columns.adjust().draw();
            });
        });
    </script>
@endpush