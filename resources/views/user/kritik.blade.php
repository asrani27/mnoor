@extends('layouts.user')

@section('title', 'Kritik & Saran')
@section('header', 'Kritik & Saran')
@section('breadcrumb', 'Sampaikan Masukan Anda')

@section('content')
    <!-- Info Card -->
    <div class="mb-8">
        <div class="bg-gradient-to-r from-red-500 to-pink-500 rounded-2xl p-6 text-white">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-xl font-bold mb-2">Kritik & Saran</h2>
                    <p class="text-white/80 text-sm">Sampaikan kritik dan saran untuk meningkatkan kualitas layanan kami.</p>
                </div>
                <div class="bg-white/20 rounded-lg p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Kritik Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Form Kritik & Saran</h3>
        </div>
        
        <div class="p-6">
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ route('user.kritik.store') }}" method="POST">
                @csrf
                
                <!-- Service Selection -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Layanan</label>
                    <select name="layanan_id" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
                        <option value="">-- Pilih Layanan --</option>
                        @if(isset($layanans))
                            @foreach($layanans as $layanan)
                                <option value="{{ $layanan->id }}" {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}>
                                    {{ $layanan->nama }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('layanan_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kritik Input -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kritik & Saran</label>
                    <textarea name="isi_kritik" rows="5" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none" placeholder="Tulis kritik dan saran Anda di sini..." required>{{ old('isi_kritik') }}</textarea>
                    @error('isi_kritik')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition-colors flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9 2zm0 0v-8"></path>
                    </svg>
                    Kirim Kritik
                </button>
            </form>
        </div>
    </div>

    <!-- Recent Kritik -->
    @if(isset($recentKritiks) && $recentKritiks->count() > 0)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-800">Kritik & Saran Saya</h3>
            </div>
            
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($recentKritiks as $kritik)
                        <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="font-medium text-gray-800">{{ $kritik->layanan->nama ?? 'Layanan' }}</h4>
                                    <span class="px-2 py-1 text-xs rounded-full {{ $kritik->tindak_lanjut ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ $kritik->tindak_lanjut ? 'Ditanggapi' : 'Menunggu' }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mb-2">{{ $kritik->isi_kritik }}</p>
                                <p class="text-xs text-gray-400">{{ $kritik->created_at->format('d/m/Y H:i') }}</p>
                                
                                @if($kritik->tindak_lanjut)
                                    <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                        <p class="text-xs text-green-700 font-medium mb-1">Tanggapan:</p>
                                        <p class="text-sm text-green-800">{{ $kritik->tindak_lanjut }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
            </svg>
            <p class="text-gray-500">Belum ada kritik dan saran yang Anda kirimkan.</p>
        </div>
    @endif
@endsection
