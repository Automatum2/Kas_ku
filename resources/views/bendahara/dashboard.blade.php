<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bendahara - Kas-Ku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0B0E14; color: white; }
        .sidebar { background-color: #151921; border-right: 1px solid rgba(255, 255, 255, 0.05); }
        .card { background-color: #151921; border: 1px solid rgba(255, 255, 255, 0.05); }
        .accent-blue { color: #3B82F6; }
        .bg-accent-blue { background-color: #3B82F6; }
    </style>
</head>
<body class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="sidebar w-64 flex-shrink-0 flex flex-col p-6">
        <div class="mb-10">
            <h1 class="text-2xl font-bold text-blue-500">Kas-Ku</h1>
        </div>
        
        <nav class="flex-1 space-y-2">
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-600/10 text-blue-500 rounded-xl font-semibold border border-blue-600/20">
                <span class="text-xl">🏠</span> Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-white/5 rounded-xl transition-all">
                <span class="text-xl">📊</span> Statistik
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-white/5 rounded-xl transition-all">
                <span class="text-xl">👥</span> Data Siswa
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-white/5 rounded-xl transition-all">
                <span class="text-xl">⚙️</span> Pengaturan
            </a>
        </nav>

        <div class="mt-auto pt-6 border-t border-white/5">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center font-bold text-white">B</div>
                <div class="overflow-hidden">
                    <p class="text-sm font-bold truncate">{{ Auth::user()->nama_lengkap }}</p>
                    <p class="text-[10px] text-slate-500 uppercase tracking-tighter">Bendahara</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left text-sm text-red-400 hover:text-red-300 transition-colors flex items-center gap-2">
                    <span>🚪</span> Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10 overflow-y-auto">
        <header class="mb-10 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-white">Ringkasan Keuangan</h2>
                <p class="text-slate-400 text-sm mt-1">Selamat datang kembali, mari pantau kas hari ini.</p>
            </div>
            <div class="flex gap-4">
                <button class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2.5 rounded-xl font-bold text-sm transition-all shadow-lg shadow-blue-600/20">
                    + Input Pemasukan
                </button>
            </div>
        </header>

        <!-- Cards Container -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Card 1: Pantau Saldo -->
            <div class="card p-8 rounded-[32px] relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-2">Pantau Saldo</p>
                    <h3 class="text-3xl font-bold">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</h3>
                    <p class="text-xs text-green-400 mt-4 flex items-center gap-1">
                        <span>📈</span> +2.4% dari bulan lalu
                    </p>
                </div>
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-blue-600 opacity-5 rounded-full group-hover:scale-150 transition-all duration-700"></div>
            </div>

            <!-- Card 2: Statistik Kelas -->
            <div class="card p-8 rounded-[32px]">
                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-2">Statistik Kelas</p>
                <h3 class="text-3xl font-bold text-green-500">92%</h3>
                <p class="text-xs text-slate-500 mt-4">Siswa sudah membayar bulan ini</p>
            </div>

            <!-- Card 3: Daftar Tunggakan -->
            <div class="card p-8 rounded-[32px] border-red-500/10">
                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-2 text-red-400/70">Daftar Tunggakan</p>
                <h3 class="text-3xl font-bold text-red-500">4 <span class="text-lg font-normal text-slate-600">Siswa</span></h3>
                <p class="text-xs text-slate-500 mt-4 hover:text-red-400 cursor-pointer transition-colors underline">Lihat Detail &rarr;</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Transactions Table -->
            <div class="card rounded-[32px] overflow-hidden">
                <div class="p-8 border-b border-white/5 flex justify-between items-center">
                    <h4 class="font-bold text-lg">Transaksi Terakhir</h4>
                    <a href="#" class="text-blue-500 text-xs hover:underline">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <tbody class="divide-y divide-white/5">
                            @forelse($recentTransactions as $transaction)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="px-8 py-5">
                                    <p class="font-bold text-white">{{ $transaction->user->nama_lengkap ?? 'Kas Umum' }}</p>
                                    <p class="text-[10px] text-slate-500 uppercase">{{ $transaction->category->nama_kategori }}</p>
                                </td>
                                <td class="px-8 py-5 text-right">
                                    <p class="font-bold {{ $transaction->category->jenis == 'Pemasukan' ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $transaction->category->jenis == 'Pemasukan' ? '+' : '-' }} Rp {{ number_format($transaction->nominal, 0, ',', '.') }}
                                    </p>
                                    <p class="text-[10px] text-slate-600">{{ $transaction->tanggal }}</p>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="px-8 py-10 text-center text-slate-500">Belum ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Empty space for future Charts -->
            <div class="card rounded-[32px] p-8 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 bg-blue-600/10 rounded-full flex items-center justify-center text-2xl mb-4">📈</div>
                <h4 class="font-bold">Analisis Grafik</h4>
                <p class="text-slate-500 text-sm mt-2 max-w-[200px]">Data grafik pemasukan akan muncul di sini segera.</p>
            </div>
        </div>
    </main>

</body>
</html>
