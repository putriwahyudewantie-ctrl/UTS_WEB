@extends('layouts.app')

@section('title', 'Detail Buku - ' . $book->title)

@section('content')
<div class="max-w-3xl mx-auto py-4">
    <!-- Breadcrumb & Back -->
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('books.index') }}" class="inline-flex items-center gap-1.5 text-xs text-sand hover:text-creme transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Daftar Buku</span>
        </a>
        <div class="flex items-center gap-2">
            <a href="{{ route('books.edit', $book->id) }}" class="px-3 py-1.5 bg-dustypink/20 border border-dustypink/30 text-creme hover:bg-dustypink hover:text-burgundy-dark rounded-lg text-xs font-semibold flex items-center gap-1.5 transition-colors">
                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                <span>Edit Buku</span>
            </a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1.5 bg-rose-950/60 border border-rose-500/40 text-rose-300 hover:bg-rose-600 hover:text-white rounded-lg text-xs font-semibold flex items-center gap-1.5 transition-colors">
                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                    <span>Hapus</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Detail Card -->
    <div class="bg-burgundy-card/90 border border-burgundy-light/60 rounded-2xl shadow-2xl overflow-hidden">
        <!-- Header Ribbon -->
        <div class="bg-gradient-to-r from-burgundy via-burgundy-dark to-burgundy-card p-8 border-b border-burgundy-light/60 relative">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-dustypink/20 border border-dustypink/40 text-creme mb-2">
                        <i data-lucide="folder" class="w-3.5 h-3.5"></i>
                        {{ $book->category->name ?? 'Uncategorized' }}
                    </span>
                    <h1 class="text-2xl font-black text-creme leading-tight">{{ $book->title }}</h1>
                    <p class="text-sm text-sand mt-1 flex items-center gap-2">
                        <i data-lucide="user" class="w-4 h-4 text-dustypink"></i>
                        <span>Penulis: <strong>{{ $book->author }}</strong></span>
                    </p>
                </div>

                <div class="text-right">
                    <span class="text-xs text-sand block uppercase tracking-wider">Status Stok</span>
                    <span class="inline-block mt-1 px-3 py-1 rounded-xl text-sm font-mono font-bold bg-dustypink/20 text-creme border border-dustypink/40">
                        {{ $book->stock > 0 ? $book->stock . ' Eksemplar Tersedia' : 'Stok Habis' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Information Grid -->
        <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="bg-burgundy-dark/60 border border-burgundy-light/50 p-4 rounded-xl">
                    <span class="text-xs font-semibold text-sand uppercase tracking-wider block mb-1">Penerbit</span>
                    <p class="text-base font-bold text-creme flex items-center gap-2">
                        <i data-lucide="building-2" class="w-4 h-4 text-dustypink"></i>
                        {{ $book->publisher }}
                    </p>
                </div>

                <div class="bg-burgundy-dark/60 border border-burgundy-light/50 p-4 rounded-xl">
                    <span class="text-xs font-semibold text-sand uppercase tracking-wider block mb-1">Tahun Terbit</span>
                    <p class="text-base font-bold text-creme flex items-center gap-2 font-mono">
                        <i data-lucide="calendar" class="w-4 h-4 text-dustypink"></i>
                        {{ $book->year }}
                    </p>
                </div>
            </div>

            <div class="space-y-4">
                <div class="bg-burgundy-dark/60 border border-burgundy-light/50 p-4 rounded-xl">
                    <span class="text-xs font-semibold text-sand uppercase tracking-wider block mb-1">Kategori Buku</span>
                    <p class="text-base font-bold text-creme flex items-center gap-2">
                        <i data-lucide="tag" class="w-4 h-4 text-dustypink"></i>
                        {{ $book->category->name ?? '-' }}
                    </p>
                    <p class="text-xs text-sand mt-1 italic">{{ $book->category->description ?? 'Tidak ada deskripsi' }}</p>
                </div>

                <div class="bg-burgundy-dark/60 border border-burgundy-light/50 p-4 rounded-xl">
                    <span class="text-xs font-semibold text-sand uppercase tracking-wider block mb-1">Terakhir Diperbarui</span>
                    <p class="text-xs text-sand flex items-center gap-2 font-mono">
                        <i data-lucide="clock" class="w-4 h-4 text-dustypink"></i>
                        {{ $book->updated_at ? $book->updated_at->format('d M Y, H:i') : '-' }} WIB
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
