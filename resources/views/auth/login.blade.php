@extends('layouts.app')

@section('title', 'Login - Masuk Pengguna')

@section('content')
<div class="max-w-md mx-auto py-8">
    <div class="bg-stone-900/90 backdrop-blur-2xl border border-amber-900/40 rounded-3xl p-8 shadow-2xl shadow-amber-950/40 relative overflow-hidden">
        <!-- Background Gradient Glows -->
        <div class="absolute -top-20 -right-20 w-48 h-48 bg-amber-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-20 w-48 h-48 bg-yellow-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8 relative z-10">
            <div class="w-16 h-16 bg-gradient-to-tr from-amber-600 via-amber-500 to-yellow-400 p-0.5 rounded-2xl mx-auto mb-3 shadow-lg shadow-amber-500/20">
                <div class="w-full h-full bg-stone-900 rounded-[14px] flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-8 h-8 text-amber-400"></i>
                </div>
            </div>
            <h2 class="text-2xl font-black text-amber-100 tracking-tight">Selamat Datang</h2>
            <p class="text-xs text-stone-400 mt-1">Silakan masuk untuk mengelola data perpustakaan</p>
        </div>

        <!-- Pre-filled Seeder Info Box -->
        <div class="mb-6 p-4 bg-amber-950/40 border border-amber-500/30 rounded-2xl text-xs text-amber-200">
            <div class="flex items-center space-x-2 font-bold text-amber-100 mb-1">
                <i data-lucide="key" class="w-4 h-4 text-amber-400"></i>
                <span>Akun Default Login:</span>
            </div>
            <p><span class="text-stone-400">Email:</span> <code class="bg-stone-950 px-2 py-0.5 rounded text-amber-300 font-mono">dewanti@gmail.com</code></p>
            <p class="mt-1"><span class="text-stone-400">Password:</span> <code class="bg-stone-950 px-2 py-0.5 rounded text-amber-300 font-mono">admin123</code></p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-5 relative z-10">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold text-stone-300 mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>
                    <input type="email" name="email" id="email" value="{{ old('email', 'dewanti@gmail.com') }}" required 
                           class="w-full pl-10 pr-4 py-3 bg-stone-950/70 border border-stone-800 rounded-xl text-sm text-stone-100 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all placeholder:text-stone-600" 
                           placeholder="dewanti@gmail.com">
                </div>
                @error('email')
                    <p class="mt-1.5 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-stone-300 mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </span>
                    <input type="password" name="password" id="password" value="admin123" required 
                           class="w-full pl-10 pr-4 py-3 bg-stone-950/70 border border-stone-800 rounded-xl text-sm text-stone-100 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all placeholder:text-stone-600" 
                           placeholder="••••••••">
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center space-x-2 text-stone-400 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-stone-950 border-stone-700 text-amber-500 focus:ring-amber-500">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" 
                    class="w-full py-3.5 px-4 bg-gradient-to-r from-amber-500 via-amber-600 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-slate-950 font-bold rounded-xl text-sm shadow-xl shadow-amber-500/20 transition-all duration-300 flex items-center justify-center space-x-2 group">
                <span>Masuk Sekarang</span>
                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-stone-400 relative z-10">
            <span>Belum memiliki akun?</span>
            <a href="{{ route('register') }}" class="text-amber-400 hover:text-amber-300 font-semibold ml-1 underline underline-offset-4">Daftar Akun Baru</a>
        </div>
    </div>
</div>
@endsection
