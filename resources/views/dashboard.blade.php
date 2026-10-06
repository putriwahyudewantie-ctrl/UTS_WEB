@extends('layouts.app')

@section('title', 'Dashboard Utama Perpustakaan')

@section('content')
<div class="space-y-8">
    <!-- Hero Banner dengan Gradasi Modern Glowing -->
    <div class="bg-gradient-to-r from-indigo-900/90 via-purple-900/70 to-slate-900 border border-indigo-500/30 rounded-3xl p-8 relative overflow-hidden shadow-2xl">
        <div class="absolute -right-10 -bottom-10 w-72 h-72 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-10 -top-10 w-72 h-72 bg-purple-500/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold bg-indigo-500/20 border border-indigo-400/40 text-indigo-300 mb-3 backdrop-blur-md">
                    <i data-lucide="sparkles" class="w-3.5 h-3.5 text-indigo-300"></i> Dashboard Utama
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-white tracking-tight">Halo, {{ Auth::user()->name }} 👋</h1>
                <p class="text-slate-300 text-sm mt-1.5 max-w-xl leading-relaxed">Selamat datang di Sistem Pengelolaan Data Perpustakaan. Kelola data buku, kategori, dan pemantauan stok secara efisien.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('books.create') }}" class="px-5 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white text-sm font-bold rounded-2xl shadow-xl shadow-indigo-600/30 transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Tambah Buku</span>
                </a>
                <a href="{{ route('books.index') }}" class="px-5 py-3 bg-slate-800/80 hover:bg-slate-700 text-slate-200 text-sm font-semibold rounded-2xl border border-slate-700 transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="book-open" class="w-4 h-4 text-indigo-400"></i>
                    <span>Daftar Buku</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stat Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1: Total Buku -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl p-6 shadow-xl relative overflow-hidden group hover:border-indigo-500/50 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Judul Buku</p>
                    <h3 class="text-3xl font-black text-white mt-2">{{ $totalBooks }}</h3>
                    <p class="text-xs text-indigo-400 mt-1 flex items-center gap-1">
                        <i data-lucide="check-circle" class="w-3.5 h-3.5"></i> Terdaftar di Database
                    </p>
                </div>
                <div class="w-14 h-14 bg-indigo-500/10 border border-indigo-500/20 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="book" class="w-7 h-7 text-indigo-400"></i>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Kategori -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl p-6 shadow-xl relative overflow-hidden group hover:border-purple-500/50 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Kategori Buku</p>
                    <h3 class="text-3xl font-black text-white mt-2">{{ $totalCategories }}</h3>
                    <p class="text-xs text-purple-400 mt-1 flex items-center gap-1">
                        <i data-lucide="layers" class="w-3.5 h-3.5"></i> Klasifikasi Aktif
                    </p>
                </div>
                <div class="w-14 h-14 bg-purple-500/10 border border-purple-500/20 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="folder-tree" class="w-7 h-7 text-purple-400"></i>
                </div>
            </div>
        </div>

        <!-- Card 3: Total Stok -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl p-6 shadow-xl relative overflow-hidden group hover:border-emerald-500/50 transition-all duration-300 sm:col-span-2 lg:col-span-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Eksemplar (Stok)</p>
                    <h3 class="text-3xl font-black text-white mt-2">{{ $totalStock }}</h3>
                    <p class="text-xs text-emerald-400 mt-1 flex items-center gap-1">
                        <i data-lucide="boxes" class="w-3.5 h-3.5"></i> Fisik Buku Tersedia
                    </p>
                </div>
                <div class="w-14 h-14 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="archive" class="w-7 h-7 text-emerald-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Books Table -->
    <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl shadow-xl overflow-hidden">
        <div class="p-6 border-b border-slate-800 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2.5 bg-indigo-500/10 rounded-xl text-indigo-400 border border-indigo-500/20">
                    <i data-lucide="clock" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-white">Koleksi Buku Terbaru</h2>
                    <p class="text-xs text-slate-400">5 data buku yang terakhir ditambahkan</p>
                </div>
            </div>
            <a href="{{ route('books.index') }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 flex items-center gap-1">
                <span>Lihat Semua</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-slate-950/60 text-xs uppercase font-semibold text-slate-400 border-b border-slate-800">
                    <tr>
                        <th class="px-6 py-4">Judul Buku</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Penulis</th>
                        <th class="px-6 py-4">Penerbit</th>
                        <th class="px-6 py-4 text-center">Tahun</th>
                        <th class="px-6 py-4 text-center">Stok</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($latestBooks as $book)
                        <tr class="hover:bg-slate-800/40 transition-colors">
                            <td class="px-6 py-4 font-bold text-white flex items-center gap-2">
                                <i data-lucide="book-open" class="w-4 h-4 text-indigo-400 flex-shrink-0"></i>
                                <span>{{ $book->title }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 border border-indigo-500/30 text-indigo-300">
                                    {{ $book->category->name ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-300">{{ $book->author }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $book->publisher }}</td>
                            <td class="px-6 py-4 text-center font-mono text-white">{{ $book->year }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-mono font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                    {{ $book->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('books.show', $book->id) }}" class="p-2 text-indigo-400 hover:text-white hover:bg-indigo-600/30 rounded-xl inline-block transition-colors" title="Detail Buku">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-slate-500">
                                Belum ada data buku. <a href="{{ route('books.create') }}" class="text-indigo-400 underline">Tambah Buku Pertama</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
