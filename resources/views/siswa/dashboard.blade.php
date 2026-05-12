<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - Kas-Ku</title>
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 text-gray-500 hover:text-slate-800 px-4 py-3 rounded-2xl font-medium transition-colors">
                    <span class="w-5"></span> <!-- spacer -->
                    Tentang
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
                <h1 class="text-3xl font-extrabold text-black mb-1 tracking-tight">Selamat datang, {{ Auth::user()->nis }} !</h1>
                <p class="text-gray-600 font-medium">Ayo mulai rajin membayar Kas kelas mu !</p>
            </div>
            <div class="flex items-center bg-white border border-gray-200 rounded-full pr-6 pl-2 py-1.5 shadow-sm h-fit">
                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700">Terdaftar sebagai <span class="font-bold text-black">Siswa</span></span>
            </div>
        </header>

        <!-- Top Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Card 1 (takes 2 columns) -->
            <div class="md:col-span-2 relative rounded-3xl overflow-hidden h-64 shadow-lg group">
                <img src="{{ asset('foto/bayar kas 2.png') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-blue-900/40 mix-blend-multiply"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-between">
                    <div>
                        <h2 class="text-3xl font-extrabold text-white drop-shadow-md">Mulai bayar Kas</h2>
                        <p class="text-white/90 text-lg drop-shadow-sm font-medium mt-1">Semakin cepat bayar semakin bagus !</p>
                    </div>
                    <div class="flex justify-center mt-auto pb-2">
                        <button class="bg-white text-[#003d82] font-extrabold px-16 py-3 rounded-full hover:bg-gray-100 transition-colors shadow-xl text-lg">
                            Masuk
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 (takes 1 column) -->
            <div class="relative rounded-3xl overflow-hidden h-64 shadow-lg group">
                <div class="absolute inset-0 bg-[#E0A86A] opacity-100"></div>
                <img src="{{ asset('foto/image 15.png') }}" onerror="this.style.display='none';" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay group-hover:scale-105 transition-transform duration-500 opacity-70">
                <div class="absolute inset-0 p-8 flex flex-col items-center">
                    <h2 class="text-3xl font-extrabold text-white text-center leading-tight drop-shadow-md">Tabungan<br>Kelas</h2>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- History Column -->
            <div class="md:col-span-2">
                <h3 class="text-xl font-extrabold text-black mb-6">History pembayaran Siswa</h3>
                
                <div class="space-y-4">
                    @forelse($myTransactions->take(3) as $transaction)
                    <div class="bg-white rounded-3xl p-5 flex flex-col sm:flex-row items-center shadow-sm border border-gray-100">
                        <!-- Icon -->
                        <div class="w-12 h-12 rounded-full bg-[#003d82] flex items-center justify-center shrink-0 sm:mr-4 mb-3 sm:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        
                        <!-- Details -->
                        <div class="flex-1 text-center sm:text-left">
                            <p class="font-extrabold text-black text-lg">{{ Auth::user()->nis }}, Telah membayar Kas</p>
                            <p class="text-gray-500 text-sm font-medium mt-0.5">{{ \Carbon\Carbon::parse($transaction->tanggal)->translatedFormat('F j, Y') }}</p>
                        </div>
                        
                        <!-- Status Badge -->
                        <div class="shrink-0 mt-4 sm:mt-0">
                            <span class="inline-block bg-[#00FF00] text-black font-extrabold px-6 py-1.5 rounded-full text-xs shadow-sm border-b-2 border-green-700/30 italic uppercase">
                                Berhasil !
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-3xl p-8 text-center shadow-sm border border-gray-100">
                        <p class="text-gray-500 font-medium">Belum ada history pembayaran.</p>
                    </div>
                    @endforelse
                </div>

                <div class="mt-6 text-center">
                    <a href="#" class="text-[#003d82] font-bold text-sm hover:underline">Lihat semua History</a>
                </div>
            </div>

            <!-- Gatau gambarnya placeholder -->
            <div class="md:col-span-1">
                <div class="bg-[#E2E8F0] rounded-3xl h-full min-h-[300px] flex items-center justify-center shadow-inner mt-12 md:mt-0">
                    <span class="text-2xl font-black text-black">gatau gambarnya</span>
                </div>
            </div>
        </div>

    </main>

</body>
</html>
