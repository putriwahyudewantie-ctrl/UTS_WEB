<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Perpustakaan') - UTS Pemrograman Web III</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col selection:bg-indigo-500 selection:text-white">

    <!-- Navigation Header -->
    <header class="bg-slate-800/80 backdrop-blur-md border-b border-slate-700/60 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="p-2.5 bg-gradient-to-tr from-indigo-600 to-violet-500 rounded-xl shadow-lg shadow-indigo-500/20 group-hover:scale-105 transition-transform duration-200">
                            <i data-lucide="book-open-check" class="w-6 h-6 text-white"></i>
                        </div>
                        <div>
                            <span class="text-lg font-bold bg-gradient-to-r from-white via-slate-200 to-indigo-200 bg-clip-text text-transparent">PustakaKita</span>
                            <span class="block text-[10px] text-slate-400 font-medium tracking-wider uppercase">UTS Web III</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-150 flex items-center space-x-2 {{ request()->routeIs('dashboard') ? 'bg-indigo-600/20 text-indigo-400 border border-indigo-500/30' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('books.index') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-150 flex items-center space-x-2 {{ request()->routeIs('books.*') ? 'bg-indigo-600/20 text-indigo-400 border border-indigo-500/30' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <i data-lucide="book-marked" class="w-4 h-4"></i>
                        <span>Kelola Buku</span>
                    </a>
                    <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-150 flex items-center space-x-2 {{ request()->routeIs('categories.*') ? 'bg-indigo-600/20 text-indigo-400 border border-indigo-500/30' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <i data-lucide="folder-tree" class="w-4 h-4"></i>
                        <span>Kategori</span>
                    </a>
                </nav>

                <!-- User Profile & Logout -->
                <div class="flex items-center space-x-4">
                    <div class="hidden sm:flex flex-col text-right">
                        <span class="text-sm font-bold text-white">{{ Auth::user()->name }}</span>
                        <span class="text-xs text-slate-400">{{ Auth::user()->email }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3.5 py-2 text-xs font-semibold text-rose-300 bg-rose-500/10 border border-rose-500/20 hover:bg-rose-500/20 hover:border-rose-500/40 rounded-lg transition-all duration-200 flex items-center space-x-1.5 shadow-sm">
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
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 rounded-xl shadow-lg flex items-center justify-between animate-fade-in">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-emerald-500/20 rounded-lg">
                        <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400"></i>
                    </div>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-200">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/30 text-rose-300 rounded-xl shadow-lg flex items-center justify-between animate-fade-in">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-rose-500/20 rounded-lg">
                        <i data-lucide="alert-triangle" class="w-5 h-5 text-rose-400"></i>
                    </div>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-rose-400 hover:text-rose-200">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-950/80 border-t border-slate-800 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
            <div>
                <p>&copy; {{ date('Y') }} Sistem Manajemen Perpustakaan Buku - UTS Pemrograman Web III.</p>
                <p class="text-slate-400 font-medium mt-0.5">Nama: Putri Wahyu Dewantie | NIM: 09010282529044</p>
            </div>
            <div class="flex items-center space-x-4">
                <span class="px-2.5 py-1 bg-slate-800 rounded border border-slate-700 text-slate-300 font-mono">Laravel {{ app()->version() }}</span>
                <span class="px-2.5 py-1 bg-indigo-950/60 border border-indigo-800 text-indigo-300 rounded font-mono">PHP {{ PHP_VERSION }}</span>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
