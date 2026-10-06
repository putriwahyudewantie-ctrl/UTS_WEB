@extends('layouts.app')

@section('title', 'Edit Data Buku')

@section('content')
<div class="max-w-2xl mx-auto py-4">
    <!-- Breadcrumb & Back -->
    <div class="mb-6">
        <a href="{{ route('books.index') }}" class="inline-flex items-center gap-1.5 text-xs text-stone-400 hover:text-amber-300 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Daftar Buku</span>
        </a>
    </div>

    <!-- Form Container -->
    <div class="bg-stone-900/90 border border-stone-800 rounded-3xl p-8 shadow-2xl">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-stone-800">
            <div class="p-3 bg-yellow-500/20 border border-yellow-500/30 rounded-xl text-yellow-400">
                <i data-lucide="edit-3" class="w-6 h-6"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold text-amber-100">Edit Data Buku</h1>
                <p class="text-xs text-stone-400">Perbarui informasi detail untuk buku <span class="text-amber-400 font-semibold">"{{ $book->title }}"</span></p>
            </div>
        </div>

        <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Judul Buku -->
            <div>
                <label for="title" class="block text-xs font-semibold text-stone-300 mb-1.5">Judul Buku <span class="text-amber-400">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required
                       style="background-color:#1c1917; color:#e7e5e4; border-color:#44403c;"
                       class="w-full px-4 py-2.5 border rounded-xl text-sm focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all"
                       placeholder="Masukkan judul buku lengkap">
                @error('title')
                    <p class="mt-1 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category_id" class="block text-xs font-semibold text-stone-300 mb-1.5">Kategori Buku <span class="text-amber-400">*</span></label>
                <select name="category_id" id="category_id" required
                        style="background-color:#1c1917; color:#e7e5e4; border-color:#44403c;"
                        class="w-full px-4 py-2.5 border rounded-xl text-sm focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all">
                    <option value="" style="background:#1c1917;color:#a8a29e;">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $book->category_id) == $cat->id ? 'selected' : '' }}
                                style="background:#1c1917;color:#e7e5e4;">
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Penulis -->
                <div>
                    <label for="author" class="block text-xs font-semibold text-stone-300 mb-1.5">Penulis <span class="text-amber-400">*</span></label>
                    <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" required
                           style="background-color:#1c1917; color:#e7e5e4; border-color:#44403c;"
                           class="w-full px-4 py-2.5 border rounded-xl text-sm focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all"
                           placeholder="Nama penulis">
                    @error('author')
                        <p class="mt-1 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Penerbit -->
                <div>
                    <label for="publisher" class="block text-xs font-semibold text-stone-300 mb-1.5">Penerbit <span class="text-amber-400">*</span></label>
                    <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $book->publisher) }}" required
                           style="background-color:#1c1917; color:#e7e5e4; border-color:#44403c;"
                           class="w-full px-4 py-2.5 border rounded-xl text-sm focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all"
                           placeholder="Nama penerbit">
                    @error('publisher')
                        <p class="mt-1 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Tahun Terbit -->
                <div>
                    <label for="year" class="block text-xs font-semibold text-stone-300 mb-1.5">Tahun Terbit <span class="text-amber-400">*</span></label>
                    <input type="number" name="year" id="year" value="{{ old('year', $book->year) }}" required min="1800" max="{{ date('Y') + 1 }}"
                           style="background-color:#1c1917; color:#e7e5e4; border-color:#44403c;"
                           class="w-full px-4 py-2.5 border rounded-xl text-sm focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 font-mono transition-all"
                           placeholder="Contoh: 2024">
                    @error('year')
                        <p class="mt-1 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                    @enderror
                </div>

                <!-- Stok -->
                <div>
                    <label for="stock" class="block text-xs font-semibold text-stone-300 mb-1.5">Jumlah Stok <span class="text-amber-400">*</span></label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}" required min="0"
                           style="background-color:#1c1917; color:#e7e5e4; border-color:#44403c;"
                           class="w-full px-4 py-2.5 border rounded-xl text-sm focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 font-mono transition-all"
                           placeholder="Jumlah stok buku">
                    @error('stock')
                        <p class="mt-1 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex items-center justify-end space-x-3 border-t border-stone-800">
                <a href="{{ route('books.index') }}" class="px-5 py-2.5 bg-stone-800 hover:bg-stone-700 text-stone-200 text-sm font-semibold rounded-xl transition-colors border border-stone-700">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-slate-950 text-sm font-bold rounded-xl shadow-lg shadow-amber-500/20 transition-all duration-200 flex items-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Update Data Buku</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
