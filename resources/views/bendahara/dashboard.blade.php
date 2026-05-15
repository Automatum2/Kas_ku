@extends('layouts.main')

@section('title', 'Dashboard Bendahara - Kas-Ku')

@section('content')
<!-- Top Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
    <!-- Card 1: Pantau Saldo -->
    <div class="md:col-span-2 relative rounded-[2.5rem] overflow-hidden h-80 shadow-2xl group bg-blue-900 border-4 border-white">
        <img src="{{ asset('foto/mulai-bayar/image 27.png?v=1') }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-60">
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent"></div>
        <div class="absolute inset-0 p-12 flex flex-col justify-between z-10">
            <div>
                <p class="text-blue-200 text-sm font-black uppercase tracking-[0.3em] drop-shadow-md">Saldo Saat Ini</p>
                <h2 class="text-6xl font-black text-white drop-shadow-2xl tracking-tighter mt-4">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</h2>
            </div>
            <div class="flex items-center gap-6">
                <button onclick="document.getElementById('qrisModal').classList.remove('hidden')" 
                    class="bg-white text-[#003d82] font-black px-12 py-4 rounded-2xl hover:bg-gray-50 transition-all shadow-2xl text-base transform hover:scale-105 active:scale-95 uppercase tracking-widest">
                    + Bayar Sendiri
                </button>
                <div class="bg-green-500/20 backdrop-blur-md border border-green-500/30 px-6 py-3 rounded-2xl">
                    <p class="text-green-400 font-black text-sm tracking-widest uppercase">+2.4% <span class="text-white/70 font-bold ml-1">Bulan ini</span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side Stats (Replacing Tabungan Kelas card for Treasurer) -->
    <div class="flex flex-col gap-8 h-80">
        <!-- Statistik -->
        <div class="flex-1 bg-white rounded-[2.5rem] p-8 shadow-sm border-2 border-gray-50 relative overflow-hidden group hover:shadow-xl transition-all duration-500">
            <div class="relative z-10">
                <p class="text-gray-400 text-xs font-black uppercase tracking-[0.2em] mb-2">Partisipasi Kelas</p>
                <h3 class="text-4xl font-black text-[#0047FF] tracking-tighter">92%</h3>
                <p class="text-gray-500 font-bold text-sm mt-1">Siswa sudah lunas kas bulan ini</p>
            </div>
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-150 transition-all duration-700"></div>
        </div>

        <!-- Tunggakan -->
        <div class="flex-1 bg-white rounded-[2.5rem] p-8 shadow-sm border-2 border-gray-50 relative overflow-hidden group hover:shadow-xl transition-all duration-500">
            <div class="relative z-10">
                <p class="text-red-400 text-xs font-black uppercase tracking-[0.2em] mb-2">Tunggakan</p>
                <h3 class="text-4xl font-black text-red-500 tracking-tighter">4 <span class="text-lg font-bold text-gray-400 ml-1">Siswa</span></h3>
                <a href="#" class="text-blue-500 font-black text-xs uppercase tracking-widest mt-2 hover:underline inline-block">Lihat Detail &rarr;</a>
            </div>
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-red-50 rounded-full group-hover:scale-150 transition-all duration-700"></div>
        </div>
    </div>
</div>

<!-- Bottom Section Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
    <!-- Transactions Column -->
    <div class="md:col-span-2">
        <div class="flex justify-between items-end mb-8">
            <h3 class="text-3xl font-black text-gray-900 tracking-tighter">Transaksi Terakhir</h3>
            <a href="#" class="text-[#0047FF] font-black text-sm uppercase tracking-widest hover:underline">Lihat Semua</a>
        </div>
        
        <div class="space-y-6">
            @forelse($recentTransactions as $transaction)
            <div class="bg-white rounded-[2.5rem] p-8 flex flex-col sm:flex-row items-center shadow-sm border-2 border-gray-50 hover:shadow-xl transition-all duration-500 group">
                <!-- Icon Box -->
                <div class="w-16 h-16 rounded-2xl {{ $transaction->category->jenis == 'Pemasukan' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} flex items-center justify-center shrink-0 sm:mr-8 mb-4 sm:mb-0 shadow-sm group-hover:rotate-6 transition-transform">
                    <span class="text-2xl font-black">{{ $transaction->category->jenis == 'Pemasukan' ? '+' : '-' }}</span>
                </div>
                
                <!-- Details -->
                <div class="flex-1 text-center sm:text-left">
                    <p class="font-black text-gray-900 text-2xl tracking-tight">{{ $transaction->user->nama_lengkap ?? 'Kas Umum' }}</p>
                    <p class="text-gray-400 text-lg font-bold mt-1">{{ $transaction->category->nama_kategori }} • {{ \Carbon\Carbon::parse($transaction->tanggal)->translatedFormat('F j, Y') }}</p>
                </div>
                
                <!-- Amount -->
                <div class="shrink-0 mt-5 sm:mt-0 text-right">
                    <p class="font-black text-2xl {{ $transaction->category->jenis == 'Pemasukan' ? 'text-green-500' : 'text-red-500' }} tracking-tighter">
                        {{ $transaction->category->jenis == 'Pemasukan' ? '+' : '-' }} Rp {{ number_format($transaction->nominal, 0, ',', '.') }}
                    </p>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-[2.5rem] p-16 text-center shadow-sm border-2 border-dashed border-gray-100">
                <p class="text-gray-300 font-black text-2xl">Belum ada transaksi.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Approval Column -->
    <div class="md:col-span-1">
        <h3 class="text-3xl font-black text-gray-900 mb-8 tracking-tighter">Persetujuan</h3>
        
        <div class="space-y-6">
            @forelse($pendingTransactions as $pending)
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border-2 border-orange-100 relative overflow-hidden hover:shadow-xl transition-all duration-500">
                <div class="absolute top-0 left-0 w-2 h-full bg-orange-400"></div>
                
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="font-black text-gray-900 text-xl tracking-tight">{{ $pending->user->nama_lengkap ?? 'Siswa' }}</p>
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mt-1">{{ \Carbon\Carbon::parse($pending->tanggal)->translatedFormat('F j, Y') }}</p>
                    </div>
                    <span class="bg-orange-50 text-orange-600 text-[10px] font-black px-4 py-1 rounded-full uppercase tracking-widest border border-orange-100 italic">Menunggu</span>
                </div>
                
                <div class="mb-6">
                    <p class="text-2xl font-black text-black tracking-tighter">Rp {{ number_format($pending->nominal, 0, ',', '.') }}</p>
                    @if($pending->bukti_transfer)
                        <a href="{{ asset('uploads/bukti/'.$pending->bukti_transfer) }}" target="_blank" class="text-xs text-blue-500 font-bold hover:underline inline-flex items-center mt-3 uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            Lihat Bukti
                        </a>
                    @endif
                </div>

                <div class="flex gap-4">
                    <form action="{{ route('bendahara.transaksi.terima', $pending->id) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white text-xs font-black py-4 rounded-2xl transition-all shadow-lg shadow-green-100 uppercase tracking-widest">Terima</button>
                    </form>
                    <form action="{{ route('bendahara.transaksi.tolak', $pending->id) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-red-50 hover:bg-red-100 text-red-500 text-xs font-black py-4 rounded-2xl transition-all uppercase tracking-widest">Tolak</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="bg-gray-50 rounded-[2.5rem] p-10 text-center border-2 border-dashed border-gray-100">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-sm">✨</div>
                <p class="text-gray-400 font-bold text-base italic uppercase tracking-widest">Semua pembayaran<br>sudah disetujui!</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Modal Simulasi QRIS -->
<div id="qrisModal" class="fixed inset-0 bg-black/80 z-[100] flex items-center justify-center hidden backdrop-blur-md transition-all duration-500">
    <div class="bg-white rounded-[3rem] p-12 max-w-md w-full mx-4 shadow-2xl relative border-[10px] border-gray-50 scale-100">
        <!-- Close Button -->
        <button onclick="document.getElementById('qrisModal').classList.add('hidden')" class="absolute top-8 right-8 text-gray-400 hover:text-black transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="text-center mb-10">
            <h3 class="text-4xl font-black text-[#003d82] tracking-tighter">Bayar Kas Sendiri</h3>
            <p class="text-lg text-gray-400 mt-3 font-bold italic uppercase tracking-widest">Nominal: <span class="text-black font-black">Rp 10.000</span></p>
        </div>

        <!-- Dummy QR Code -->
        <div class="flex justify-center mb-10">
            <div class="p-8 bg-white border-4 border-dashed border-gray-100 rounded-[2.5rem] shadow-inner">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=Pembayaran+Kas+Dummy" alt="QRIS Dummy" class="w-56 h-56">
            </div>
        </div>

        <!-- Form Upload Bukti -->
        <form action="{{ route('bendahara.bayar') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            <div>
                <label class="block text-xs font-black text-gray-400 mb-4 uppercase tracking-[0.2em] text-center">Upload Bukti Transfer</label>
                <div class="relative">
                    <input type="file" name="bukti_transfer" accept="image/*" required
                        class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-4 file:px-8
                        file:rounded-2xl file:border-0
                        file:text-sm file:font-black
                        file:bg-[#003d82] file:text-white
                        hover:file:bg-blue-800 transition-all cursor-pointer border-2 border-gray-100 rounded-[2rem] p-1.5 shadow-sm">
                </div>
            </div>

            <button type="submit" class="w-full bg-[#003d82] text-white font-black py-6 rounded-[2rem] hover:bg-blue-900 transition-all shadow-2xl text-xl uppercase tracking-[0.3em]">
                Kirim
            </button>
        </form>
    </div>
</div>

@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@endsection
