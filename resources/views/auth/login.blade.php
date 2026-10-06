@extends('layouts.app')

@section('title', 'Login - Masuk Pengguna')

@section('content')
<div class="max-w-md mx-auto py-8">
    <div class="bg-burgundy-card/90 backdrop-blur-xl border border-burgundy-light/60 rounded-2xl p-8 shadow-2xl relative overflow-hidden">
        <!-- Accent Glow -->
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-dustypink/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8">
            <div class="w-14 h-14 bg-dustypink/20 border border-dustypink/30 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                <i data-lucide="shield-check" class="w-7 h-7 text-dustypink"></i>
            </div>
            <h2 class="text-2xl font-bold text-creme">Selamat Datang</h2>
            <p class="text-xs text-sand mt-1">Silakan masuk untuk mengelola data perpustakaan</p>
        </div>

        <!-- Pre-filled Seeder Info Box -->
        <div class="mb-6 p-3.5 bg-burgundy-dark/60 border border-dustypink/30 rounded-xl text-xs text-sand">
            <div class="flex items-center space-x-2 font-bold text-creme mb-1">
                <i data-lucide="key" class="w-4 h-4 text-dustypink"></i>
                <span>Akun Default Login:</span>
            </div>
            <p><span class="text-sand">Email:</span> <code class="bg-burgundy-dark px-1.5 py-0.5 rounded text-creme font-mono">dewanti@gmail.com</code></p>
            <p class="mt-0.5"><span class="text-sand">Password:</span> <code class="bg-burgundy-dark px-1.5 py-0.5 rounded text-creme font-mono">admin123</code></p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold text-sand mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-sand">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>
                    <input type="email" name="email" id="email" value="{{ old('email', 'dewanti@gmail.com') }}" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme focus:outline-none focus:border-dustypink focus:ring-2 focus:ring-dustypink/20 transition-all placeholder:text-sand/50" 
                           placeholder="dewanti@gmail.com">
                </div>
                @error('email')
                    <p class="mt-1.5 text-xs text-rose-300 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-sand mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-sand">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </span>
                    <input type="password" name="password" id="password" value="admin123" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme focus:outline-none focus:border-dustypink focus:ring-2 focus:ring-dustypink/20 transition-all placeholder:text-sand/50" 
                           placeholder="••••••••">
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-rose-300 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center space-x-2 text-sand cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-burgundy-dark border-burgundy-light text-dustypink focus:ring-dustypink">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" 
                    class="w-full py-3 px-4 bg-dustypink hover:bg-sand text-burgundy-dark font-bold rounded-xl text-sm shadow-lg shadow-dustypink/20 transition-all duration-200 flex items-center justify-center space-x-2 group">
                <span>Masuk Sekarang</span>
                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-sand">
            <span>Belum memiliki akun?</span>
            <a href="{{ route('register') }}" class="text-dustypink hover:text-creme font-semibold ml-1 underline underline-offset-4">Daftar Akun Baru</a>
        </div>
    </div>
</div>
@endsection
