<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bendahara - Kas-Ku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('foto/Logo.png') }}">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8FAFC; color: #1E293B; }
    </style>
</head>
<body class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between hidden md:flex sticky top-0 h-screen">
        <div>
            <!-- Logo -->
            <div class="px-8 py-8 flex items-center gap-3">
                <img src="{{ asset('foto/Logo.png') }}" alt="Logo" class="w-10">
                <span class="text-2xl font-bold text-[#003d82]">Kas-ku</span>
            </div>

            <!-- Menu -->
            <nav class="mt-4 px-4 space-y-2">
                <a href="#" class="flex items-center gap-3 bg-slate-200/70 text-slate-800 px-4 py-3 rounded-2xl font-semibold transition-colors">
                    <span class="text-xl">🏠</span> Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 text-gray-500 hover:text-slate-800 px-4 py-3 rounded-2xl font-medium transition-colors">
                    <span class="text-xl">📊</span> Statistik
                </a>
                <a href="#" class="flex items-center gap-3 text-gray-500 hover:text-slate-800 px-4 py-3 rounded-2xl font-medium transition-colors">
                    <span class="text-xl">👥</span> Data Siswa
                </a>
                <a href="#" class="flex items-center gap-3 text-gray-500 hover:text-slate-800 px-4 py-3 rounded-2xl font-medium transition-colors">
                    <span class="text-xl">⚙️</span> Pengaturan
                </a>
            </nav>
        </div>

        <!-- Logout -->
        <div class="p-4 mb-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-3 text-gray-700 hover:text-red-600 px-4 py-3 rounded-2xl font-medium transition-colors w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="text-xs font-bold text-black">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 md:p-12 overflow-y-auto">
        
        <!-- Header -->
        <header class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
            <div>
                <h1 class="text-3xl font-extrabold text-black mb-1 tracking-tight">Selamat datang, {{ Auth::user()->nama_lengkap }} !</h1>
                <p class="text-gray-600 font-medium">Ringkasan keuangan dan pantau kas hari ini.</p>
            </div>
            <div class="flex items-center gap-4">
                <button class="bg-[#003d82] hover:bg-blue-800 text-white px-6 py-2.5 rounded-full font-bold text-sm transition-all shadow-md">
                    + Input Pemasukan
                </button>
                <div class="flex items-center bg-white border border-gray-200 rounded-full pr-6 pl-2 py-1.5 shadow-sm h-fit">
                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center mr-3 font-bold text-white text-xs">
                        B
                    </div>
                    <span class="text-sm font-semibold text-gray-700">Terdaftar sebagai <span class="font-bold text-black">Bendahara</span></span>
                </div>
            </div>
        </header>

        <!-- Top Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Card 1: Pantau Saldo (takes 2 columns) -->
            <div class="md:col-span-2 relative rounded-3xl overflow-hidden h-64 shadow-lg group">
                <img src="{{ asset('foto/bayar kas 2.png') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-blue-900/40 mix-blend-multiply"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-bold uppercase tracking-widest drop-shadow-md">Pantau Saldo</p>
                        <h2 class="text-5xl font-extrabold text-white drop-shadow-md mt-2">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</h2>
                        <p class="text-white/90 text-sm drop-shadow-sm font-medium mt-3 bg-white/20 inline-block px-3 py-1 rounded-full">+2.4% dari bulan lalu</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 & 3 Column -->
            <div class="grid grid-rows-2 gap-6 h-64">
                <!-- Statistik Kelas -->
                <div class="bg-white rounded-3xl p-6 flex flex-col justify-center shadow-md border border-gray-100 relative overflow-hidden group">
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-1 relative z-10">Statistik Kelas</p>
                    <h3 class="text-3xl font-extrabold text-green-500 relative z-10">92%</h3>
                    <p class="text-xs text-slate-500 mt-1 relative z-10">Siswa sudah membayar bulan ini</p>
                    <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-green-500/10 rounded-full group-hover:scale-150 transition-all duration-500"></div>
                </div>

                <!-- Daftar Tunggakan -->
                <div class="bg-white rounded-3xl p-6 flex flex-col justify-center shadow-md border border-gray-100 relative overflow-hidden group">
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-1 text-red-400/70 relative z-10">Daftar Tunggakan</p>
                    <h3 class="text-3xl font-extrabold text-red-500 relative z-10">4 <span class="text-lg font-bold text-slate-600">Siswa</span></h3>
                    <p class="text-xs text-blue-500 mt-1 hover:underline cursor-pointer relative z-10">Lihat Detail &rarr;</p>
                    <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-red-500/10 rounded-full group-hover:scale-150 transition-all duration-500"></div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- History Column -->
            <div class="md:col-span-2">
                <div class="flex justify-between items-end mb-6">
                    <h3 class="text-xl font-extrabold text-black">Transaksi Terakhir</h3>
                    <a href="#" class="text-[#003d82] font-bold text-sm hover:underline">Lihat Semua</a>
                </div>
                
                <div class="space-y-4">
                    @forelse($recentTransactions as $transaction)
                    <div class="bg-white rounded-3xl p-5 flex flex-col sm:flex-row items-center shadow-sm border border-gray-100">
                        <!-- Icon -->
                        <div class="w-12 h-12 rounded-full {{ $transaction->category->jenis == 'Pemasukan' ? 'bg-green-500' : 'bg-red-500' }} flex items-center justify-center shrink-0 sm:mr-4 mb-3 sm:mb-0">
                            <span class="text-white font-bold text-xl">{{ $transaction->category->jenis == 'Pemasukan' ? '+' : '-' }}</span>
                        </div>
                        
                        <!-- Details -->
                        <div class="flex-1 text-center sm:text-left">
                            <p class="font-extrabold text-black text-lg">{{ $transaction->user->nama_lengkap ?? 'Kas Umum' }}</p>
                            <p class="text-gray-500 text-sm font-medium mt-0.5">{{ $transaction->category->nama_kategori }} • {{ \Carbon\Carbon::parse($transaction->tanggal)->translatedFormat('F j, Y') }}</p>
                        </div>
                        
                        <!-- Status Badge -->
                        <div class="shrink-0 mt-4 sm:mt-0 text-right">
                            <p class="font-extrabold text-xl {{ $transaction->category->jenis == 'Pemasukan' ? 'text-green-500' : 'text-red-500' }}">
                                {{ $transaction->category->jenis == 'Pemasukan' ? '+' : '-' }} Rp {{ number_format($transaction->nominal, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-3xl p-8 text-center shadow-sm border border-gray-100">
                        <p class="text-gray-500 font-medium">Belum ada transaksi terakhir.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Empty space for future Charts -->
            <div class="md:col-span-1">
                <div class="bg-[#E2E8F0] rounded-3xl h-full min-h-[300px] flex flex-col items-center justify-center shadow-inner mt-12 md:mt-0 p-8 text-center">
                    <div class="w-16 h-16 bg-white/50 rounded-full flex items-center justify-center text-3xl mb-4 shadow-sm">📈</div>
                    <span class="text-2xl font-black text-black">Analisis Grafik</span>
                    <p class="text-slate-500 text-sm mt-2 font-medium">Data grafik pemasukan akan muncul di sini segera.</p>
                </div>
            </div>
        </div>

    </main>

</body>
</html>
