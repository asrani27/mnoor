@extends('layouts.master')

@section('title', 'Daftar Responden')

@section('content')
<!-- Main Content -->
<div class="relative overflow-hidden py-16">
    <!-- Background Decorations -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl"></div>
    
    <div class="relative max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-10">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-blue-500/30">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Daftar Sebagai Responden</h1>
            <p class="text-white/60">Lengkapi formulir di bawah ini untuk mendaftar sebagai responden dalam survey kepuasan masyarakat.</p>
        </div>
        
        <!-- Form Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/10">
            @if($errors->any())
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500/30 rounded-xl">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-red-200 font-medium">Terjadi kesalahan. Silakan periksa kembali data yang dimasukkan.</span>
                </div>
            </div>
            @endif
            
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-white/80 mb-2">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('username') border-red-500 @enderror"
                        placeholder="Masukkan username Anda">
                    @error('username')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-white/80 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('email') border-red-500 @enderror"
                        placeholder="Masukkan email Anda">
                    @error('email')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-white/80 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('password') border-red-500 @enderror"
                        placeholder="Masukkan password Anda">
                    @error('password')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Konfirmasi Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-white/80 mb-2">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Konfirmasi password Anda">
                </div>
                
                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-white/80 mb-2">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('nama') border-red-500 @enderror"
                        placeholder="Masukkan nama lengkap Anda">
                    @error('nama')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Jenis Kelamin -->
                <div>
                    <label class="block text-sm font-medium text-white/80 mb-2">Jenis Kelamin</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="relative">
                            <input type="radio" name="jkel" value="L" {{ old('jkel') == 'L' ? 'checked' : '' }} class="peer sr-only" required>
                            <div class="px-4 py-3 bg-white/5 border border-white/10 rounded-xl cursor-pointer peer-checked:bg-blue-500/30 peer-checked:border-blue-500 transition-all text-center">
                                <span class="text-white/80 peer-checked:text-white">Laki-laki</span>
                            </div>
                        </label>
                        <label class="relative">
                            <input type="radio" name="jkel" value="P" {{ old('jkel') == 'P' ? 'checked' : '' }} class="peer sr-only">
                            <div class="px-4 py-3 bg-white/5 border border-white/10 rounded-xl cursor-pointer peer-checked:bg-blue-500/30 peer-checked:border-blue-500 transition-all text-center">
                                <span class="text-white/80 peer-checked:text-white">Perempuan</span>
                            </div>
                        </label>
                    </div>
                    @error('jkel')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Pekerjaan -->
                <div>
                    <label for="pekerjaan" class="block text-sm font-medium text-white/80 mb-2">Pekerjaan</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('pekerjaan') border-red-500 @enderror"
                        placeholder="Contoh: Pegawai Negeri, Wiraswasta, Pelajar, dll">
                    @error('pekerjaan')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-white/80 mb-2">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3" required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none @error('alamat') border-red-500 @enderror"
                        placeholder="Masukkan alamat lengkap Anda">{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- No. Telepon -->
                <div>
                    <label for="telp" class="block text-sm font-medium text-white/80 mb-2">Nomor Telepon</label>
                    <input type="text" id="telp" name="telp" value="{{ old('telp') }}" required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('telp') border-red-500 @enderror"
                        placeholder="Contoh: 081234567890">
                    @error('telp')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full px-6 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl font-semibold text-lg hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Daftar Sekarang
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-white/50 text-sm">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-medium">Masuk di sini</a>
                </p>
            </div>
        </div>
        
        <!-- Back Link -->
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center text-white/60 hover:text-white transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
