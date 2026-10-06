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
<body class="bg-gradient-to-br from-slate-950 via-stone-900 to-amber-950 text-stone-100 min-h-screen flex flex-col selection:bg-amber-500 selection:text-slate-950">

    <!-- Navigation Header -->
    <header class="bg-stone-900/90 backdrop-blur-xl border-b border-amber-900/40 sticky top-0 z-50 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="p-2.5 bg-gradient-to-tr from-amber-600 via-amber-500 to-yellow-400 rounded-xl shadow-lg shadow-amber-500/25 group-hover:scale-105 transition-all duration-300">
                            <i data-lucide="book-open-check" class="w-6 h-6 text-slate-950"></i>
                        </div>
                        <div>
                            <span class="text-lg font-extrabold bg-gradient-to-r from-amber-100 via-amber-200 to-yellow-300 bg-clip-text text-transparent">PustakaKita</span>
                            <span class="block text-[10px] text-amber-400/80 font-medium tracking-wider uppercase">UTS Web III Perpustakaan</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                @auth
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center space-x-2 {{ request()->routeIs('dashboard') ? 'bg-amber-500/20 text-amber-300 border border-amber-500/40 shadow-inner' : 'text-stone-300 hover:bg-stone-800/80 hover:text-white' }}">
                        <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('books.index') }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center space-x-2 {{ request()->routeIs('books.*') ? 'bg-amber-500/20 text-amber-300 border border-amber-500/40 shadow-inner' : 'text-stone-300 hover:bg-stone-800/80 hover:text-white' }}">
                        <i data-lucide="book-marked" class="w-4 h-4"></i>
                        <span>Kelola Buku</span>
                    </a>
                    <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center space-x-2 {{ request()->routeIs('categories.*') ? 'bg-amber-500/20 text-amber-300 border border-amber-500/40 shadow-inner' : 'text-stone-300 hover:bg-stone-800/80 hover:text-white' }}">
                        <i data-lucide="folder-tree" class="w-4 h-4"></i>
                        <span>Kategori</span>
                    </a>
                </nav>

                <!-- Right Profile & Mobile Toggle -->
                <div class="flex items-center space-x-3">
                    <div class="hidden sm:flex flex-col text-right">
                        <span class="text-sm font-bold text-amber-100">{{ Auth::user()->name }}</span>
                        <span class="text-xs text-amber-400/70">{{ Auth::user()->email }}</span>
                    </div>
                    
                    <!-- Logout Button Desktop -->
                    <form action="{{ route('logout') }}" method="POST" class="hidden sm:block">
                        @csrf
                        <button type="submit" class="px-3.5 py-2 text-xs font-semibold text-amber-200 bg-amber-500/10 border border-amber-500/30 hover:bg-amber-500 hover:text-slate-950 rounded-xl transition-all duration-200 flex items-center space-x-1.5 shadow-sm">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span>Keluar</span>
                        </button>
                    </form>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden p-2 rounded-xl text-stone-300 hover:text-white hover:bg-stone-800 focus:outline-none">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
                @endauth
            </div>
        </div>

        <!-- Mobile Navigation Menu Dropdown -->
        @auth
        <div id="mobile-menu" class="hidden md:hidden border-t border-amber-900/40 bg-stone-900/95 px-4 pt-3 pb-4 space-y-2">
            <div class="px-3 py-2 border-b border-stone-800 mb-2">
                <p class="text-sm font-bold text-amber-100">{{ Auth::user()->name }}</p>
                <p class="text-xs text-amber-400/80">{{ Auth::user()->email }}</p>
            </div>
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('dashboard') ? 'bg-amber-500/20 text-amber-300' : 'text-stone-300' }}">
                Dashboard
            </a>
            <a href="{{ route('books.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('books.*') ? 'bg-amber-500/20 text-amber-300' : 'text-stone-300' }}">
                Kelola Buku
            </a>
            <a href="{{ route('categories.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('categories.*') ? 'bg-amber-500/20 text-amber-300' : 'text-stone-300' }}">
                Kategori
            </a>
            <form action="{{ route('logout') }}" method="POST" class="pt-2">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2 text-sm font-semibold text-amber-300 hover:bg-amber-500/20 rounded-lg">
                    Keluar (Logout)
                </button>
            </form>
        </div>
        @endauth
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Flash Alert Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-950/60 border border-emerald-500/40 text-emerald-200 rounded-2xl shadow-xl flex items-center justify-between animate-fade-in">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-emerald-500/20 rounded-xl">
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
            <div class="mb-6 p-4 bg-rose-950/60 border border-rose-500/40 text-rose-200 rounded-2xl shadow-xl flex items-center justify-between animate-fade-in">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-rose-500/20 rounded-xl">
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

    <!-- Clean Footer -->
    <footer class="bg-stone-950 border-t border-amber-900/40 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between text-xs text-stone-400 gap-3">
            <div>
                <p>&copy; {{ date('Y') }} Sistem Manajemen Perpustakaan Buku - UTS Pemrograman Web III</p>
                <p class="text-amber-300/90 font-semibold mt-0.5">Nama: Putri Wahyu Dewantie | NIM: 09010282529044</p>
            </div>
            <div class="text-stone-500 text-right">
                <span>Fakultas Ilmu Komputer - Universitas Sriwijaya</span>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();

        // Mobile Menu Toggle JS
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
