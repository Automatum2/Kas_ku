@extends('layouts.main')

@section('title', 'Tentang Kas-Ku')

@section('header_title', 'Tentang Kas-ku')
@section('header_subtitle', 'Membangun Budaya Jujur dari Kelas')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Image Gallery -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16">
        <div class="rounded-[2.5rem] overflow-hidden shadow-2xl h-[400px] border-4 border-white">
            <img src="{{ asset('foto/tentang/bayar kas 2.png') }}" alt="Tentang 1" class="w-full h-full object-cover">
        </div>
        <div class="rounded-[2.5rem] overflow-hidden shadow-2xl h-[400px] border-4 border-white">
            <img src="{{ asset('foto/tentang/bayar qris 2.png') }}" alt="Tentang 2" class="w-full h-full object-cover">
        </div>
    </div>

    <!-- Description Text -->
    <div class="space-y-12 text-center px-4 md:px-20">
        <div class="space-y-6">
            <p class="text-2xl font-black text-gray-900 leading-tight">
                Transparansi Mutlak: Menghilangkan keraguan anggota kelas dengan pencatatan pengeluaran yang bisa dilihat siapa saja dan kapan saja.
            </p>
            <p class="text-2xl font-black text-gray-900 leading-tight">
                Efisiensi Bendahara: Membantu bendahara mengelola tunggakan secara otomatis tanpa perlu mencatat manual di buku yang rawan hilang.
            </p>
            <p class="text-2xl font-black text-gray-900 leading-tight">
                Kedisiplinan Siswa: Sistem pengingat yang membantu siswa untuk lebih tepat waktu dalam mendukung pendanaan kegiatan kelas.
            </p>
        </div>

        <div class="pt-8">
            <p class="text-3xl font-black text-gray-900 leading-snug">
                Kas-Ku hadir sebagai solusi digital untuk mengatasi masalah klasik pendidikan: pengelolaan dana yang tidak transparan. Kami percaya, kejujuran dimulai dari hal kecil seperti uang kas.
            </p>
        </div>
    </div>
</div>
@endsection
