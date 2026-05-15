<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kas-Ku')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('foto/global/Logo.png') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CDN (Fallback) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- CSS via Vite -->
    @vite(['resources/css/app.css'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC !important;
            color: #1E293B !important;
        }
        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 700;
            transition: all 0.3s;
            color: #6B7280;
        }
        .sidebar-item:hover {
            color: #000000;
        }
        .sidebar-active {
            background-color: #D3E3F1 !important;
            color: #1E293B !important;
        }
    </style>
</head>
<body class="flex min-h-screen overflow-x-hidden">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-72 bg-white border-r border-gray-100 flex flex-col justify-between hidden md:flex sticky top-0 h-screen transition-all duration-500 z-50">
        <div>
            <!-- Logo & Expand Button -->
            <div class="px-8 py-10 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('foto/global/Logo.png') }}" alt="Logo" class="w-12 h-12">
                    <span id="sidebar-title" class="text-3xl font-black text-[#0047FF] tracking-tighter">Kas-ku</span>
                </div>
                <!-- Expand/Collapse Button (The half-pill icon in design) -->
                <button onclick="toggleSidebar()" class="w-8 h-8 flex items-center justify-center text-gray-800 hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3a9 9 0 0 0 0 18M12 3v18"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="mt-4 px-6 space-y-3">
                @php
                    $isSiswa = Auth::user()->role == 'Siswa';
                    $dashboardRoute = $isSiswa ? 'siswa.dashboard' : 'bendahara.dashboard';
                    $tentangRoute = $isSiswa ? 'siswa.tentang' : 'bendahara.tentang';
                @endphp

                <a href="{{ route($dashboardRoute) }}" 
                   class="sidebar-item {{ Request::routeIs($dashboardRoute) ? 'sidebar-active shadow-sm' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="text-lg">Dashboard</span>
                </a>

                <a href="{{ route($tentangRoute) }}" 
                   class="sidebar-item {{ Request::routeIs($tentangRoute) ? 'sidebar-active shadow-sm' : '' }}">
                    <div class="w-6 flex justify-center font-bold text-xl"></div>
                    <span class="text-lg">Tentang</span>
                </a>
            </nav>
        </div>

        <!-- Logout Button (Bottom) -->
        <div class="p-8 mb-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-5 text-gray-800 hover:text-red-600 font-bold transition-all w-full group">
                    <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-red-50 text-red-500 group-hover:bg-red-500 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <span class="text-lg">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-h-screen">
        
        <!-- Header -->
        <header class="flex flex-col md:flex-row md:items-center justify-between px-10 md:px-16 py-12 gap-8">
            <div class="relative">
                <h1 class="text-4xl font-black text-gray-900 mb-2 tracking-tight">
                    @yield('header_title', 'Selamat datang, ' . (Auth::user()->nis ?? Auth::user()->id) . ' !')
                </h1>
                <p class="text-gray-400 font-semibold text-xl leading-relaxed">
                    @yield('header_subtitle', Auth::user()->role == 'Siswa' ? 'Ayo mulai rajin membayar Kas kelas mu !' : 'Ringkasan keuangan dan pantau kas hari ini.')
                </p>
            </div>

            <!-- Profile Pill (The one on the right in design) -->
            <div class="flex items-center bg-white border-2 border-gray-100 rounded-full pr-10 pl-2 py-2 shadow-sm h-fit group hover:border-[#0047FF] transition-colors cursor-pointer">
                <div class="w-12 h-12 rounded-full bg-[#0047FF] flex items-center justify-center mr-5 shadow-lg group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-xs font-black text-gray-400 uppercase tracking-widest">Role</span>
                    <span class="text-sm font-black text-gray-900">Terdaftar sebagai <span class="text-[#0047FF]">{{ Auth::user()->role }}</span></span>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="px-10 md:px-16 pb-16">
            @yield('content')
        </main>

    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const title = document.getElementById('sidebar-title');
            if (sidebar.classList.contains('w-72')) {
                sidebar.classList.remove('w-72');
                sidebar.classList.add('w-24');
                title.classList.add('hidden');
            } else {
                sidebar.classList.remove('w-24');
                sidebar.classList.add('w-72');
                title.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
