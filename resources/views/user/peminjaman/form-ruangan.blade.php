@extends('layouts.app')

@section('title', 'Form Peminjaman Ruangan')

@push('styles')
    {{-- CSS untuk Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <style>
        /* === Custom Stepper Form Styling === */
        .content-wrapper {
            background-color: #f8fafc;
        }
        .form-card {
            background-color: #fff;
            border-radius: 0.75rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.07), 0 4px 6px -2px rgba(0,0,0,0.05);
        }
        
        /* Progress Bar */
        .progress-bar-container {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 2.5rem;
        }
        .progress-bar-line {
            position: absolute;
            top: 18px; /* PERUBAHAN: Posisi disesuaikan agar pas di tengah ikon (40px / 2 - 2px) */
            left: 0;
            right: 0;
            height: 4px;
            background-color: #e2e8f0;
            z-index: 1;
        }
        .progress-bar-fill {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #2563eb;
            transition: width 0.4s ease;
        }
        .progress-step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #fff;
            border: 4px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            transition: all 0.4s ease;
            position: relative; /* PERUBAHAN: Ditambahkan untuk positioning label */
        }
        .progress-step.active {
            border-color: #2563eb;
            background-color: #2563eb;
            color: white;
        }
        .progress-step.completed {
            border-color: #2563eb;
            background-color: #2563eb;
            color: white;
        }
        .step-label {
            display: block; /* PERUBAHAN: Diubah dari absolute */
            margin-top: 0.75rem; /* PERUBAHAN: Margin disesuaikan */
            font-weight: 600;
            color: #9ca3af;
            transition: color 0.4s ease;
        }
        .progress-step.active + .step-label,
        .progress-step.completed + .step-label {
            color: #1e3a8a;
        }


        /* Form Steps */
        .form-step {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        .form-step.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Form Controls */
        .form-control-modern {
            display: block; width: 100%; height: calc(1.5em + 1rem + 2px);
            padding: 0.5rem 1rem; font-size: 1rem; font-weight: 400; line-height: 1.5;
            color: #495057; background-color: #f8fafc; border: 1px solid #e2e8f0;
            border-radius: 0.375rem; transition: all .15s ease-in-out;
        }
        .form-control-modern:focus {
            color: #495057; background-color: #fff; border-color: #6366f1;
            outline: 0; box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
        }
        textarea.form-control-modern { height: auto; }
        .select2-container--bootstrap4 .select2-selection--single {
            height: calc(1.5em + 1rem + 2px) !important; background-color: #f8fafc;
        }
        .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
            line-height: calc(1.5em + 1rem);
        }
    </style>
@endpush

@section('content')
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1 class="m-0" style="font-weight: 800; color: #1e293b;">Form Peminjaman Ruangan</h1></div>
                <div class="col-sm-6"><ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li><li class="breadcrumb-item active">Peminjaman Ruangan</li></ol></div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card form-card">
                        <div class="card-body p-4 p-md-5">
                            <!-- Progress Bar -->
                            <div class="progress-bar-container">
                                <div class="progress-bar-line"><div id="progressBarFill" class="progress-bar-fill"></div></div>
                                <!-- PERUBAHAN: Label kini berada di dalam div yang sama dengan step -->
                                <div class="text-center">
                                    <div class="progress-step active" data-step="1"><i class="fas fa-search"></i></div>
                                    <span class="step-label">Pilih Ruangan</span>
                                </div>
                                <div class="text-center">
                                    <div class="progress-step" data-step="2"><i class="fas fa-calendar-alt"></i></div>
                                    <span class="step-label">Atur Jadwal</span>
                                </div>
                                <div class="text-center">
                                    <div class="progress-step" data-step="3"><i class="fas fa-pencil-alt"></i></div>
                                    <span class="step-label">Detail</span>
                                </div>
                            </div>

                            <form action="{{ route('user.peminjaman.ruangan.store') }}" method="POST">
                                @csrf
                                
                                <!-- Step 1: Pilih Ruangan -->
                                <div id="step-1" class="form-step active">
                                    <h4 class="font-weight-bold text-center mb-4">Langkah 1: Pilih Ruangan yang Tersedia</h4>
                                    <div class="form-group">
                                        <label for="ruangan_id">Pilih Ruangan</label>
                                        <select name="ruangan_id" id="ruangan_id" class="form-control" required>
                                            <option value="">-- Cari dan pilih ruangan --</option>
                                            @foreach($ruangan as $r)
                                            <option value="{{ $r->id }}" {{ old('ruangan_id') == $r->id ? 'selected' : '' }}>
                                                {{ $r->nama }} (Gedung: {{ $r->gedung }})
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Step 2: Atur Jadwal -->
                                <div id="step-2" class="form-step">
                                    <h4 class="font-weight-bold text-center mb-4">Langkah 2: Tentukan Jadwal Peminjaman</h4>
                                    <div class="row">
                                        <div class="col-md-4"><div class="form-group"><label for="tanggal_pinjam">Tanggal</label><input type="date" name="tanggal_pinjam" class="form-control-modern" value="{{ old('tanggal_pinjam') }}" required></div></div>
                                        <div class="col-md-4"><div class="form-group"><label for="jam_mulai">Jam Mulai</label><input type="time" name="jam_mulai" class="form-control-modern" value="{{ old('jam_mulai') }}" required></div></div>
                                        <div class="col-md-4"><div class="form-group"><label for="jam_selesai">Jam Selesai</label><input type="time" name="jam_selesai" class="form-control-modern" value="{{ old('jam_selesai') }}" required></div></div>
                                    </div>
                                </div>

                                <!-- Step 3: Detail Keperluan -->
                                <div id="step-3" class="form-step">
                                    <h4 class="font-weight-bold text-center mb-4">Langkah 3: Jelaskan Keperluan Anda</h4>
                                    <div class="form-group">
                                        <label for="keperluan">Keperluan Peminjaman</label>
                                        <textarea name="keperluan" class="form-control-modern" rows="5" required placeholder="Contoh: Rapat koordinasi panitia acara seminar nasional...">{{ old('keperluan') }}</textarea>
                                    </div>
                                </div>

                                <!-- Navigation Buttons -->
                                <div class="d-flex justify-content-between mt-5">
                                    <button type="button" id="prevBtn" class="btn btn-secondary" style="display: none;"><i class="fas fa-arrow-left mr-1"></i> Kembali</button>
                                    <button type="button" id="nextBtn" class="btn btn-primary ml-auto">Lanjutkan <i class="fas fa-arrow-right ml-1"></i></button>
                                    <button type="submit" id="submitBtn" class="btn btn-success ml-auto" style="display: none;"><i class="fas fa-paper-plane mr-1"></i> Ajukan Peminjaman</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('#ruangan_id').select2({ theme: 'bootstrap4', placeholder: "-- Cari dan pilih ruangan --" });

            let currentStep = 1;
            const totalSteps = 3;

            const nextBtn = $('#nextBtn');
            const prevBtn = $('#prevBtn');
            const submitBtn = $('#submitBtn');
            const progressBarFill = $('#progressBarFill');

            function goToStep(step) {
                $('.form-step').removeClass('active');
                $('#step-' + step).addClass('active');

                $('.progress-step').each(function(index) {
                    const stepNum = index + 1;
                    if (stepNum < step) {
                        $(this).removeClass('active').addClass('completed');
                    } else if (stepNum === step) {
                        $(this).removeClass('completed').addClass('active');
                    } else {
                        $(this).removeClass('active completed');
                    }
                });
                
                progressBarFill.css('width', ((step - 1) / (totalSteps - 1)) * 100 + '%');

                prevBtn.toggle(step > 1);
                nextBtn.toggle(step < totalSteps);
                submitBtn.toggle(step === totalSteps);
            }

            nextBtn.on('click', function() {
                if (currentStep < totalSteps) {
                    currentStep++;
                    goToStep(currentStep);
                }
            });

            prevBtn.on('click', function() {
                if (currentStep > 1) {
                    currentStep--;
                    goToStep(currentStep);
                }
            });
        });
    </script>
@endpush
