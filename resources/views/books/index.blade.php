@extends('layouts.app')

@section('title', 'Daftar Buku Perpustakaan')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black text-amber-100 flex items-center gap-3 tracking-tight">
                <i data-lucide="book-marked" class="w-8 h-8 text-amber-400"></i>
                <span>Kelola Data Buku</span>
            </h1>
            <p class="text-xs sm:text-sm text-stone-400 mt-1">Daftar seluruh koleksi buku perpustakaan yang terdaftar</p>
        </div>
        <a href="{{ route('books.create') }}" 
           class="px-5 py-3 bg-gradient-to-r from-amber-500 via-amber-600 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-slate-950 text-sm font-bold rounded-2xl shadow-xl shadow-amber-500/20 transition-all duration-300 flex items-center justify-center space-x-2">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Tambah Buku Baru</span>
        </a>
    </div>

    <!-- Search & Filter Card (Fitur Bonus UTS - 5 Poin) -->
    <div class="bg-stone-900/80 backdrop-blur-xl border border-stone-800 rounded-3xl p-5 shadow-xl">
        <form action="{{ route('books.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
            <!-- Search Input -->
            <div class="md:col-span-6">
                <label for="search" class="block text-xs font-semibold text-stone-300 mb-1.5">Cari Judul / Penulis Buku</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                        <i data-lucide="search" class="w-4 h-4"></i>
                    </span>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" 
                           placeholder="Ketik judul buku atau nama penulis..." 
                           class="w-full pl-10 pr-4 py-2.5 bg-stone-950/70 border border-stone-800 rounded-xl text-sm text-stone-100 placeholder:text-stone-600 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all">
                </div>
            </div>

            <!-- Category Filter -->
            <div class="md:col-span-4">
                <label for="category_id" class="block text-xs font-semibold text-stone-300 mb-1.5">Filter Kategori</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                        <i data-lucide="filter" class="w-4 h-4"></i>
                    </span>
                    <select name="category_id" id="category_id" 
                            class="w-full pl-10 pr-4 py-2.5 bg-stone-950/70 border border-stone-800 rounded-xl text-sm text-stone-100 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all">
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
                <button type="submit" class="w-full py-2.5 px-4 bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs rounded-xl shadow-lg transition-colors flex items-center justify-center space-x-1.5">
                    <i data-lucide="search" class="w-4 h-4"></i>
                    <span>Cari</span>
                </button>
                @if(request()->hasAny(['search', 'category_id']))
                    <a href="{{ route('books.index') }}" class="p-2.5 bg-stone-800 hover:bg-stone-700 text-stone-300 rounded-xl border border-stone-700 transition-colors" title="Reset Filter">
                        <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Book Table Card -->
    <div class="bg-stone-900/80 backdrop-blur-xl border border-stone-800 rounded-3xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-stone-300">
                <thead class="bg-stone-950/70 text-xs uppercase font-semibold text-amber-300 border-b border-stone-800">
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
                <tbody class="divide-y divide-stone-800/60">
                    @forelse($books as $index => $book)
                        <tr class="hover:bg-stone-800/40 transition-colors">
                            <td class="px-6 py-4 text-xs font-mono text-stone-400">
                                {{ $books->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-4 font-bold text-amber-100">
                                {{ $book->title }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/10 border border-amber-500/30 text-amber-300">
                                    {{ $book->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-stone-300">{{ $book->author }}</td>
                            <td class="px-6 py-4 text-stone-400">{{ $book->publisher }}</td>
                            <td class="px-6 py-4 text-center font-mono text-amber-100">{{ $book->year }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-mono font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                    {{ $book->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center space-x-1">
                                    <!-- Detail Button -->
                                    <a href="{{ route('books.show', $book->id) }}" 
                                       class="p-2 text-amber-400 hover:text-white hover:bg-amber-500/20 rounded-xl transition-colors" title="Lihat Detail">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Edit Button -->
                                    <a href="{{ route('books.edit', $book->id) }}" 
                                       class="p-2 text-yellow-400 hover:text-white hover:bg-yellow-500/20 rounded-xl transition-colors" title="Edit Buku">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Delete Button with Form -->
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku {{ addslashes($book->title) }}?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-rose-400 hover:text-white hover:bg-rose-600/30 rounded-xl transition-colors" title="Hapus Buku">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-stone-500">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <i data-lucide="book-x" class="w-10 h-10 text-stone-600"></i>
                                    <p class="text-sm font-medium">Tidak ada data buku yang ditemukan.</p>
                                    @if(request()->hasAny(['search', 'category_id']))
                                        <a href="{{ route('books.index') }}" class="text-xs text-amber-400 underline">Bersihkan Filter Pencarian</a>
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
            <div class="p-4 border-t border-stone-800 bg-stone-950/40">
                {{ $books->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
