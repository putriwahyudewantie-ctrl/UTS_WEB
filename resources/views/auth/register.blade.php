@extends('layouts.app')

@section('title', 'Register - Buat Akun Baru')

@section('content')
<div class="max-w-md mx-auto py-8">
    <div class="bg-slate-900/80 backdrop-blur-2xl border border-slate-800 rounded-3xl p-8 shadow-2xl shadow-indigo-950/50 relative overflow-hidden">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500 p-0.5 rounded-2xl mx-auto mb-3 shadow-lg shadow-indigo-500/20">
                <div class="w-full h-full bg-slate-900 rounded-[14px] flex items-center justify-center">
                    <i data-lucide="user-plus" class="w-8 h-8 text-indigo-400"></i>
                </div>
            </div>
            <h2 class="text-2xl font-black text-white tracking-tight">Daftar Akun Baru</h2>
            <p class="text-xs text-slate-400 mt-1">Buat akun petugas perpustakaan Anda</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-xs font-semibold text-slate-300 mb-1.5">Nama Lengkap</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="user" class="w-4 h-4"></i>
                    </span>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all" 
                           placeholder="Putri Wahyu Dewantie">
                </div>
                @error('name')
                    <p class="mt-1.5 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-xs font-semibold text-slate-300 mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all" 
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
                    <input type="password" name="password" id="password" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all" 
                           placeholder="Minimal 6 karakter">
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-rose-400 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-semibold text-slate-300 mb-1.5">Konfirmasi Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="check-check" class="w-4 h-4"></i>
                    </span>
                    <input type="password" name="password_confirmation" id="password_confirmation" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-950/70 border border-slate-800 rounded-xl text-sm text-white focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all" 
                           placeholder="Ulangi kata sandi">
                </div>
            </div>

            <button type="submit" 
                    class="w-full mt-2 py-3 px-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold rounded-xl text-sm shadow-xl shadow-indigo-600/30 transition-all duration-300 flex items-center justify-center space-x-2">
                <span>Daftar Akun</span>
                <i data-lucide="user-check" class="w-4 h-4"></i>
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-slate-400">
            <span>Sudah memiliki akun?</span>
            <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold ml-1 underline underline-offset-4">Masuk Disini</a>
        </div>
    </div>
</div>
@endsection
