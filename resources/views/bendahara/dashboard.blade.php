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
                <a href="{{ route('bendahara.dashboard') }}" class="flex items-center gap-3 bg-[#D3E3F1] text-[#1E293B] px-5 py-2.5 rounded-full font-bold transition-colors shadow-sm">
                    <span class="text-xl">🏠</span>
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
                <a href="{{ route('bendahara.tentang') }}" class="flex items-center gap-3 text-gray-800 hover:text-black px-5 py-2.5 rounded-full font-semibold transition-colors">
                    <span class="text-xl opacity-80">ℹ️</span>
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
    <main class="flex-1 p-8 md:p-12 overflow-y-auto">
        
        <!-- Header -->
        <header class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
            <div>
                <h1 class="text-3xl font-extrabold text-black mb-1 tracking-tight">Selamat datang, {{ Auth::user()->nama_lengkap }} !</h1>
                <p class="text-gray-600 font-medium">Ringkasan keuangan dan pantau kas hari ini.</p>
            </div>
            <div class="flex items-center gap-4">
                <button onclick="document.getElementById('qrisModal').classList.remove('hidden')" class="bg-[#003d82] hover:bg-blue-800 text-white px-6 py-2.5 rounded-full font-bold text-sm transition-all shadow-md">
                    + Bayar Kas Sendiri
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

            <!-- Pending Transactions Column -->
            <div class="md:col-span-1">
                <div class="flex justify-between items-end mb-6 mt-12 md:mt-0">
                    <h3 class="text-xl font-extrabold text-black">Perlu Persetujuan</h3>
                </div>
                
                <div class="space-y-4">
                    @forelse($pendingTransactions as $pending)
                    <div class="bg-white rounded-3xl p-5 shadow-sm border border-orange-200 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-orange-400"></div>
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <p class="font-extrabold text-black">{{ $pending->user->nama_lengkap ?? 'Siswa' }}</p>
                                <p class="text-gray-500 text-xs font-medium">{{ \Carbon\Carbon::parse($pending->tanggal)->translatedFormat('F j, Y') }}</p>
                            </div>
                            <span class="bg-orange-100 text-orange-600 text-[10px] font-extrabold px-2 py-1 rounded-full uppercase">Menunggu</span>
                        </div>
                        
                        <div class="mb-3">
                            <p class="text-sm text-gray-700 font-bold">Rp {{ number_format($pending->nominal, 0, ',', '.') }}</p>
                            @if($pending->bukti_transfer)
                                <a href="{{ asset('uploads/bukti/'.$pending->bukti_transfer) }}" target="_blank" class="text-xs text-blue-500 hover:underline inline-flex items-center mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    Lihat Bukti Transfer
                                </a>
                            @endif
                        </div>

                        <div class="flex gap-2 mt-2">
                            <form action="{{ route('bendahara.transaksi.terima', $pending->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white text-xs font-bold py-2 rounded-xl transition-colors shadow-sm">Terima</button>
                            </form>
                            <form action="{{ route('bendahara.transaksi.tolak', $pending->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full bg-red-100 hover:bg-red-200 text-red-600 text-xs font-bold py-2 rounded-xl transition-colors">Tolak</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="bg-gray-50 rounded-3xl p-6 text-center border border-dashed border-gray-200">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-xl mx-auto mb-2 text-gray-400">✨</div>
                        <p class="text-gray-500 text-sm font-medium">Semua pembayaran sudah disetujui!</p>
                    </div>
                    @endforelse
                </div>
            </div>

    <!-- Alert Notifikasi -->
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif
        </div>

    </main>

    <!-- Modal Simulasi QRIS untuk Bendahara -->
    <div id="qrisModal" class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-3xl p-8 max-w-md w-full mx-4 shadow-2xl transform transition-all relative">
            <!-- Close Button -->
            <button onclick="document.getElementById('qrisModal').classList.add('hidden')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="text-center mb-6">
                <h3 class="text-2xl font-extrabold text-[#003d82]">Pembayaran Kas Sendiri</h3>
                <p class="text-sm text-gray-500 mt-1 font-medium">Scan QRIS ini untuk membayar kas sebesar Rp 10.000</p>
            </div>

            <!-- Dummy QR Code -->
            <div class="flex justify-center mb-6">
                <div class="p-4 bg-white border-2 border-dashed border-gray-300 rounded-2xl shadow-sm">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Pembayaran+Kas+Dummy" alt="QRIS Dummy" class="w-40 h-40">
                </div>
            </div>

            <!-- Form Upload Bukti -->
            <form action="{{ route('bendahara.bayar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Upload Bukti Transfer (Simulasi)</label>
                    <input type="file" name="bukti_transfer" accept="image/*" required
                        class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2.5 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-[#003d82]
                        hover:file:bg-blue-100 transition-all cursor-pointer">
                </div>

                <button type="submit" class="w-full bg-[#003d82] text-white font-bold py-3 rounded-full hover:bg-blue-800 transition-colors shadow-md">
                    Kirim Pembayaran
                </button>
            </form>
        </div>
    </div>

</body>
</html>
