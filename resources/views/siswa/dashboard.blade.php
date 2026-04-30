<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - Kas-Ku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0B0E14; color: white; }
        .card { background-color: #151921; border: 1px solid rgba(255, 255, 255, 0.05); }
        .accent-blue { color: #3B82F6; }
    </style>
</head>
<body class="bg-[#0B0E14] min-h-screen">

    <nav class="border-b border-white/5 px-8 py-5 flex justify-between items-center bg-[#0B0E14] sticky top-0 z-50">
        <h1 class="text-2xl font-bold text-blue-500">Kas-Ku</h1>
        <div class="flex items-center gap-6">
            <div class="text-right hidden sm:block">
                <p class="text-sm font-bold text-white">{{ Auth::user()->nama_lengkap }}</p>
                <p class="text-[10px] text-slate-500 uppercase tracking-widest">Siswa</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-red-500/10 hover:bg-red-500/20 text-red-500 px-4 py-2 rounded-xl text-xs font-bold transition-all">
                    KELUAR
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto p-8">
        
        <!-- Welcome Section -->
        <header class="mb-10 text-center sm:text-left">
            <h2 class="text-3xl font-bold text-white">Halo, Selamat Pagi! 👋</h2>
            <p class="text-slate-400 mt-2">Berikut adalah ringkasan transparansi kas kelas Anda.</p>
        </header>

        <!-- Main Card: Saldo Kelas -->
        <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-10 rounded-[40px] shadow-2xl shadow-blue-900/20 mb-10 relative overflow-hidden group">
            <div class="relative z-10 flex flex-col sm:flex-row justify-between items-center gap-8 text-center sm:text-left">
                <div>
                    <p class="text-blue-100 text-sm font-bold uppercase tracking-widest">Total Saldo Kas Kelas</p>
                    <h3 class="text-5xl font-extrabold mt-2 tracking-tight text-white">Rp {{ number_format($saldoKelas, 0, ',', '.') }}</h3>
                    <p class="mt-6 text-xs text-blue-200/70 inline-flex items-center gap-2 bg-black/20 px-4 py-2 rounded-full">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> Sistem Terverifikasi & Transparan
                    </p>
                </div>
                <button class="bg-white text-blue-700 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-blue-50 transition-all shadow-xl active:scale-95">
                    Bayar Uang Kas (QRIS)
                </button>
            </div>
            <!-- Decorative blur -->
            <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl group-hover:opacity-20 transition-opacity"></div>
        </div>

        <!-- My Payments Section -->
        <div>
            <h4 class="text-xl font-bold mb-6 flex items-center gap-2">
                <span class="w-8 h-8 bg-white/5 rounded-lg flex items-center justify-center text-sm">📑</span> Riwayat Pembayaran Saya
            </h4>
            
            <div class="card rounded-[32px] overflow-hidden">
                <table class="w-full text-left text-sm">
                    <thead class="bg-white/[0.02] border-b border-white/5 text-slate-500 uppercase font-bold text-[10px] tracking-widest">
                        <tr>
                            <th class="px-8 py-5">Tanggal</th>
                            <th class="px-8 py-5">Kategori</th>
                            <th class="px-8 py-5 text-right">Nominal</th>
                            <th class="px-8 py-5 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($myTransactions as $transaction)
                        <tr class="hover:bg-white/[0.01] transition-colors">
                            <td class="px-8 py-6 text-slate-400">{{ $transaction->tanggal }}</td>
                            <td class="px-8 py-6">
                                <p class="font-bold text-white">{{ $transaction->category->nama_kategori }}</p>
                                <p class="text-[10px] text-slate-600">{{ $transaction->keterangan }}</p>
                            </td>
                            <td class="px-8 py-6 text-right font-bold text-blue-400">
                                Rp {{ number_format($transaction->nominal, 0, ',', '.') }}
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="px-3 py-1.5 rounded-lg text-[10px] font-bold tracking-widest uppercase {{ $transaction->status_transaksi == 'Lunas' ? 'bg-green-500/10 text-green-500' : 'bg-yellow-500/10 text-yellow-500' }}">
                                    {{ $transaction->status_transaksi }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-16 text-center text-slate-500">
                                <p class="text-3xl mb-4">📭</p>
                                <p>Belum ada riwayat pembayaran untuk akun Anda.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>
</html>
