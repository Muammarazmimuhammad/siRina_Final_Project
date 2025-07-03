<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>siRina - Sistem Peminjaman Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>

<body class="bg-gray-50">

    <nav class="sticky top-0 z-50 bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="text-white font-bold text-2xl">siRina</span>
                    <span class="text-blue-200 text-sm hidden md:block">Room & Inventory Booking System</span>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <div class="flex space-x-1">
                        <a href="/" class="text-white px-4 py-2 rounded-lg text-sm font-medium bg-blue-900 bg-opacity-30 hover:bg-opacity-50 transition">Home</a>
                        <a href="{{ route('ruangan.index') }}" class="text-blue-100 hover:text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">Ruangan</a> <a href="{{ route('login') }}" class="text-blue-100 hover:text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">Status Ruangan</a>
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
                    <button type="button" class="text-white hover:text-gray-200 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-4 space-y-1 sm:px-3">
                <a href="/" class="text-white block px-3 py-3 rounded-lg text-base font-medium bg-blue-900 bg-opacity-30">Home</a>
                <a href="#" class="text-blue-100 hover:text-white block px-3 py-3 rounded-lg text-base font-medium hover:bg-blue-700 transition">Ruangan</a>
                <a href="#" class="text-blue-100 hover:text-white block px-3 py-3 rounded-lg text-base font-medium hover:bg-blue-700 transition">Status</a>
                <a href="#" class="text-blue-100 hover:text-white block px-3 py-3 rounded-lg text-base font-medium hover:bg-blue-700 transition">Inventaris</a>
                <div class="border-t border-blue-800 pt-3 mt-2 space-y-2">
                    <a href="{{ route('login') }}" class="text-blue-700 bg-white hover:bg-gray-100 block px-3 py-3 rounded-lg text-base font-medium text-center transition duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="text-white bg-blue-500 hover:bg-blue-400 block px-3 py-3 rounded-lg text-base font-medium text-center transition duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative overflow-hidden rounded-xl shadow-xl mt-3">
        <div id="slides-container" class="flex transition-transform duration-500 ease-in-out">
            <div class="w-full flex-shrink-0">
                <div class="relative h-96 md:h-[580px]">
                    <img src="{{ asset('images/audit_banner.png') }}"
                        alt="Auditorium"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="text-center px-6 text-white">
                            <h2 class="text-3xl md:text-5xl font-bold mb-4 animate__animated animate__fadeInDown">Welcome to SIRINA</h2>
                            <p class="text-lg md:text-xl mb-6 animate__animated animate__fadeInUp animate__delay-1s">Sistem Peminjaman Ruangan & Inventaris <br>STT Terpadu Nurul Fikri</p>
                            <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded-full text-white font-medium transition-all animate__animated animate__fadeInUp animate__delay-2s mt-7">
                                Pelajari Lebih
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex-shrink-0">
                <div class="relative h-96 md:h-[580px]">
                    <img src="{{ asset('images/kampusa_banner.png') }}"
                        alt="City 1"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="text-center px-6 text-white">
                            <h2 class="text-3xl md:text-5xl font-bold mb-4">Welcome to SIRINA</h2>
                            <p class="text-lg md:text-xl mb-6">Temukan Kemudahan dalam Mengatur Ruang dan Jadwal Kegiatanmu</p>
                            <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded-full text-white font-medium transition-all">
                                Explore Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex-shrink-0">
                <div class="relative h-96 md:h-[580px]">
                    <img src="{{ asset('images/kampusb_banner.png') }}"
                        alt="Technology"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="text-center px-6 text-white">
                            <h2 class="text-3xl md:text-5xl font-bold mb-4">Welcome to SIRINA</h2>
                            <p class="text-lg md:text-xl mb-6">Solusi Praktis untuk Peminjaman Ruangan & Inventaris</p>
                            <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded-full text-white font-medium transition-all">
                                Daftar Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button id="prev-btn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-gray-800 p-2 rounded-full shadow-md z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button id="next-btn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-gray-800 p-2 rounded-full shadow-md z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
            <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 indicator-dot" data-index="0"></button>
            <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 indicator-dot" data-index="1"></button>
            <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 indicator-dot" data-index="2"></button>
        </div>
    </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 my-12 md:my-16">
        <div class="bg-white rounded-2xl shadow-lg group transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-[1.01]">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-center p-8 md:p-12">

                <div class="lg:col-span-3 animate__animated animate__fadeInLeft">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-blue-700 to-blue-500 bg-clip-text text-transparent">
                        Platform Cerdas untuk Kebutuhan Kampus.
                    </h2>
                    <p class="text-gray-600 text-lg mb-8">
                        <strong>siRina</strong> adalah platform digital modern yang dirancang untuk merevolusi cara Anda memesan ruangan dan inventaris di STT-NF. Ucapkan selamat tinggal pada proses manual dan sambut efisiensi di ujung jari Anda.
                    </p>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start p-3 rounded-lg transition-all duration-300 hover:bg-slate-50 hover:translate-x-1">
                            <svg class="h-7 w-7 text-green-500 mr-4 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h4 class="font-semibold text-gray-800">Pemesanan Real-Time</h4>
                                <p class="text-gray-500">Lihat jadwal dan langsung amankan ruangan atau inventaris tanpa menunggu konfirmasi manual.</p>
                            </div>
                        </li>
                        <li class="flex items-start p-3 rounded-lg transition-all duration-300 hover:bg-slate-50 hover:translate-x-1">
                            <svg class="h-7 w-7 text-green-500 mr-4 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h4 class="font-semibold text-gray-800">Manajemen Terpusat</h4>
                                <p class="text-gray-500">Semua fasilitas kampus, mulai dari auditorium hingga proyektor, tersedia dalam satu dasbor.</p>
                            </div>
                        </li>
                        <li class="flex items-start p-3 rounded-lg transition-all duration-300 hover:bg-slate-50 hover:translate-x-1">
                            <svg class="h-7 w-7 text-green-500 mr-4 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h4 class="font-semibold text-gray-800">Notifikasi Otomatis</h4>
                                <p class="text-gray-500">Dapatkan pengingat dan pembaruan status peminjaman Anda secara otomatis.</p>
                            </div>
                        </li>
                    </ul>

                    <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white font-medium px-8 py-3 rounded-lg shadow-md transition-all duration-300 hover:bg-blue-700 hover:shadow-lg hover:-translate-y-1">
                        Jelajahi Ruangan
                    </a>
                </div>

                <div class="lg:col-span-2 flex justify-center items-center animate__animated animate__fadeInRight animate__delay-1s">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto max-w-sm">
                        <path fill="#E0F2FE" d="M48,-65.4C63.2,-55.8,77.3,-41.8,82.4,-25.2C87.5,-8.6,83.6,10.6,75.4,26.2C67.2,41.8,54.7,53.8,40.7,62.3C26.7,70.8,11.2,75.8,-4.6,78.2C-20.4,80.5,-36.5,80.2,-49.6,73C-62.7,65.8,-72.8,51.8,-79.1,36.5C-85.4,21.2,-87.9,4.6,-84.6,-10.8C-81.3,-26.2,-72.2,-40.4,-60.1,-50.2C-48,-59.9,-32.9,-65.3,-18.2,-68.8C-3.6,-72.3,10.7,-74.9,25.8,-72.9C40.9,-70.9,48,-65.4,48,-65.4Z" transform="translate(100 100)" />
                        <g transform="translate(50 50) scale(0.5)">
                            <path d="M62,3V27H33a3,3,0,0,0-3,3V57H6V3a3,3,0,0,1,3-3H59A3,3,0,0,1,62,3Z" style="fill:#3b82f6" />
                            <path d="M91,6V54H65V6a3,3,0,0,1,3-3H88A3,3,0,0,1,91,6Z" style="fill:#60a5fa" />
                            <rect x="30" y="57" width="35" height="40" rx="3" ry="3" style="fill:#93c5fd" />
                            <path d="M82,87.5a2.5,2.5,0,0,1-2.5,2.5H68a2.5,2.5,0,0,1,0-5h11.5A2.5,2.5,0,0,1,82,87.5Z" style="fill:#eff6ff" />
                            <path d="M82,77.5a2.5,2.5,0,0,1-2.5,2.5H68a2.5,2.5,0,0,1,0-5h11.5A2.5,2.5,0,0,1,82,77.5Z" style="fill:#eff6ff" />
                            <path d="M50,87.5a2.5,2.5,0,0,1-2.5,2.5H35.5a2.5,2.5,0,0,1,0-5H47.5A2.5,2.5,0,0,1,50,87.5Z" style="fill:#eff6ff" />
                            <path d="M50,77.5a2.5,2.5,0,0,1-2.5,2.5H35.5a2.5,2.5,0,0,1,0-5H47.5A2.5,2.5,0,0,1,50,77.5Z" style="fill:#eff6ff" />
                            <circle cx="47.5" cy="15" r="5.5" style="fill:#eff6ff" />
                            <circle cx="78" cy="18" r="5.5" style="fill:#eff6ff" />
                            <path d="M84.5,26a1,1,0,0,1-.71-.29l-13-13a1,1,0,0,1,1.41-1.41l13,13A1,1,0,0,1,84.5,26Z" style="fill:#eff6ff" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class=" grid grid-cols-1 lg:grid-cols-12 gap-6 px-4 sm:px-6 ">

        <div class="col-span-1 lg:col-span-9">
            <div class="bg-white rounded-lg shadow p-6 mb-6 mt-6">
                <h2 class="text-3xl font-semibold mb-7 mt-4 text-center">Ruangan Favorit</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                    <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                        <img src="{{ asset('images/audit_card.jpg') }}" alt="Auditorium" class="w-full h-48 object-cover">
                        <div class="p-4 flex-grow">
                            <h3 class="font-bold text-lg">Auditorium</h3>
                            <p class="text-gray-600 text-sm">Lokasi: Gedung Kampus B2, Lantai 1</p>
                            <div class="mt-2 flex items-center">
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Banyak Peminjam: 24</span>
                            </div>
                        </div>
                        <div class="p-4 border-t">
                            <a href="{{ route('audit') }}" class="block w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition text-center">
                                View Detail
                            </a>
                        </div>
                    </div>

                    <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                        <img src="{{ asset('images/a201.jpg') }}" alt="Kelas A201" class="w-full h-48 object-cover">
                        <div class="p-4 flex-grow">
                            <h3 class="font-bold text-lg">Kelas A 201</h3>
                            <p class="text-gray-600 text-sm">Lokasi: Gedung Kampus A, Lantai 2</p>
                            <div class="mt-2 flex items-center">
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Banyak Peminjam: 18</span>
                            </div>
                        </div>
                        <div class="p-4 border-t">
                            <a href="{{ route('a201') }}" class="block w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition text-center">
                                View Detail
                            </a>
                        </div>
                    </div>


                    <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                        <img src="{{ asset ('images/b201.jpg')}}" alt="Kelas B201" class="w-full h-48 object-cover">
                        <div class="p-4 flex-grow">
                            <h3 class="font-bold text-lg">Kelas B 201</h3>
                            <p class="text-gray-600 text-sm">Lokasi: Gedung Kampus B2, Lantai 2</p>
                            <div class="mt-2 flex items-center">
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Banyak Peminjam: 15</span>
                            </div>
                        </div>
                        <div class="p-4 border-t">
                            <a href="{{ route('b201') }}" class="block w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition text-center">
                                View Detail
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-3xl font-semibold mb-7 mt-4 text-center">Inventaris Favorit</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                        <img src="{{ asset ('/images/proyektor_card.jpeg')}}" alt="Proyektor" class="w-full h-48 object-cover">
                        <div class="p-4 flex-grow">
                            <h3 class="font-bold text-lg">Proyektor Epson</h3>
                            <p class="text-gray-600 text-sm">Kategori: Elektronik</p>
                            <div class="mt-2 flex items-center">
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Banyak Peminjam: 32</span>
                            </div>
                        </div>
                        <div class="p-4 border-t">
                            <a href="{{ route('proyektor') }}" class="block w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition text-center">
                                View Detail
                            </a>

                        </div>


                    </div>

                    <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                        <img src="{{ asset ('/images/TV.png') }}" alt="TV LED" class="w-full h-48 object-cover">
                        <div class="p-4 flex-grow">
                            <h3 class="font-bold text-lg">TV LED 55"</h3>
                            <p class="text-gray-600 text-sm">Kategori: Elektronik</p>
                            <div class="mt-2 flex items-center">
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Banyak Peminjam: 12</span>
                            </div>
                        </div>
                        <div class="p-4 border-t">
                            <a href="/inventaris/tv-led" class="block w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition text-center">
                                View Detail
                            </a>
                        </div>
                    </div>

                    <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                        <img src="{{ asset ('/images/miccc (1).png') }}" alt="Mic Wireless" class="w-full h-48 object-cover">
                        <div class="p-4 flex-grow">
                            <h3 class="font-bold text-lg">Mic Wireless</h3>
                            <p class="text-gray-600 text-sm">Kategori: Audio</p>
                            <div class="mt-2 flex items-center">
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Banyak Peminjam: 28</span>
                            </div>
                        </div>
                        <div class="p-4 border-t">
                            <a href="/inventaris/mic-wireless" class="block w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition text-center">
                                View Detail
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-span-3 space-y-6 mr-5 mt-6">
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold mb-3">Cek Ketersediaan Ruangan</h3>
                <form id="cekKetersediaanForm" method="POST" action="{{ route('cek.ketersediaan.cek') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" required class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" required class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div class="mb-4">

                        <select name="gedung" class="w-full px-3 py-2 border rounded-md" required>
                            <option value="">-- Pilih Gedung --</option>
                            @foreach ($gedung as $g)
                            <option value="{{ $g }}">{{ $g }}</option>
                            @endforeach
                        </select>

                    </div>

                    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition">
                        Cek Ketersediaan
                    </button>
                </form>
            </div>

            <div id="hasilModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <div id="modalContent" class="mt-2 px-7 py-3">
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="closeModal" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="font-semibold mb-3">Cek Ketersediaan Inventaris</h3>
                <form id="inventoryCheckForm">
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Awal</label>
                        <input type="date" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir</label>
                        <input type="date" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Inventaris</label>
                        <select class="w-full px-3 py-2 border rounded-md">
                            <option value="">-- Pilih Inventaris --</option>
                            <option value="proyektor">Proyektor</option>
                            <option value="tv">TV LED</option>
                            <option value="mic">Mic Wireless</option>
                            <option value="sofa">Sofa</option>
                            <option value="papan">Papan Tulis</option>
                            <option value="kursi">Kursi Rapat</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition">
                        Cek Ketersediaan
                    </button>
                    <div id="inventoryCheckError" class="hidden mt-2 text-red-600 text-sm"></div>
                </form>
            </div>

        </div>
    </div>
    </div>
    </div>

    <footer class="bg-gradient-to-b from-blue-600 to-blue-800 text-white pt-12 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
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
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353-.3-.882-.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white transition">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>

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

            <div class="border-t border-blue-500 mt-8 pt-6 text-center text-blue-200">
                <p>&copy; 2023 siRina - Room & Inventory Booking System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('cekKetersediaanForm');
            const modal = document.getElementById('hasilModal');
            const modalContent = document.getElementById('modalContent');
            const closeModal = document.getElementById('closeModal');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.html) {
                            modalContent.innerHTML = data.html;
                            modal.classList.remove('hidden');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });

            closeModal.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            // Tutup modal ketika klik di luar konten modal
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
    @endpush

    <script>
        // // Handle form submission for room check
        // document.getElementById('roomCheckForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
        //     const startDate = this.querySelector('input[type="date"]:first-of-type').value;
        //     const endDate = this.querySelector('input[type="date"]:last-of-type').value;
        //     const errorElement = document.getElementById('roomCheckError');

        //     if (!startDate || !endDate) {
        //         errorElement.textContent = "Tanggal Awal dan Akhir Tidak Boleh Kosong!";
        //         errorElement.classList.remove('hidden');
        //     } else {
        //         errorElement.classList.add('hidden');
        //         // Proceed with checking availability
        //         alert('Memeriksa ketersediaan ruangan...');
        //     }
        // });

        // Handle form submission for inventory check
        document.getElementById('inventoryCheckForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const startDate = this.querySelector('input[type="date"]:first-of-type').value;
            const endDate = this.querySelector('input[type="date"]:last-of-type').value;
            const errorElement = document.getElementById('inventoryCheckError');

            if (!startDate || !endDate) {
                errorElement.textContent = "Tanggal Awal dan Akhir Tidak Boleh Kosong!";
                errorElement.classList.remove('hidden');
            } else {
                errorElement.classList.add('hidden');
                // Proceed with checking availability
                alert('Memeriksa ketersediaan inventaris...');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slidesContainer = document.getElementById('slides-container');
            const slides = document.querySelectorAll('#slides-container > div');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const dots = document.querySelectorAll('.indicator-dot');

            let currentIndex = 0;
            const totalSlides = slides.length;

            // Update carousel untuk mobile
            function updateCarousel() {
                const slideWidth = window.innerWidth < 768 ? 100 : 100;
                slidesContainer.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('bg-white', index === currentIndex);
                    dot.classList.toggle('bg-opacity-50', index !== currentIndex);
                });
            }

            // Next slide
            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            });

            // Previous slide
            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateCarousel();
            });

            // Click on dot
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    currentIndex = parseInt(dot.getAttribute('data-index'));
                    updateCarousel();
                });
            });

            // Auto-play (opsional)
            let autoplay = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            }, 5000);

            // Pause on hover
            slidesContainer.parentElement.addEventListener('mouseenter', () => {
                clearInterval(autoplay);
            });

            slidesContainer.parentElement.addEventListener('mouseleave', () => {
                autoplay = setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateCarousel();
                }, 5000);
            });
        });
    </script>

    <script>
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
```