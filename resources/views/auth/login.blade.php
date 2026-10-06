@extends('layouts.app')

@section('title', 'Login - Masuk Pengguna')

@section('content')
<div class="max-w-md mx-auto py-8">
    <div class="bg-slate-900/80 backdrop-blur-2xl border border-slate-800 rounded-3xl p-8 shadow-2xl shadow-indigo-950/50 relative overflow-hidden">
        <!-- Background Gradient Glows -->
        <div class="absolute -top-20 -right-20 w-48 h-48 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-20 w-48 h-48 bg-purple-500/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8 relative z-10">
            <div class="w-16 h-16 bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500 p-0.5 rounded-2xl mx-auto mb-3 shadow-lg shadow-indigo-500/20">
                <div class="w-full h-full bg-slate-900 rounded-[14px] flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-8 h-8 text-indigo-400"></i>
                </div>
            </div>
            <h2 class="text-2xl font-black text-white tracking-tight">Selamat Datang</h2>
            <p class="text-xs text-slate-400 mt-1">Silakan masuk untuk mengelola data perpustakaan</p>
        </div>

        <!-- Pre-filled Seeder Info Box -->
        <div class="mb-6 p-4 bg-indigo-950/40 border border-indigo-500/30 rounded-2xl text-xs text-indigo-200">
            <div class="flex items-center space-x-2 font-bold text-white mb-1">
                <i data-lucide="key" class="w-4 h-4 text-indigo-400"></i>
                <span>Akun Default Login:</span>
            </div>
            <p><span class="text-slate-400">Email:</span> <code class="bg-slate-950 px-2 py-0.5 rounded text-indigo-300 font-mono">dewanti@gmail.com</code></p>
            <p class="mt-1"><span class="text-slate-400">Password:</span> <code class="bg-slate-950 px-2 py-0.5 rounded text-indigo-300 font-mono">admin123</code></p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-5 relative z-10">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold text-slate-300 mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>
                    <input type="email" name="email" id="email" value="{{ old('email', 'dewanti@gmail.com') }}" required 
                           class="w-full pl-10 pr-4 py-3 bg-slate-950/70 border border-slate-800 rounded-xl text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all placeholder:text-slate-600" 
                           placeholder="dewanti@gmail.com">
                </div>
                @error('email')
                    <p class="mt-1.5 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-300 mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </span>
                    <input type="password" name="password" id="password" value="admin123" required 
                           class="w-full pl-10 pr-4 py-3 bg-slate-950/70 border border-slate-800 rounded-xl text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all placeholder:text-slate-600" 
                           placeholder="••••••••">
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center space-x-2 text-slate-400 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-slate-950 border-slate-700 text-indigo-600 focus:ring-indigo-500">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" 
                    class="w-full py-3.5 px-4 bg-gradient-to-r from-indigo-600 via-indigo-500 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold rounded-xl text-sm shadow-xl shadow-indigo-600/30 transition-all duration-300 flex items-center justify-center space-x-2 group">
                <span>Masuk Sekarang</span>
                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-slate-400 relative z-10">
            <span>Belum memiliki akun?</span>
            <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold ml-1 underline underline-offset-4">Daftar Akun Baru</a>
        </div>
    </div>
</div>
@endsection
