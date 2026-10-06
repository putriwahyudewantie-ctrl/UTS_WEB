@extends('layouts.app')

@section('title', 'Kelola Kategori Buku')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black text-amber-100 flex items-center gap-3 tracking-tight">
                <i data-lucide="folder-tree" class="w-8 h-8 text-amber-400"></i>
                <span>Kategori Buku</span>
            </h1>
            <p class="text-xs text-stone-400 mt-1">Kelola daftar klasifikasi dan kategori buku perpustakaan</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Add Category Form -->
        <div class="bg-stone-900/90 border border-stone-800 rounded-3xl p-6 shadow-xl h-fit">
            <h2 class="text-lg font-bold text-amber-100 mb-4 flex items-center gap-2">
                <i data-lucide="folder-plus" class="w-5 h-5 text-amber-400"></i>
                <span>Tambah Kategori</span>
            </h2>

            <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-xs font-semibold text-stone-300 mb-1.5">Nama Kategori <span class="text-amber-400">*</span></label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}"
                           style="background-color:#1c1917; color:#e7e5e4; border-color:#44403c;"
                           class="w-full px-4 py-2.5 border rounded-xl text-sm focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all"
                           placeholder="Contoh: Novel, Komputer, Sejarah">
                    @error('name')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-xs font-semibold text-stone-300 mb-1.5">Deskripsi Kategori</label>
                    <textarea name="description" id="description" rows="3"
                              style="background-color:#1c1917; color:#e7e5e4; border-color:#44403c;"
                              class="w-full px-4 py-2.5 border rounded-xl text-sm focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all resize-none"
                              placeholder="Penjelasan singkat mengenai kategori ini">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-slate-950 text-xs font-bold rounded-xl shadow-lg shadow-amber-500/20 transition-all flex items-center justify-center space-x-2">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    <span>Simpan Kategori</span>
                </button>
            </form>
        </div>

        <!-- Categories Table -->
        <div class="lg:col-span-2 bg-stone-900/90 border border-stone-800 rounded-3xl shadow-xl overflow-hidden">
            <div class="p-6 border-b border-stone-800 flex items-center justify-between">
                <h2 class="text-lg font-bold text-amber-100">Daftar Kategori Terdaftar</h2>
                <span class="text-xs text-amber-300 font-mono font-semibold bg-amber-500/10 px-2.5 py-1 rounded-xl border border-amber-500/20">
                    {{ count($categories) }} Kategori
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-stone-300">
                    <thead class="bg-stone-950/70 text-xs uppercase font-semibold text-amber-300 border-b border-stone-800">
                        <tr>
                            <th class="px-6 py-4">Nama Kategori</th>
                            <th class="px-6 py-4">Deskripsi</th>
                            <th class="px-6 py-4 text-center">Jumlah Buku</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-800/60">
                        @forelse($categories as $cat)
                            <tr class="hover:bg-stone-800/40 transition-colors">
                                <td class="px-6 py-4 font-bold text-amber-100">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="folder" class="w-4 h-4 text-amber-400"></i>
                                        <span>{{ $cat->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-stone-400 text-xs">{{ $cat->description ?? '-' }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2.5 py-1 bg-amber-500/10 border border-amber-500/20 text-amber-300 rounded-lg text-xs font-mono font-bold">
                                        {{ $cat->books_count }} Buku
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-stone-500">
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
