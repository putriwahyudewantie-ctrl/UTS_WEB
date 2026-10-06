@extends('layouts.app')

@section('title', 'Kelola Kategori Buku')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-creme flex items-center gap-3">
                <i data-lucide="folder-tree" class="w-7 h-7 text-dustypink"></i>
                <span>Kategori Buku</span>
            </h1>
            <p class="text-xs text-sand mt-1">Kelola daftar klasifikasi dan kategori buku perpustakaan</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Add Category Form -->
        <div class="bg-burgundy-card/90 border border-burgundy-light/60 rounded-2xl p-6 shadow-xl h-fit">
            <h2 class="text-lg font-bold text-creme mb-4 flex items-center gap-2">
                <i data-lucide="folder-plus" class="w-5 h-5 text-dustypink"></i>
                <span>Tambah Kategori</span>
            </h2>

            <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-xs font-semibold text-sand mb-1">Nama Kategori <span class="text-dustypink">*</span></label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}" 
                           class="w-full px-3.5 py-2 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme focus:outline-none focus:border-dustypink" 
                           placeholder="Contoh: Novel, Komputer, Sejarah">
                    @error('name')
                        <p class="mt-1 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-xs font-semibold text-sand mb-1">Deskripsi Kategori</label>
                    <textarea name="description" id="description" rows="3" 
                              class="w-full px-3.5 py-2 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme focus:outline-none focus:border-dustypink" 
                              placeholder="Penjelasan singkat mengenai kategori ini">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="w-full py-2.5 bg-dustypink hover:bg-sand text-burgundy-dark text-xs font-bold rounded-xl shadow-lg shadow-dustypink/20 transition-all flex items-center justify-center space-x-2">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    <span>Simpan Kategori</span>
                </button>
            </form>
        </div>

        <!-- Categories Table -->
        <div class="lg:col-span-2 bg-burgundy-card/90 border border-burgundy-light/60 rounded-2xl shadow-xl overflow-hidden">
            <div class="p-6 border-b border-burgundy-light/60 flex items-center justify-between">
                <h2 class="text-lg font-bold text-creme">Daftar Kategori Terdaftar</h2>
                <span class="text-xs text-creme font-mono font-semibold bg-dustypink/20 px-2.5 py-1 rounded-lg border border-dustypink/30">
                    {{ count($categories) }} Kategori
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-sand">
                    <thead class="bg-burgundy-dark/90 text-xs uppercase font-semibold text-dustypink border-b border-burgundy-light/60">
                        <tr>
                            <th class="px-6 py-3">Nama Kategori</th>
                            <th class="px-6 py-3">Deskripsi</th>
                            <th class="px-6 py-3 text-center">Jumlah Buku</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-burgundy-light/40">
                        @forelse($categories as $cat)
                            <tr class="hover:bg-burgundy-light/30 transition-colors">
                                <td class="px-6 py-4 font-bold text-creme">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="folder" class="w-4 h-4 text-dustypink"></i>
                                        <span>{{ $cat->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sand text-xs">{{ $cat->description ?? '-' }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2.5 py-1 bg-burgundy-dark border border-burgundy-light text-creme rounded-lg text-xs font-mono font-bold">
                                        {{ $cat->books_count }} Buku
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-sand">
                                    Belum ada kategori. Silakan tambahkan pada form di samping.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
