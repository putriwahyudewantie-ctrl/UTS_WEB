@extends('layouts.app')

@section('title', 'Daftar Buku Perpustakaan')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-creme flex items-center gap-3">
                <i data-lucide="book-marked" class="w-7 h-7 text-dustypink"></i>
                <span>Kelola Data Buku</span>
            </h1>
            <p class="text-xs text-sand mt-1">Daftar seluruh koleksi buku perpustakaan yang terdaftar</p>
        </div>
        <a href="{{ route('books.create') }}" 
           class="px-4 py-2.5 bg-dustypink hover:bg-sand text-burgundy-dark text-sm font-bold rounded-xl shadow-lg shadow-dustypink/20 transition-all duration-200 flex items-center justify-center space-x-2">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Tambah Buku Baru</span>
        </a>
    </div>

    <!-- Search & Filter Card (Fitur Bonus UTS - 5 Poin) -->
    <div class="bg-burgundy-card/90 border border-burgundy-light/60 rounded-2xl p-5 shadow-xl">
        <form action="{{ route('books.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
            <!-- Search Input -->
            <div class="md:col-span-6">
                <label for="search" class="block text-xs font-semibold text-sand mb-1">Cari Judul / Penulis Buku</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-sand">
                        <i data-lucide="search" class="w-4 h-4"></i>
                    </span>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" 
                           placeholder="Ketik judul buku atau nama penulis..." 
                           class="w-full pl-10 pr-4 py-2 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme placeholder:text-sand/50 focus:outline-none focus:border-dustypink focus:ring-1 focus:ring-dustypink">
                </div>
            </div>

            <!-- Category Filter -->
            <div class="md:col-span-4">
                <label for="category_id" class="block text-xs font-semibold text-sand mb-1">Filter Kategori</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-sand">
                        <i data-lucide="filter" class="w-4 h-4"></i>
                    </span>
                    <select name="category_id" id="category_id" 
                            class="w-full pl-10 pr-4 py-2 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme focus:outline-none focus:border-dustypink focus:ring-1 focus:ring-dustypink">
                        <option value="">-- Semua Kategori --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Filter Action Buttons -->
            <div class="md:col-span-2 flex items-center gap-2">
                <button type="submit" class="w-full py-2 px-3 bg-dustypink hover:bg-sand text-burgundy-dark font-bold text-xs rounded-xl shadow transition-colors flex items-center justify-center space-x-1">
                    <i data-lucide="search" class="w-3.5 h-3.5"></i>
                    <span>Cari</span>
                </button>
                @if(request()->hasAny(['search', 'category_id']))
                    <a href="{{ route('books.index') }}" class="p-2 bg-burgundy-dark hover:bg-burgundy text-sand rounded-xl border border-burgundy-light transition-colors" title="Reset Filter">
                        <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Book Table Card -->
    <div class="bg-burgundy-card/90 border border-burgundy-light/60 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-sand">
                <thead class="bg-burgundy-dark/90 text-xs uppercase font-semibold text-dustypink border-b border-burgundy-light/60">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Judul Buku</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Penulis</th>
                        <th class="px-6 py-4">Penerbit</th>
                        <th class="px-6 py-4 text-center">Tahun</th>
                        <th class="px-6 py-4 text-center">Stok</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-burgundy-light/40">
                    @forelse($books as $index => $book)
                        <tr class="hover:bg-burgundy-light/30 transition-colors">
                            <td class="px-6 py-4 text-xs font-mono text-sand">
                                {{ $books->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-4 font-bold text-creme">
                                {{ $book->title }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-dustypink/20 border border-dustypink/40 text-creme">
                                    {{ $book->category->name ?? 'Uncategorized' }}
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
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center space-x-1">
                                    <!-- Detail Button -->
                                    <a href="{{ route('books.show', $book->id) }}" 
                                       class="p-2 text-dustypink hover:text-creme hover:bg-dustypink/30 rounded-lg transition-colors" title="Lihat Detail">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Edit Button -->
                                    <a href="{{ route('books.edit', $book->id) }}" 
                                       class="p-2 text-sand hover:text-creme hover:bg-sand/30 rounded-lg transition-colors" title="Edit Buku">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Delete Button with Form -->
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku {{ addslashes($book->title) }}?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-rose-300 hover:text-white hover:bg-rose-600/30 rounded-lg transition-colors" title="Hapus Buku">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-sand">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <i data-lucide="book-x" class="w-10 h-10 text-sand/40"></i>
                                    <p class="text-sm font-medium">Tidak ada data buku yang ditemukan.</p>
                                    @if(request()->hasAny(['search', 'category_id']))
                                        <a href="{{ route('books.index') }}" class="text-xs text-dustypink underline">Bersihkan Filter Pencarian</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($books->hasPages())
            <div class="p-4 border-t border-burgundy-light/60 bg-burgundy-dark/40">
                {{ $books->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
