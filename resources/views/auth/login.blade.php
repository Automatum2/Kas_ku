@extends('layouts.auth')

@section('title', 'Login - Kas-Ku')

@section('content')
<div class="flex w-full h-screen overflow-hidden font-sans">
    
    <div class="hidden md:flex w-1/2 bg-cover bg-center items-center justify-center p-12" 
         style="background-image: url('{{ asset('foto/background2.png') }}');"> <div class="bg-white p-12 w-full max-w-lg shadow-2xl rounded-sm">
            <img src="{{ asset('foto/Logo.png') }}" alt="Logo" class="w-16 mb-4">
            
            <h2 class="text-gray-700 italic text-xl leading-tight">
                "Kelola Kas Kelas Lebih Transparan"
            </h2>
            <p class="text-gray-500 text-sm mb-32">Didirikan pada 16 April 2026</p>

            <div class="mt-auto">
                <p class="text-gray-800 font-semibold mb-1">Solusi finansial untuk kelas XI RPL 2</p>
                <h1 class="text-6xl font-bold text-[#003d82]">Kas-ku</h1>
            </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 bg-white flex flex-col items-center justify-center px-8 md:px-24">
        <div class="w-full max-w-md text-center">
            
            <div class="flex items-center justify-center gap-3 mb-6">
                <img src="{{ asset('foto/Logo.png') }}" alt="Logo" class="w-12 h-auto">
                <span class="text-3xl font-bold text-[#003d82]">Kas-ku</span>
            </div>

            <h3 class="text-2xl font-bold text-gray-800 mb-8 uppercase tracking-tight">Log In ke akun anda</h3>

            @if($errors->any())
                <div class="w-full bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-lg mb-6 text-sm text-center italic">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                
                <div class="text-left">
                    <input type="text" name="nis" required maxlength="5" value="{{ old('nis') }}"
                        class="w-full px-4 py-4 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-800 transition-all placeholder:text-gray-400"
                        placeholder="Masukkan NIS">
                </div>

                <div class="text-left relative">
                    <input type="password" name="nisn" id="nisn" required maxlength="10"
                        class="w-full px-4 py-4 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-800 transition-all placeholder:text-gray-400"
                        placeholder="Masukkan NISN">
                    
                    <div class="absolute inset-y-0 right-4 flex items-center cursor-pointer" onclick="togglePassword()">
                        <div id="eye-container" class="relative flex items-center justify-center">
                            <img src="{{ asset('foto/eye.png') }}" id="eye-img" class="w-6 opacity-50 hover:opacity-100 transition-opacity">
                            <div id="eye-slash" class="absolute w-[2px] h-6 bg-gray-800 rotate-45 transition-all" style="display: block;"></div>
                        </div>
                    </div>
                </div>

                <button type="submit" 
                    class="w-full bg-[#003d82] hover:bg-blue-900 text-white font-bold py-4 px-4 rounded shadow-md transition duration-300 uppercase tracking-widest text-sm mt-4">
                    Lanjutkan
                </button>
            </form>
        </div>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('nisn');
        const slash = document.getElementById('eye-slash');

        if (input.type === "password") {
            input.type = "text";
            slash.style.display = 'none';
        } else {
            input.type = "password";
            slash.style.display = 'block';
        }
    }
</script>
@endsection