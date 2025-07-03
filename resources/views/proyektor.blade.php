<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Proyektor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Banner -->
    <div class="relative banner-height w-full overflow-hidden">
        <img src="{{ asset('images/proyektor_banner.png') }}"
            alt="Banner Proyektor"
            class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center">
            <div class="container mx-auto px-6 text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Proyektor</h1>

                @if(Auth::check())
                <a href="#booking-form"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full text-lg">
                    <i class="fas fa-calendar-check mr-2"></i> Booking Sekarang
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full text-lg">
                    <i class="fas fa-calendar-check mr-2"></i> Booking Sekarang
                </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Konten Utama (8 kolom) -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-2xl font-bold mb-4">Informasi Inventaris</h2>

                    @if($inventaris)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-gray-600 font-semibold">Nama</h3>
                                <p class="text-lg">{{ $inventaris->nama }}</p>
                            </div>
                            <div>
                                <h3 class="text-gray-600 font-semibold">Kode</h3>
                                <p class="text-lg">{{ $inventaris->kode }}</p>
                            </div>
                            <div>
                                <h3 class="text-gray-600 font-semibold">Jumlah</h3>
                                <p class="text-lg">{{ $inventaris->jumlah }} unit</p>
                            </div>
                            <div>
                                <h3 class="text-gray-600 font-semibold">Kondisi</h3>
                                <p class="text-lg capitalize">{{ $inventaris->kondisi }}</p>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500">Inventaris tidak ditemukan.</p>
                    @endif
                </div>
            </div>

            <!-- Sidebar Jadwal (4 kolom) -->
            <div class="lg:col-span-4">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h2 class="text-2xl font-bold mb-4">Jadwal Peminjaman</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="bg-gray-100 text-left text-xs font-semibold text-gray-700">
                                    <th class="px-4 py-2">Tanggal</th>
                                    <th class="px-4 py-2">Jam Mulai</th>
                                    <th class="px-4 py-2">Jam Selesai</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($jadwals as $jadwal)
                                    <tr>
                                        <td class="px-4 py-2 whitespace-nowrap">{{ $jadwal->tanggal_pinjam }}</td>
                                        <td class="px-4 py-2 whitespace-nowrap">{{ $jadwal->jam_mulai }}</td>
                                        <td class="px-4 py-2 whitespace-nowrap">{{ $jadwal->jam_selesai }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                                            Tidak ada jadwal peminjaman
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

</body>
</html>
