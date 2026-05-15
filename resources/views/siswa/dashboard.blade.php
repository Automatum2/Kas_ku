@extends('layouts.main')

@section('title', 'Dashboard Siswa - Kas-Ku')

@section('content')
<!-- Top Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
    <!-- Card 1: Mulai Bayar Kas -->
    <div class="md:col-span-2 relative rounded-[2.5rem] overflow-hidden h-80 shadow-2xl group border-4 border-white bg-blue-900">
        <img src="{{ asset('foto/dashboard/card1.png?v=1') }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-blue-900/40 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-transparent to-transparent"></div>
        <div class="absolute inset-0 p-10 flex flex-col justify-between z-10">
            <div>
                <h2 class="text-4xl font-black text-white drop-shadow-2xl tracking-tight">Mulai bayar Kas</h2>
                <p class="text-white/90 text-lg drop-shadow-lg font-bold mt-2">Semakin cepat bayar semakin bagus !</p>
            </div>
            <div class="flex justify-center">
                <button onclick="document.getElementById('qrisModal').classList.remove('hidden')" 
                    class="bg-white text-[#003d82] font-black px-24 py-4 rounded-2xl hover:bg-gray-50 transition-all shadow-2xl text-xl transform hover:scale-105 active:scale-95 uppercase tracking-widest">
                    Bayar
                </button>
            </div>
        </div>
    </div>

    <!-- Card 2: Tabungan Kelas -->
    <a href="#" class="relative rounded-[2.5rem] overflow-hidden h-80 shadow-2xl group cursor-pointer border-4 border-white bg-[#E0A86A]">
        <img src="{{ asset('foto/dashboard/tabungan-kelas.png?v=1') }}" loading="lazy" 
             class="absolute inset-0 w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
        <div class="absolute inset-0 bg-black/10 transition-colors group-hover:bg-transparent"></div>
    </a>
</div>

<!-- Bottom Section Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
    <!-- History Column -->
    <div class="md:col-span-2">
        <h3 class="text-3xl font-black text-gray-900 mb-8 tracking-tighter">History pembayaran Siswa</h3>
        
        <div class="space-y-6">
            @forelse($myTransactions->take(3) as $transaction)
            <div class="bg-white rounded-[2.5rem] p-8 flex flex-col sm:flex-row items-center shadow-sm border-2 border-gray-50 hover:shadow-xl transition-all duration-500 group">
                <!-- Icon Box -->
                <div class="w-16 h-16 rounded-2xl bg-[#003d82] flex items-center justify-center shrink-0 sm:mr-8 mb-4 sm:mb-0 shadow-lg group-hover:rotate-6 transition-transform">
                    <img src="{{ asset('foto/dashboard/udh-bayar.png?v=1') }}" alt="Paid" class="w-10 h-10 object-contain brightness-0 invert">
                </div>
                
                <!-- Details -->
                <div class="flex-1 text-center sm:text-left">
                    <p class="font-black text-gray-900 text-2xl tracking-tight">{{ Auth::user()->nis }}, Telah membayar Kas</p>
                    <p class="text-gray-400 text-lg font-bold mt-1">{{ \Carbon\Carbon::parse($transaction->tanggal)->translatedFormat('F j, Y') }}</p>
                </div>
                
                <!-- Status Badge -->
                <div class="shrink-0 mt-5 sm:mt-0">
                    @if($transaction->status_transaksi == 'Lunas')
                        <span class="inline-block bg-[#00FF00] text-black font-black px-10 py-3 rounded-full text-base shadow-lg border-b-4 border-green-700/20 italic tracking-tighter">
                            Berhasil !
                        </span>
                    @elseif($transaction->status_transaksi == 'Menunggu')
                        <span class="inline-block bg-yellow-400 text-black font-black px-10 py-3 rounded-full text-base shadow-lg border-b-4 border-yellow-600/20 italic tracking-tighter">
                            Diproses
                        </span>
                    @else
                        <span class="inline-block bg-red-500 text-white font-black px-10 py-3 rounded-full text-base shadow-lg border-b-4 border-red-700/20 italic tracking-tighter">
                            Ditolak
                        </span>
                    @endif
                </div>
            </div>
            @empty
            <div class="bg-white rounded-[2.5rem] p-16 text-center shadow-sm border-2 border-dashed border-gray-100">
                <p class="text-gray-300 font-black text-2xl">Belum ada history pembayaran.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a href="#" class="text-[#0047FF] font-black text-lg hover:underline tracking-widest uppercase">Lihat semua History</a>
        </div>
    </div>

    <!-- Card 3: Leaderboard Siswa Rajin -->
    <div class="md:col-span-1">
        <div class="bg-white rounded-[2.5rem] h-full min-h-[450px] p-8 shadow-2xl relative overflow-hidden border-4 border-white flex flex-col">
            <!-- Header Card -->
            <div class="mb-8">
                <h3 class="text-2xl font-black text-gray-900 tracking-tighter">Siswa Ter-Rajin</h3>
                <p class="text-gray-400 text-sm font-bold uppercase tracking-widest mt-1">6 Bulan Terakhir</p>
            </div>

            <!-- List Peringkat -->
            <div class="space-y-4 flex-1">
                @forelse($rankingSiswa as $index => $rank)
                <div class="flex items-center gap-4 p-4 rounded-3xl {{ $index == 0 ? 'bg-yellow-50 border-2 border-yellow-100' : 'bg-gray-50 border-2 border-transparent' }} transition-all">
                    <!-- Rank Number/Icon -->
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center shrink-0 shadow-sm
                        {{ $index == 0 ? 'bg-yellow-400 text-white' : ($index == 1 ? 'bg-gray-300 text-gray-600' : 'bg-orange-300 text-white') }}">
                        @if($index == 0)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        @else
                            <span class="text-xl font-black">{{ $index + 1 }}</span>
                        @endif
                    </div>

                    <!-- User Info -->
                    <div class="flex-1 min-w-0">
                        <p class="font-black text-gray-900 truncate tracking-tight text-lg">{{ $rank->user->nama_lengkap ?? $rank->user->nis }}</p>
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-widest">{{ $rank->total_bayar }}x Pembayaran</p>
                    </div>

                    <!-- Badge -->
                    @if($index == 0)
                        <div class="bg-yellow-400/20 text-yellow-600 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-tighter italic">MVP!</div>
                    @endif
                </div>
                @empty
                <div class="flex flex-col items-center justify-center h-full text-center p-8 opacity-50">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center text-3xl mb-4">🏆</div>
                    <p class="text-gray-400 font-bold italic">Belum ada data peringkat.</p>
                </div>
                @endforelse
            </div>

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
            <h3 class="text-4xl font-black text-[#003d82] tracking-tighter">Pembayaran Kas</h3>
            <p class="text-lg text-gray-400 mt-3 font-bold italic uppercase tracking-widest">Nominal: <span class="text-black font-black">Rp 10.000</span></p>
        </div>

        <!-- Dummy QR Code -->
        <div class="flex justify-center mb-10">
            <div class="p-8 bg-white border-4 border-dashed border-gray-100 rounded-[2.5rem] shadow-inner">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=Pembayaran+Kas+Dummy" alt="QRIS Dummy" class="w-56 h-56">
            </div>
        </div>

        <!-- Form Upload Bukti -->
        <form action="{{ route('siswa.bayar') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
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
<div id="successToast" class="fixed bottom-12 right-12 bg-green-500 text-white px-10 py-5 rounded-[2rem] shadow-2xl font-black z-[110] animate-bounce text-lg">
    {{ session('success') }}
</div>
<script>
    setTimeout(() => {
        document.getElementById('successToast').remove();
    }, 5000);
</script>
@endif

@endsection
