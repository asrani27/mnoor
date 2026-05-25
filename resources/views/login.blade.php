@extends('layouts.master')

@section('title', 'Login')

@section('content')
<!-- Login Section -->
<div class="relative overflow-hidden py-16">
    <!-- Background Decorations -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl"></div>
    
    <div class="relative max-w-md mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-10">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-blue-500/30">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Login Admin</h1>
            <p class="text-white/60">Masuk ke akun administrator Anda</p>
        </div>
        
        <!-- Login Form Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/10">
            <!-- Error Message -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-500/20 border border-red-500/30 rounded-xl">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-red-200 font-medium">{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-white/80 mb-2">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Masukkan username" 
                        required
                        value="{{ old('username') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('username') border-red-500 @enderror"
                    >
                    @error('username')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-white/80 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password" 
                        required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('password') border-red-500 @enderror"
                    >
                    @error('password')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-blue-500 border-white/20 rounded">
                    <label for="remember" class="ml-2 text-sm text-white/60">Ingat saya</label>
                </div>
                
                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full px-6 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl font-semibold text-lg hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Masuk
                </button>
            </form>
            
            <!-- Back Link -->
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center text-white/60 hover:text-white transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
