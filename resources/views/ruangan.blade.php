<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>siRina - Peminjaman Ruangan & Inventaris</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body class="bg-gray-100">

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
                        <a href="#" class="text-white bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium transition">Ruangan</a>
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

    <main>
        <section class="relative text-white text-center py-24 px-4 overflow-hidden">
            <img src="{{ asset('images/kampusb_banner.png') }}" alt="Banner Kampus" class="absolute top-0 left-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-slate-800 opacity-60"></div>

            <div class="relative z-10 animate__animated animate__fadeInDown">
                <h1 class="text-5xl font-bold">Ruangan Kami</h1>
                <p class="text-lg text-slate-300 mt-2">Home > Ruangan</p>
            </div>
        </section>

        <section class="py-12">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/audit_card.jpg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">AUDITORIUM UTAMA</h3>
                            <p class="text-sm text-gray-600 mb-4">Lokasi: Gedung Kampus B2 <br> Lantai: 1</p>
                            <a href="{{ route('audit') }}" class="mt-auto text-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition btn-details">View Details</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/a201_card.jpg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">KELAS A 201</h3>
                            <p class="text-sm text-gray-600 mb-4">Lokasi: Gedung Kampus A <br> Lantai: 2</p>
                            <a href="{{ route('a201') }}" class="mt-auto text-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition btn-details">View Details</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/b201_card.jpg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">KELAS B 201</h3>
                            <p class="text-sm text-gray-600 mb-4">Lokasi: Gedung Kampus B2 <br> Lantai: 2</p>
                            <a href="{{ route('b201') }}" class="mt-auto text-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition btn-details">View Details</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/ruang_rapat.jpg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">RUANG RAPAT</h3>
                            <p class="text-sm text-gray-600 mb-4">Lokasi: Gedung B2 <br> Lantai: 1</p>
                            <a href="#" class="mt-auto text-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition btn-details">View Details</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/ruang_rapat.jpg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">LABORATORIUM KOMPUTER 1</h3>
                            <p class="text-sm text-gray-600 mb-4">Lokasi: Gedung Kampus B1<br> Lantai: 1</p>
                            <a href="#" class="mt-auto text-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition btn-details">View Details</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/ruang_diskusi.jpeg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">RUANG DISKUSI MAHASISWA</h3>
                            <p class="text-sm text-gray-600 mb-4">Lokasi: Gedung Kampus A <br> Lantai: 1</p>
                            <a href="#" class="mt-auto text-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition btn-details">View Details</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/perpustakaan.jpg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">PERPUSTAKAAN</h3>
                            <p class="text-sm text-gray-600 mb-4">Lokasi: Gedung KAMPUS A <br> Lantai: 4</p>
                            <a href="#" class="mt-auto text-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition btn-details">View Details</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/studio.jpg') }}" alt="Gambar Ruangan" class="w-full h-48 object-cover">
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">STUDIO BROADCASTING</h3>
                            <p class="text-sm text-gray-600 mb-4">Lokasi: Gedung Kampus B4 <br> Lantai: 3</p>
                            <a href="#" class="mt-auto text-center bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition btn-details">View Details</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>


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

</body>

</html>