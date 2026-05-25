@extends('layouts.user')

@section('title', 'Dashboard User')
@section('header', 'Dashboard')
@section('breadcrumb', 'Overview')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-8">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl p-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->username ?? 'User' }}!</h2>
                    <p class="text-white/80">Terima kasih telah berpartisipasi dalam survey kepuasan masyarakat.</p>
                </div>
                <div class="hidden md:block">
                    <svg class="w-32 h-32 text-white/20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Pertanyaan Available -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Pertanyaan</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalPertanyaan ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-2">Pertanyaan survei tersedia</p>
                </div>
                <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pertanyaan Dijawab -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Sudah Dijawab</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $answeredCount ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-2">Pertanyaan yang telah dijawab</p>
                </div>
                <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Rating Given -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Rating Anda</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $averageRating ?? '0' }}</p>
                    <p class="text-xs text-gray-400 mt-2">Dari 5 bintang</p>
                </div>
                <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Quick Actions Card -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Aksi Cepat</h3>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('user.jawab-pertanyaan') }}" class="flex items-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors group">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-indigo-200">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Jawab Pertanyaan</p>
                        <p class="text-xs text-gray-500">Isi survey kepuasan</p>
                    </div>
                </a>
                
                <a href="{{ route('user.rating') }}" class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors group">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-yellow-200">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Beri Rating</p>
                        <p class="text-xs text-gray-500">Nilai layanan kami</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Progress Card -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Progress Survey</h3>
            </div>
            <div class="space-y-4">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-600">Pertanyaan Dijawab</span>
                        <span class="text-sm font-semibold text-gray-800">{{ $answeredCount ?? 0 }} / {{ $totalPertanyaan ?? 0 }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        @php
                            $progress = ($totalPertanyaan ?? 0) > 0 ? (($answeredCount ?? 0) / $totalPertanyaan) * 100 : 0;
                        @endphp
                        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-3 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
                    </div>
                </div>
                
                <div class="pt-4 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Status</span>
                        @if(($answeredCount ?? 0) >= ($totalPertanyaan ?? 0) && ($totalPertanyaan ?? 0) > 0)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Survey Selesai
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Dalam Progress
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800">Aktivitas Terbaru</h3>
        </div>
        <div class="p-6">
            @if(isset($recentAnswers) && $recentAnswers->count() > 0)
                <div class="space-y-4">
                    @foreach($recentAnswers as $answer)
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">{{ $answer->pertanyaan->isi ?? 'Pertanyaan' }}</p>
                                <p class="text-xs text-gray-500">{{ $answer->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-semibold text-gray-800">{{ $answer->nilai ?? '-' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <p class="text-gray-500 mb-4">Belum ada aktivitas terbaru</p>
                    <a href="{{ route('user.jawab-pertanyaan') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                        Mulai Survey
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
