<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kas-Ku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0B0E14;
        }
        .login-card {
            background: #151921;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .input-field {
            background: #1C212C;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }
        .input-field:focus {
            border-color: #3B82F6;
            background: #232936;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">

    <div class="login-card p-10 rounded-[32px] shadow-2xl w-full max-w-[440px]">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-white mb-2">Kas-Ku</h1>
            <p class="text-slate-400 text-sm">Masuk untuk mengelola keuangan kelas Anda dengan mudah.</p>
        </div>
        
        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/50 text-red-400 p-4 rounded-xl mb-6 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label for="nis" class="block text-sm font-medium text-slate-300">Nomor Induk Siswa (5 Digit)</label>
                <input type="text" name="nis" id="nis" required maxlength="5"
                    class="input-field w-full px-5 py-3.5 rounded-2xl outline-none transition-all placeholder:text-slate-600"
                    placeholder="Contoh: 12345">
            </div>

            <div class="space-y-2">
                <label for="nisn" class="block text-sm font-medium text-slate-300">NISN (10 Digit)</label>
                <input type="text" name="nisn" id="nisn" required maxlength="10"
                    class="input-field w-full px-5 py-3.5 rounded-2xl outline-none transition-all placeholder:text-slate-600"
                    placeholder="Contoh: 1234567890">
            </div>
            
            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-500 text-white py-4 rounded-2xl font-bold text-lg transition-all shadow-lg shadow-blue-600/20 active:scale-[0.98] mt-4">
                Masuk Sekarang
            </button>
        </form>

        <div class="mt-10 pt-6 border-t border-white/5 text-center">
            <p class="text-slate-500 text-xs">Sistem Transparansi Kas-Ku &copy; 2025</p>
            <p class="text-slate-600 text-[10px] mt-1 uppercase tracking-widest">SMKN 1 Denpasar - Kelompok 11</p>
        </div>
    </div>

</body>
</html>
