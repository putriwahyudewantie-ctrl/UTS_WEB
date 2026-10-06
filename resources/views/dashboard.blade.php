@extends('layouts.app')

@section('title', 'Dashboard Perpustakaan')

@section('content')
<div class="space-y-8">
    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-burgundy-card via-burgundy to-burgundy-dark border border-dustypink/30 rounded-3xl p-8 relative overflow-hidden shadow-2xl">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-dustypink/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-dustypink/20 border border-dustypink/40 text-dustypink mb-3">
                    <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Selamat Datang Kembali
                </span>
                <h1 class="text-3xl font-extrabold text-creme tracking-tight">Halo, {{ Auth::user()->name }} 👋</h1>
                <p class="text-sand text-sm mt-1 max-w-xl">Selamat datang di Panel Manajemen Perpustakaan. Kelola koleksi buku, kategori, dan stok buku dengan mudah dan efisien.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('books.create') }}" class="px-4 py-2.5 bg-dustypink hover:bg-sand text-burgundy-dark text-sm font-bold rounded-xl shadow-lg shadow-dustypink/20 transition-all duration-200 flex items-center gap-2">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Tambah Buku</span>
                </a>
                <a href="{{ route('books.index') }}" class="px-4 py-2.5 bg-burgundy-dark hover:bg-burgundy text-creme text-sm font-semibold rounded-xl border border-dustypink/30 transition-all duration-200 flex items-center gap-2">
                    <i data-lucide="book-open" class="w-4 h-4"></i>
                    <span>Daftar Buku</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stat Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1: Total Buku -->
        <div class="bg-burgundy-card border border-burgundy-light/60 rounded-2xl p-6 shadow-xl relative overflow-hidden group hover:border-dustypink/60 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-sand uppercase tracking-wider">Total Judul Buku</p>
                    <h3 class="text-3xl font-black text-creme mt-2">{{ $totalBooks }}</h3>
                    <p class="text-xs text-dustypink mt-1 flex items-center gap-1">
                        <i data-lucide="check-circle" class="w-3.5 h-3.5"></i> Terdaftar di Database
                    </p>
                </div>
                <div class="w-14 h-14 bg-dustypink/20 border border-dustypink/30 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="book" class="w-7 h-7 text-dustypink"></i>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Kategori -->
        <div class="bg-burgundy-card border border-burgundy-light/60 rounded-2xl p-6 shadow-xl relative overflow-hidden group hover:border-sand/60 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-sand uppercase tracking-wider">Kategori Buku</p>
                    <h3 class="text-3xl font-black text-creme mt-2">{{ $totalCategories }}</h3>
                    <p class="text-xs text-sand mt-1 flex items-center gap-1">
                        <i data-lucide="layers" class="w-3.5 h-3.5"></i> Klasifikasi Aktif
                    </p>
                </div>
                <div class="w-14 h-14 bg-sand/20 border border-sand/30 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="folder-tree" class="w-7 h-7 text-sand"></i>
                </div>
            </div>
        </div>

        <!-- Card 3: Total Stok -->
        <div class="bg-burgundy-card border border-burgundy-light/60 rounded-2xl p-6 shadow-xl relative overflow-hidden group hover:border-creme/60 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-sand uppercase tracking-wider">Total Eksemplar (Stok)</p>
                    <h3 class="text-3xl font-black text-creme mt-2">{{ $totalStock }}</h3>
                    <p class="text-xs text-creme mt-1 flex items-center gap-1">
                        <i data-lucide="boxes" class="w-3.5 h-3.5"></i> Fisik Buku Tersedia
                    </p>
                </div>
                <div class="w-14 h-14 bg-creme/20 border border-creme/30 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="archive" class="w-7 h-7 text-creme"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Books Table -->
    <div class="bg-burgundy-card/90 border border-burgundy-light/60 rounded-2xl shadow-xl overflow-hidden">
        <div class="p-6 border-b border-burgundy-light/60 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-dustypink/20 rounded-lg text-dustypink">
                    <i data-lucide="clock" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-creme">Koleksi Buku Terbaru</h2>
                    <p class="text-xs text-sand">5 data buku yang terakhir ditambahkan</p>
                </div>
            </div>
            <a href="{{ route('books.index') }}" class="text-xs font-semibold text-dustypink hover:text-creme flex items-center gap-1">
                <span>Lihat Semua</span>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-sand">
                <thead class="bg-burgundy-dark/80 text-xs uppercase font-semibold text-dustypink border-b border-burgundy-light/60">
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
                <tbody class="divide-y divide-burgundy-light/40">
                    @forelse($latestBooks as $book)
                        <tr class="hover:bg-burgundy-light/30 transition-colors">
                            <td class="px-6 py-4 font-bold text-creme flex items-center gap-2">
                                <i data-lucide="book-open" class="w-4 h-4 text-dustypink flex-shrink-0"></i>
                                <span>{{ $book->title }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-dustypink/20 border border-dustypink/40 text-creme">
                                    {{ $book->category->name ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sand">{{ $book->author }}</td>
                            <td class="px-6 py-4 text-sand/80">{{ $book->publisher }}</td>
                            <td class="px-6 py-4 text-center font-mono text-creme">{{ $book->year }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-mono font-bold bg-dustypink/20 text-creme border border-dustypink/30">
                                    {{ $book->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('books.show', $book->id) }}" class="p-2 text-dustypink hover:text-creme hover:bg-dustypink/30 rounded-lg inline-block transition-colors" title="Detail Buku">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-sand">
                                Belum ada data buku. <a href="{{ route('books.create') }}" class="text-dustypink underline">Tambah Buku Pertama</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
