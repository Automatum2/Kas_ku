<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kas-Ku')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('foto/Logo.png') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS via Vite -->
    @vite(['resources/css/app.css'])
</head>
<body class="flex items-center justify-center p-4" style="background-image: url('{{ asset('foto/background.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 100vh;">
    @yield('content')
</body>
</html>
