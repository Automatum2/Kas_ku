<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kas-ku - Lapor kepada Bendahara</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900">

    <div class="flex min-h-screen">
        
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between p-6 shrink-0">
            <div>
                <div class="flex items-center space-x-3 mb-10">
                    <img src="{{ asset('foto/global/Logo.png') }}" alt="Kas-ku Logo" class="h-10 w-auto object-contain">
                    <span class="text-2xl font-bold text-blue-600 tracking-tight">Kas-ku</span>
                    <button class="ml-auto text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                    </button>
                </div>

                <nav class="space-y-4">
                    <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium py-2 px-3 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium py-2 px-3 rounded-lg transition-colors">
                        <span class="text-gray-500 font-bold w-5 text-center">Tentang</span>
                    </a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 bg-blue-50/30 p-10">
            
            <div class="flex justify-between items-start border-b border-gray-200 pb-6 mb-8">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 mb-1">Lapor kepada Bendahara</h1>
                    <p class="text-gray-500 leading-relaxed">
                        Laporkan bila ada kendala kepada Bendahara <br>
                        Atau lapor untuk penyetujuan
                    </p>
                </div>
                
                <div class="flex items-center space-x-2 border border-gray-300 rounded-full px-4 py-2 bg-white shadow-sm shrink-0">
                    <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('foto/global/profil.png') }}" alt="Avatar Siswa" class="w-full h-full object-cover">
                    </div>
                    <span class="text-sm font-medium text-gray-700">Terdaftar sebagai <strong class="font-bold text-black">Siswa</strong></span>
                </div>
            </div> <section class="mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Bendahara di kelas XI RPL 2</h2>
                
                <div class="inline-flex items-center space-x-3 border border-gray-400 rounded-full px-4 py-1.5 bg-white mb-3 min-w-[200px]">
                    <div class="w-6 h-6 rounded-full bg-blue-600 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('foto/global/profil.png') }}" alt="Foto Bendahara" class="w-full h-full object-cover">
                    </div>
                    <span class="text-sm font-bold text-gray-800 tracking-wider">32363</span>
                </div>

                <div class="flex items-center space-x-2 text-sm font-bold text-gray-900 mt-2">
                    <img src="{{ asset('foto/lapor/wa.png') }}" alt="WhatsApp Logo" class="w-5 h-5 object-contain">
                    <span>+62 895 0543 4624 - No Bendahara</span>
                </div>
            </section>

            <section class="max-w-3xl">
                <h2 class="text-2xl font-bold text-gray-900 mb-5">Masalah yang umum terjadi</h2>

                <div class="space-y-4">
                    
                    <div class="bg-white border border-gray-700 rounded-3xl overflow-hidden shadow-sm">
                        <button class="w-full flex justify-between items-center px-6 py-4 text-left font-bold text-gray-900 focus:outline-none">
                            <span>Masalah kode QR tidak berfungsi</span>
                            <svg class="w-5 h-5 transform rotate-180 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="px-6 pb-6 text-gray-700 text-base leading-relaxed">
                            <p class="mb-4">
                                Jika kode QR tidak berfungsi ketika ingin melakukan transaksi diharapkan hubungi <strong class="font-bold">Bendahara</strong> untuk meminta kode QR yang baru untuk melanjutkan transaksi.
                            </p>
                            <p>
                                Jika pembayaran QR dirasa sulit, gunakan opsi pembayaran Cash secara langsung ke Bendahara di kelas.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-400 rounded-full overflow-hidden shadow-sm hover:border-gray-600 transition-colors">
                        <button class="w-full flex justify-between items-center px-6 py-4 text-left font-bold text-gray-800 focus:outline-none">
                            <span>Tidak di Acc Bendahara selama 24 jam</span>
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                    </div>

                    <div class="bg-white border border-gray-400 rounded-full overflow-hidden shadow-sm hover:border-gray-600 transition-colors">
                        <button class="w-full flex justify-between items-center px-6 py-4 text-left font-bold text-gray-800 focus:outline-none">
                            <span>Pengembalian uang pembayaran yang diatas 10K</span>
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                    </div>

                    <div class="bg-white border border-gray-400 rounded-full overflow-hidden shadow-sm hover:border-gray-600 transition-colors">
                        <button class="w-full flex justify-between items-center px-6 py-4 text-left font-bold text-gray-800 focus:outline-none">
                            <span>lorem ipsum</span>
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                    </div>

                </div>
            </section>

        </main>
    </div>

</body>
</html>