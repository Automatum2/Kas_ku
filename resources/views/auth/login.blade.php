@extends('layouts.auth')

@section('title', 'Login - Kas-Ku')

@section('content')
<div class="w-full max-w-[600px] flex flex-col items-center">
    
    <!-- Header: Logo & Title -->
    <div class="flex flex-col items-center mb-10">
        <div class="flex items-center gap-4 mb-2">
            <!-- Logo K Biru -->
            <img src="{{asset('foto/Logo.png')}}" alt="Logo Kas-Ku" class="w-16 h-auto object-contain">
            <h1 class="text-6xl font-adlam text-white tracking-tight">Kas-ku</h1>
        </div>
        <p class="text-white font-adlam text-center text-base px-6 leading-relaxed max-w-[520px] opacity-90">
            Kelola iuran, pantau pengeluaran, dan bangun kepercayaan antar anggota kelas dalam satu platform yang terintegrasi.
        </p>
    </div>

    <!-- Login Card -->
    <div class="login-card w-full p-12 flex flex-col items-center">
        <h2 class="text-white font-adlam text-4xl text-center leading-[1.1] mb-12">
            Selamat<br/>
            <span class="tracking-wide">Datang di Kas-ku !</span>
        </h2>

        @if($errors->any())
            <div class="w-full bg-red-500/20 border border-red-500/50 text-red-200 p-3 rounded-xl mb-6 text-xs text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="w-full space-y-6">
            @csrf
            
            <!-- Input NIS -->
            <div class="w-full">
                <input type="text" name="nis" required maxlength="5" value="{{ old('nis') }}"
                    class="w-full input-gray py-4 rounded-2xl text-center font-bold text-lg outline-none focus:ring-2 ring-blue-400 transition-all placeholder:text-gray-600"
                    placeholder="Masukkan NIS">
            </div>

            <!-- Input NISN -->
            <div class="w-full relative">
                <input type="password" name="nisn" id="nisn" required maxlength="10"
                    class="w-full input-gray py-4 rounded-2xl text-center font-bold text-lg outline-none focus:ring-2 ring-blue-400 transition-all placeholder:text-gray-600"
                    placeholder="Masukkan NISN">
                
                <div class="absolute right-6 top-1/2 -translate-y-1/2 cursor-pointer transition-all" onclick="togglePassword()">
                    <div id="eye-container" class="relative flex items-center justify-center">
                        <img src="{{ asset('foto/eye.png') }}" id="eye-img" class="w-6 h-auto opacity-70 hover:opacity-100 transition-opacity">
                        <!-- Garis Coret (\) -->
                        <div id="eye-slash" class="absolute w-[2px] h-6 bg-gray-900 rotate-45 transition-all"></div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                class="w-full btn-blue hover:bg-blue-600 text-white py-5 rounded-2xl font-adlam text-4xl mt-12 transition-all active:scale-95 shadow-xl shadow-blue-600/20">
                Log In
            </button>
        </form>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('nisn');
        const slash = document.getElementById('eye-slash');

        if (input.type === "password") {
            input.type = "text";
            slash.style.display = 'none'; // Sembunyikan coretan saat teks terlihat
        } else {
            input.type = "password";
            slash.style.display = 'block'; // Tampilkan coretan saat teks tersembunyi
        }
    }
</script>
@endsection
