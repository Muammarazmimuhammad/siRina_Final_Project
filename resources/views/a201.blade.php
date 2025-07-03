<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Tambahkan di head -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Custom breakpoints */
        @media (max-width: 767px) {
            .mobile-stack {
                flex-direction: column;
            }

            .mobile-full-width {
                width: 100% !important;
            }

            .mobile-text-center {
                text-align: center !important;
            }

            .mobile-mt-2 {
                margin-top: 0.5rem !important;
            }
        }

        .banner-height {
            height: 60vh;
            min-height: 400px;
        }

        .booking-btn {
            transition: all 0.3s ease;
        }

        .booking-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
        }

        .booking-table th,
        .booking-table td {
            border: 1px solid #e2e8f0;
            padding: 12px;
            text-align: center;
        }

        .booking-table th {
            background-color: #f7fafc;
            font-weight: 600;
        }

        .booking-table tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .booking-table tr:hover {
            background-color: #edf2f7;
        }


        @media (min-width: 768px) and (max-width: 1023px) {
            .tablet-grid-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!-- Bagian head tetap sama seperti yang Anda miliki -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-gray-50">
    <!-- Navbar tetap sama -->

    <!-- Navbar Container - Tambahkan class sticky dan lainnya di sini -->
    <div class="sticky top-0 z-50 bg-blue-800 shadow-md"> <!-- Warna background dan shadow bisa disesuaikan -->
        <div class="container mx-auto px-4">
            <!-- Navbar Content yang sudah ada -->

        </div>
    </div>

    <nav class="sticky top-0 z-50 bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center space-x-2">
                    <img src="{{ asset('images/sirina_logo.png') }}" alt="SiRina Logo" class="h-12 w-13">

                    <span class="text-white font-bold text-2xl">siRina</span>
                    <span class="text-blue-200 text-sm hidden md:block">Room & Inventory Booking System</span>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <div class="flex space-x-1">
                        <a href="/" class="text-blue-100 hover:text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">Home</a>
                        <a href="{{ route('ruangan.index') }}" class="text-white bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium transition">Ruangan</a>
                        <a href="{{ route('login') }}" class="text-blue-100 hover:text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">Status Ruangan</a>
                        <a href="{{ route('login') }}" class="text-blue-100 hover:text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">Inventaris</a>
                        <a href="{{ route('login') }}" class="text-blue-100 hover:text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">Status Inventaris</a>
                    </div>

                    <div class="ml-4 flex space-x-3">
                        <a href="{{ route('login') }}" class="text-blue-700 bg-white hover:bg-gray-100 px-5 py-2 rounded-lg text-sm font-medium transition duration-300 shadow-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="text-white bg-blue-500 hover:bg-blue-400 px-5 py-2 rounded-lg text-sm font-medium transition duration-300 shadow-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Register
                        </a>
                    </div>
                </div>

                <div class="md:hidden flex items-center">
                    <button type="button" class="text-white hover:text-gray-200 focus:outline-none">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>


    <!-- Banner Section -->
    <div class="relative banner-height w-full overflow-hidden">
        <!-- Background Image -->
        <img src="{{ asset('images/a201_banner.png') }}"
            alt="Auditorium Banner"
            class="absolute inset-0 w-full h-full object-cover">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center">
            <div class="container mx-auto px-6 text-center text-white">
                <!-- Title -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 animate-fade-in-down">
                    Kelas A 201
                </h1>

                <!-- Subtitle
                <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto animate-fade-in-up">
                    Minimal 100 Orang & Acara Resmi
                </p> -->

                <!-- Booking Button -->
                @if(Auth::check())
                <a href="#booking-form"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full booking-btn text-lg animate-fade-in-up">
                    <i class="fas fa-calendar-check mr-2"></i> Booking Sekarang
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full booking-btn text-lg animate-fade-in-up">
                    <i class="fas fa-calendar-check mr-2"></i> Booking Sekarang
                </a>
                @endif

            </div>
        </div>
    </div>
    <!--end banner-->

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Main Content (8 columns) -->
            <div class="lg:col-span-8">

                <!-- Room Details Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-2xl font-bold mb-4">Kategori:
                        <span class="font-normal">
                            @isset($ruangan)
                            {{ $ruangan->type ?? 'Kelas' }}
                            @else
                            Kelas
                            @endisset
                        </span>
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-600">Gedung</h3>
                            <p class="text-lg">
                                Kampus A
                            </p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-600">Lantai</h3>
                            <p class="text-lg">
                                @isset($ruangan)
                                {{ $ruangan->lantai ?? '2' }}
                                @else
                                2
                                @endisset
                            </p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-600">Kapasitas</h3>
                            <p class="text-lg">
                                @isset($ruangan)
                                {{ $ruangan->kapasitas ?? '150' }} orang
                                @else
                                150 orang
                                @endisset
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Facilities Section -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold mb-4">Fasilitas Ruangan</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @isset($ruangan)
                        @if($ruangan->fasilitas)
                        @foreach(json_decode($ruangan->fasilitas) as $fasilitas)
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-check-circle mr-3 text-blue-500 text-xl"></i>
                            <span>{{ $fasilitas }}</span>
                        </div>
                        @endforeach
                        @endif
                        @else
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-check-circle mr-3 text-blue-500 text-xl"></i>
                            <span>LCD Projector</span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-check-circle mr-3 text-blue-500 text-xl"></i>
                            <span>Sound System</span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-check-circle mr-3 text-blue-500 text-xl"></i>
                            <span>Kursi Theater</span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-check-circle mr-3 text-blue-500 text-xl"></i>
                            <span>Podium</span>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>

            <!-- Sidebar Booking Schedule (4 columns) - Lebar Diperbesar -->
            <div class="lg:col-span-4">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h2 class="text-2xl font-bold mb-4">Ruangan ini telah di booking pada:</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="bg-gray-100 text-left text-xs font-semibold text-gray-700">
                                    <th class="px-6 py-3 w-2/5">Tanggal Pinjam</th>
                                    <th class="px-6 py-3 w-1/5">Jam Mulai</th>
                                    <th class="px-6 py-3 w-1/5">Jam Akhir</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($jadwals as $jadwal)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->tanggal_pinjam }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->jam_mulai }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->jam_selesai }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">Tidak ada jadwal peminjaman</td>
                                </tr>
                                @endforelse
                            </tbody>
                            `
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Footer tetap sama -->

    <footer class="bg-gradient-to-b from-blue-600 to-blue-800 text-white pt-12 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Logo and Description -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="text-2xl font-bold text-white">siRina</span>
                    </div>
                    <p class="text-blue-100">Room & Inventory Booking System STT-NF</p>
                    <div class="flex space-x-4 pt-2">
                        <a href="#" class="text-blue-200 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Hubungi Kami</h3>
                    <div class="space-y-2">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1 mr-2 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <h4 class="font-medium">Gedung A STT-NF</h4>
                                <p class="text-blue-100">Jl. Situ Indah No. 116 Kelapa Dua</p>
                                <p class="text-blue-100">Kota Depok, Jawa Barat</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1 mr-2 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <h4 class="font-medium">Gedung B STT-NF</h4>
                                <p class="text-blue-100">Jl. Raya Lenteng Agung No.20</p>
                                <p class="text-blue-100">RT.4/RW.1, Srengseng Sawah</p>
                                <p class="text-blue-100">Kec. Jagakarsa, Jakarta Selatan 12640</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Kontak</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-blue-100">+62 857-1624-3174</span>
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-blue-100">info@nurulfikri.ac.id</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-blue-500 mt-8 pt-6 text-center text-blue-200">
                <p>&copy; 2023 siRina - Room & Inventory Booking System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @vite('resources/js/app.js')

    <script>
        // Mobile menu toggle
        document.querySelector('[aria-controls="mobile-menu"]').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';

            menu.classList.toggle('hidden');
            this.setAttribute('aria-expanded', !isExpanded);
        });

        // Validasi form
        document.querySelector('form').addEventListener('submit', function(e) {
            const start = document.querySelector('input[name="jam_mulai"]').value;
            const end = document.querySelector('input[name="jam_selesai"]').value;

            if (start >= end) {
                e.preventDefault();
                alert('Jam selesai harus setelah jam mulai');
            }
        });

        // Perbaikan mobile menu
        document.querySelector('[aria-controls="mobile-menu"]').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';

            // Animasi smooth
            menu.style.transition = 'all 0.3s ease';
            menu.classList.toggle('hidden');
            menu.classList.toggle('animate__fadeInDown');

            this.setAttribute('aria-expanded', !isExpanded);
            document.body.style.overflow = isExpanded ? 'auto' : 'hidden';
        });
    </script>
</body>

</html>