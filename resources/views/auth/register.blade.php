@extends('layouts.app')

@section('title', 'Register - Buat Akun Baru')

@section('content')
<div class="max-w-md mx-auto py-8">
    <div class="bg-burgundy-card/90 backdrop-blur-xl border border-burgundy-light/60 rounded-2xl p-8 shadow-2xl relative overflow-hidden">
        <div class="text-center mb-8">
            <div class="w-14 h-14 bg-dustypink/20 border border-dustypink/30 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                <i data-lucide="user-plus" class="w-7 h-7 text-dustypink"></i>
            </div>
            <h2 class="text-2xl font-bold text-creme">Daftar Akun Baru</h2>
            <p class="text-xs text-sand mt-1">Buat akun petugas perpustakaan Anda</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-xs font-semibold text-sand mb-1.5">Nama Lengkap</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-sand">
                        <i data-lucide="user" class="w-4 h-4"></i>
                    </span>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme focus:outline-none focus:border-dustypink focus:ring-2 focus:ring-dustypink/20 transition-all" 
                           placeholder="Putri Wahyu Dewantie">
                </div>
                @error('name')
                    <p class="mt-1.5 text-xs text-rose-300 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-xs font-semibold text-sand mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-sand">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme focus:outline-none focus:border-dustypink focus:ring-2 focus:ring-dustypink/20 transition-all" 
                           placeholder="nama@email.com">
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
                    <input type="password" name="password" id="password" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme focus:outline-none focus:border-dustypink focus:ring-2 focus:ring-dustypink/20 transition-all" 
                           placeholder="Minimal 6 karakter">
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-rose-300 flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-semibold text-sand mb-1.5">Konfirmasi Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-sand">
                        <i data-lucide="check-check" class="w-4 h-4"></i>
                    </span>
                    <input type="password" name="password_confirmation" id="password_confirmation" required 
                           class="w-full pl-10 pr-4 py-2.5 bg-burgundy-dark/80 border border-burgundy-light rounded-xl text-sm text-creme focus:outline-none focus:border-dustypink focus:ring-2 focus:ring-dustypink/20 transition-all" 
                           placeholder="Ulangi kata sandi">
                </div>
            </div>

            <button type="submit" 
                    class="w-full mt-2 py-3 px-4 bg-dustypink hover:bg-sand text-burgundy-dark font-bold rounded-xl text-sm shadow-lg shadow-dustypink/20 transition-all duration-200 flex items-center justify-center space-x-2">
                <span>Daftar Akun</span>
                <i data-lucide="user-check" class="w-4 h-4"></i>
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-sand">
            <span>Sudah memiliki akun?</span>
            <a href="{{ route('login') }}" class="text-dustypink hover:text-creme font-semibold ml-1 underline underline-offset-4">Masuk Disini</a>
        </div>
    </div>
</div>
@endsection
