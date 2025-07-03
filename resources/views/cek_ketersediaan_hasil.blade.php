<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengecekan Ketersediaan Ruangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25em 0.6em;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 9999px;
        }
        .status-badge i {
            margin-right: 0.35rem;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 bg-gray-50">

    <div class="bg-white rounded-xl shadow-2xl p-6 md:p-8 w-full max-w-5xl">
        <div class="flex items-center mb-6 border-b border-gray-200 pb-4">
            <div class="bg-blue-600 text-white rounded-lg p-3 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" /></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Hasil Ketersediaan Ruangan</h2>
                <p class="text-sm text-gray-500">Berikut adalah status ruangan pada tanggal yang Anda pilih.</p>
            </div>
        </div>

        <div class="mb-6 bg-gray-50 p-4 rounded-lg border border-gray-200 text-sm text-gray-600 space-y-2">
            <div class="flex items-center"><span class="font-semibold text-gray-800 w-24">Tanggal</span>: {{ \Carbon\Carbon::parse($tanggalAwal)->isoFormat('D MMMM Y') }} s/d {{ \Carbon\Carbon::parse($tanggalAkhir)->isoFormat('D MMMM Y') }}</div>
            <div class="flex items-center"><span class="font-semibold text-gray-800 w-24">Gedung</span>: {{ $gedung }}</div>
        </div>

        @if (count($hasil) > 0)
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="p-3 text-left">Nama Ruangan</th>
                        <th class="p-3 text-left">Detail</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Informasi Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $item)
                    @php $ruangan = $item['ruangan'] ?? null; @endphp
                    <tr class="border-b border-gray-200 last:border-b-0 hover:bg-gray-50 transition">
                        <td class="p-4 font-semibold text-gray-800">{{ $ruangan->nama ?? '-' }}</td>
                        <td class="p-4 text-gray-600">
                            <div>Lantai: {{ $ruangan->lantai ?? '-' }}</div>
                            <div>Kapasitas: {{ $ruangan->kapasitas ?? '-' }} orang</div>
                        </td>
                        <td class="p-4">
                            @if ($item['tersedia'])
                            <span class="status-badge bg-green-100 text-green-800"><i class="fas fa-check-circle"></i>Tersedia</span>
                            @else
                            <span class="status-badge bg-red-100 text-red-800"><i class="fas fa-times-circle"></i>Dipinjam</span>
                            @endif
                        </td>
                        <td class="p-4">
                            @if (! $item['tersedia'] && isset($item['peminjaman']) && count($item['peminjaman']) > 0)
                            <ul class="list-disc list-inside text-gray-700 text-xs space-y-1">
                                @foreach ($item['peminjaman'] as $p)
                                <li>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->isoFormat('dddd, D MMM') }} ({{ $p->user->name ?? 'User' }})</li>
                                @endforeach
                            </ul>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="mt-6 text-center bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded-lg">
            <p>⚠️ Tidak ada data ruangan ditemukan untuk gedung ini.</p>
        </div>
        @endif

        <div class="flex justify-end mt-6">
            <a href="{{ url('/') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                Kembali ke Beranda
            </a>
        </div>
    </div>
    
    {{-- Font Awesome untuk ikon --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
