@extends('layouts.app')

@section('title', 'Data Inventaris')

@push('styles')
    {{-- CSS untuk DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <style>
        /* === Custom Grid & Table Styling for Inventaris === */

        /* View Switcher */
        .view-switcher .btn {
            background-color: #f1f5f9;
            color: #64748b;
            border: none;
            font-size: 1rem;
        }
        .view-switcher .btn.active {
            background-color: #1e3a8a;
            color: #ffffff;
        }

        /* --- Grid View Styling --- */
        .inventaris-card {
            background-color: #fff;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .inventaris-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(28, 58, 138, 0.1);
        }
        .inventaris-card-img {
            height: 180px;
            background-size: cover;
            background-position: center;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }
        .inventaris-card-body {
            padding: 1rem 1.25rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .inventaris-card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
        }
        .inventaris-card-details {
            list-style: none;
            padding: 0;
            margin: 0;
            color: #475569;
            flex-grow: 1;
        }
        .inventaris-card-details li {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
        }
        .inventaris-card-details .fas {
            width: 20px;
            color: #94a3b8;
            margin-right: 0.75rem;
        }
        .condition-badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: 0.9em;
            font-weight: 600;
            border-radius: 0.375rem;
            color: #fff;
        }
        .condition-badge.baik { background-color: #22c55e; }
        .condition-badge.rusak-ringan { background-color: #f59e0b; }
        .condition-badge.rusak-berat { background-color: #ef4444; }
        
        .inventaris-card-footer {
            padding: 1rem 1.25rem;
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }
        .action-btn { border-radius: 0.375rem; font-weight: 600; border: none; }

        /* --- Table View Styling --- */
        #table-view { display: none; }
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
                    <h1 class="m-0" style="font-weight: 800; color: #1e293b;">Data Inventaris</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Inventaris</li>
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
                        <a href="{{ route('admin.inventaris.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus mr-1"></i> Tambah Inventaris
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
                            @forelse($inventaris as $item)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="inventaris-card">
                                        @php
                                            $imageUrl = ($item->image && file_exists(public_path('storage/' . $item->image)))
                                                ? asset('storage/' . $item->image)
                                                : 'https://placehold.co/600x400/e2e8f0/334155?text=' . urlencode($item->nama);
                                        @endphp
                                        <div class="inventaris-card-img" style="background-image: url('{{ $imageUrl }}')"></div>
                                        <div class="inventaris-card-body">
                                            <h3 class="inventaris-card-title">{{ $item->nama }}</h3>
                                            <ul class="inventaris-card-details">
                                                <li><i class="fas fa-boxes-stacked"></i> Jumlah: <strong>{{ $item->jumlah }}</strong></li>
                                                <li>
                                                    <i class="fas fa-heart-pulse"></i>
                                                    @php
                                                        $kondisi = strtolower($item->kondisi);
                                                        $badgeClass = 'baik';
                                                        if ($kondisi == 'rusak ringan') $badgeClass = 'rusak-ringan';
                                                        if ($kondisi == 'rusak berat') $badgeClass = 'rusak-berat';
                                                    @endphp
                                                    <span class="condition-badge {{ $badgeClass }}">{{ $item->kondisi }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="inventaris-card-footer">
                                            <form action="{{ route('admin.inventaris.destroy', $item->id) }}" method="POST" class="d-flex justify-content-end" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                                <a href="{{ route('admin.inventaris.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary action-btn mr-2">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger action-btn">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center text-muted">Belum ada data inventaris.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div id="table-view">
                         <table id="inventaris-table" class="table-custom">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Kondisi</th>
                                    <th style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventaris as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>
                                            @php
                                                $kondisi = strtolower($item->kondisi);
                                                $badgeClass = '';
                                                if ($kondisi == 'baik') $badgeClass = 'baik';
                                                elseif ($kondisi == 'rusak ringan') $badgeClass = 'rusak-ringan';
                                                elseif ($kondisi == 'rusak berat') $badgeClass = 'rusak-berat';
                                            @endphp
                                            <span class="condition-badge {{ $badgeClass }}">{{ $item->kondisi }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.inventaris.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.inventaris.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                                @csrf @method('DELETE')
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
    {{-- Scripts untuk DataTables dan View Switcher --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#inventaris-table').DataTable({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json" }
            });

            $('#show-grid-view').on('click', function() {
                $('#table-view').hide();
                $('#grid-view').show();
                $(this).addClass('active').siblings().removeClass('active');
            });

            $('#show-table-view').on('click', function() {
                $('#grid-view').hide();
                $('#table-view').show();
                $(this).addClass('active').siblings().removeClass('active');
                table.columns.adjust().draw();
            });
        });
    </script>
@endpush
```