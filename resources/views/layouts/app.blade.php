<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Perpustakaan') - UTS Pemrograman Web III</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        creme: '#EEE4DA',
                        sand: '#D8C4AC',
                        dustypink: '#C8A49F',
                        burgundy: {
                            DEFAULT: '#4D0E13',
                            dark: '#2A0609',
                            card: '#3D0B0F',
                            light: '#6B1B21',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Font Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #2A0609;
            color: #EEE4DA;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col selection:bg-dustypink selection:text-burgundy-dark">

    <!-- Navigation Header -->
    <header class="bg-burgundy/90 backdrop-blur-md border-b border-burgundy-light/60 sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="p-2.5 bg-gradient-to-tr from-dustypink to-sand rounded-xl shadow-lg shadow-dustypink/20 group-hover:scale-105 transition-transform duration-200">
                            <i data-lucide="book-open-check" class="w-6 h-6 text-burgundy-dark"></i>
                        </div>
                        <div>
                            <span class="text-lg font-bold text-creme">PustakaKita</span>
                            <span class="block text-[10px] text-sand font-medium tracking-wider uppercase">UTS Web III</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-150 flex items-center space-x-2 {{ request()->routeIs('dashboard') ? 'bg-dustypink/20 text-dustypink border border-dustypink/40' : 'text-sand hover:bg-burgundy-card hover:text-creme' }}">
                        <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('books.index') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-150 flex items-center space-x-2 {{ request()->routeIs('books.*') ? 'bg-dustypink/20 text-dustypink border border-dustypink/40' : 'text-sand hover:bg-burgundy-card hover:text-creme' }}">
                        <i data-lucide="book-marked" class="w-4 h-4"></i>
                        <span>Kelola Buku</span>
                    </a>
                    <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-150 flex items-center space-x-2 {{ request()->routeIs('categories.*') ? 'bg-dustypink/20 text-dustypink border border-dustypink/40' : 'text-sand hover:bg-burgundy-card hover:text-creme' }}">
                        <i data-lucide="folder-tree" class="w-4 h-4"></i>
                        <span>Kategori</span>
                    </a>
                </nav>

                <!-- User Profile & Logout -->
                <div class="flex items-center space-x-4">
                    <div class="hidden sm:flex flex-col text-right">
                        <span class="text-sm font-bold text-creme">{{ Auth::user()->name }}</span>
                        <span class="text-xs text-sand">{{ Auth::user()->email }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3.5 py-2 text-xs font-semibold text-creme bg-burgundy-light/40 border border-dustypink/30 hover:bg-dustypink hover:text-burgundy-dark rounded-lg transition-all duration-200 flex items-center space-x-1.5 shadow-sm">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Flash Alert Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-950/60 border border-emerald-500/40 text-emerald-200 rounded-xl shadow-lg flex items-center justify-between animate-fade-in">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-emerald-500/20 rounded-lg">
                        <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-300"></i>
                    </div>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-300 hover:text-emerald-100">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-950/60 border border-rose-500/40 text-rose-200 rounded-xl shadow-lg flex items-center justify-between animate-fade-in">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-rose-500/20 rounded-lg">
                        <i data-lucide="alert-triangle" class="w-5 h-5 text-rose-300"></i>
                    </div>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-rose-300 hover:text-rose-100">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-burgundy-dark border-t border-burgundy-light/40 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between text-xs text-sand gap-4">
            <div>
                <p>&copy; {{ date('Y') }} Sistem Manajemen Perpustakaan Buku - UTS Pemrograman Web III.</p>
                <p class="text-creme font-medium mt-0.5">Nama: Putri Wahyu Dewantie | NIM: 09010282529044</p>
            </div>
            <div class="flex items-center space-x-4">
                <span class="px-2.5 py-1 bg-burgundy-card rounded border border-burgundy-light text-creme font-mono">Laravel {{ app()->version() }}</span>
                <span class="px-2.5 py-1 bg-burgundy-card border border-dustypink/30 text-sand rounded font-mono">PHP {{ PHP_VERSION }}</span>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
