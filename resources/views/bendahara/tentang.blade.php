<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kas-Ku (Bendahara)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
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
            <div class="px-6 py-8 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('foto/Logo.png') }}" alt="Logo" class="w-8">
                    <span class="text-xl font-extrabold text-[#0047FF]">Kas-ku</span>
                </div>
                <!-- Toggle Sidebar Icon -->
                <button class="text-gray-800 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="4" ry="4" />
                        <line x1="9" y1="3" x2="9" y2="21" />
                    </svg>
                </button>
            </div>

            <!-- Menu -->
            <nav class="mt-2 px-4 space-y-2">
                <a href="{{ route('bendahara.dashboard') }}" class="flex items-center gap-3 text-gray-800 hover:text-black px-5 py-2.5 rounded-full font-semibold transition-colors">
                    <span class="text-xl opacity-80">🏠</span>
                    <span class="text-sm">Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 text-gray-800 hover:text-black px-5 py-2.5 rounded-full font-semibold transition-colors">
                    <span class="text-xl opacity-80">📊</span>
                    <span class="text-sm">Statistik</span>
                </a>
                <a href="#" class="flex items-center gap-3 text-gray-800 hover:text-black px-5 py-2.5 rounded-full font-semibold transition-colors">
                    <span class="text-xl opacity-80">👥</span>
                    <span class="text-sm">Data Siswa</span>
                </a>
                <a href="#" class="flex items-center gap-3 text-gray-800 hover:text-black px-5 py-2.5 rounded-full font-semibold transition-colors">
                    <span class="text-xl opacity-80">⚙️</span>
                    <span class="text-sm">Pengaturan</span>
                </a>
                <a href="{{ route('bendahara.tentang') }}" class="flex items-center gap-3 bg-[#D3E3F1] text-[#1E293B] px-5 py-2.5 rounded-full font-bold transition-colors shadow-sm">
                    <span class="text-xl">ℹ️</span>
                    <span class="text-sm">Tentang</span>
                </a>
            </nav>
        </div>

        <!-- Logout -->
        <div class="p-6 mb-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-3 text-gray-800 hover:text-black font-bold transition-colors w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FF4747]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H9" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 3H5a2 2 0 00-2 2v14a2 2 0 002 2h10" />
                    </svg>
                    <span class="text-xs">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 md:p-12 overflow-y-auto bg-[#F8FAFC]">
        
        <!-- Header -->
        <header class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-6 border-b border-gray-200 pb-8">
            <div>
                <h1 class="text-3xl font-black text-black mb-1 tracking-tight">Tentang Kas-ku</h1>
                <p class="text-gray-600 font-medium text-lg">Membangun Budaya Jujur dari Kelas</p>
            </div>
            <div class="flex items-center bg-white border border-gray-300 rounded-full pr-6 pl-2 py-1.5 shadow-sm h-fit">
                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center mr-3 font-bold text-white text-xs">
                    B
                </div>
                <span class="text-sm font-semibold text-gray-700">Terdaftar sebagai <span class="font-bold text-black">Bendahara</span></span>
            </div>
        </header>

        <!-- Images Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16 max-w-5xl mx-auto">
            <div class="rounded-3xl overflow-hidden shadow-xl h-[350px] bg-gray-200">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80" alt="Siswa sedang berinteraksi" class="w-full h-full object-cover">
            </div>
            <div class="rounded-3xl overflow-hidden shadow-xl h-[350px] bg-gray-200">
                <img src="https://images.unsplash.com/photo-1596495578065-6e0763fa1178?auto=format&fit=crop&w=800&q=80" alt="Scan QRIS" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Description Section -->
        <div class="max-w-4xl mx-auto text-center px-4 mb-20">
            <div class="space-y-3 mb-16">
                <p class="text-xl md:text-2xl font-black text-black leading-tight">
                    Transparansi Mutlak: Menghilangkan keraguan anggota<br>
                    kelas dengan pencatatan pengeluaran yang bisa dilihat<br>
                    siapa saja dan kapan saja.
                </p>
                <p class="text-xl md:text-2xl font-black text-black leading-tight">
                    Efisiensi Bendahara: Membantu bendahara mengelola<br>
                    tunggakan secara otomatis tanpa perlu mencatat manual<br>
                    di buku yang rawan hilang.
                </p>
                <p class="text-xl md:text-2xl font-black text-black leading-tight">
                    Kedisiplinan Siswa: Sistem pengingat yang membantu<br>
                    siswa untuk lebih tepat waktu dalam mendukung<br>
                    pendanaan kegiatan kelas.
                </p>
            </div>

            <div class="pt-8">
                <p class="text-2xl md:text-[28px] font-black text-black leading-snug tracking-tight">
                    Kas-Ku hadir sebagai solusi digital untuk mengatasi<br>
                    masalah klasik pendidikan: pengelolaan dana yang<br>
                    tidak transparan. Kami percaya, kejujuran dimulai<br>
                    dari hal kecil seperti uang kas.
                </p>
            </div>
        </div>

    </main>

</body>
</html>
