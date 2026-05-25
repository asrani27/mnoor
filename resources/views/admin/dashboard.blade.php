@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('header', 'Dashboard')
@section('breadcrumb', 'Overview')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <a href="{{ route('admin.users.index') }}" class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-indigo-200 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Users</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_users'] }}</p>
                    <p class="text-xs text-gray-400 mt-2">Kelola pengguna sistem</p>
                </div>
                <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center group-hover:bg-indigo-200 transition-colors">
                    <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Total Layanan -->
        <a href="{{ route('admin.layanans.index') }}" class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-green-200 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Layanan</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_layanans'] }}</p>
                    <p class="text-xs text-gray-400 mt-2">Kelola layanan survei</p>
                </div>
                <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center group-hover:bg-green-200 transition-colors">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Total Wilayah -->
        <a href="{{ route('admin.wilayahs.index') }}" class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-purple-200 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Wilayah</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_wilayahs'] }}</p>
                    <p class="text-xs text-gray-400 mt-2">Kelola wilayah survei</p>
                </div>
                <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Total Responden -->
        <a href="{{ route('admin.respondens.index') }}" class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-orange-200 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Responden</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_respondens'] }}</p>
                    <p class="text-xs text-gray-400 mt-2">Kelola data responden</p>
                </div>
                <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center group-hover:bg-orange-200 transition-colors">
                    <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
            </div>
        </a>
    </div>

    <!-- Second Row Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Pertanyaan -->
        <a href="{{ route('admin.pertanyaans.index') }}" class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-cyan-200 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Pertanyaan</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_pertanyaans'] }}</p>
                    <p class="text-xs text-gray-400 mt-2">Kelola pertanyaan survei</p>
                </div>
                <div class="w-14 h-14 bg-cyan-100 rounded-xl flex items-center justify-center group-hover:bg-cyan-200 transition-colors">
                    <svg class="w-7 h-7 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Total Kritik -->
        <a href="{{ route('admin.kritiks.index') }}" class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-pink-200 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Kritik</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_kritiks'] }}</p>
                    <p class="text-xs text-gray-400 mt-2">Kelola kritik & saran</p>
                </div>
                <div class="w-14 h-14 bg-pink-100 rounded-xl flex items-center justify-center group-hover:bg-pink-200 transition-colors">
                    <svg class="w-7 h-7 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Total Jawaban -->
        <a href="{{ route('admin.jawabans.index') }}" class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-teal-200 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Jawaban</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['total_jawabans'] }}</p>
                    <p class="text-xs text-gray-400 mt-2">Kelola jawaban survei</p>
                </div>
                <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center group-hover:bg-teal-200 transition-colors">
                    <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Quick Actions -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Aksi Cepat</h3>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.users.create') }}" class="flex items-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors group">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-indigo-200">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Tambah User</p>
                        <p class="text-xs text-gray-500">Buat user baru</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.layanans.create') }}" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors group">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Tambah Layanan</p>
                        <p class="text-xs text-gray-500">Buat layanan baru</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.wilayahs.create') }}" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors group">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Tambah Wilayah</p>
                        <p class="text-xs text-gray-500">Buat wilayah baru</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.pertanyaans.create') }}" class="flex items-center p-4 bg-cyan-50 rounded-lg hover:bg-cyan-100 transition-colors group">
                    <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-cyan-200">
                        <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Tambah Pertanyaan</p>
                        <p class="text-xs text-gray-500">Buat pertanyaan baru</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.respondens.create') }}" class="flex items-center p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors group">
                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-200">
                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Tambah Responden</p>
                        <p class="text-xs text-gray-500">Tambah responden baru</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.laporans.index') }}" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors group">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-gray-200">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Lihat Laporan</p>
                        <p class="text-xs text-gray-500">Download laporan</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Data Summary -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Ringkasan Data</h3>
                <a href="{{ route('admin.laporans.index') }}" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">Lihat Detail</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Users</span>
                    </div>
                    <span class="text-lg font-bold text-gray-800">{{ $stats['total_users'] }}</span>
                </div>
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Layanan</span>
                    </div>
                    <span class="text-lg font-bold text-gray-800">{{ $stats['total_layanans'] }}</span>
                </div>
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Wilayah</span>
                    </div>
                    <span class="text-lg font-bold text-gray-800">{{ $stats['total_wilayahs'] }}</span>
                </div>
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Responden</span>
                    </div>
                    <span class="text-lg font-bold text-gray-800">{{ $stats['total_respondens'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Data Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Respondens -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Responden Terbaru</h3>
                    <a href="{{ route('admin.respondens.index') }}" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">Lihat Semua</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Wilayah</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentRespondens as $responden)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-indigo-600 font-semibold text-xs">{{ substr($responden->nama, 0, 1) }}</span>
                                    </div>
                                    <span class="text-sm text-gray-800">{{ $responden->nama }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $responden->wilayah->nama ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $responden->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data responden</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100">
                <a href="{{ route('admin.respondens.create') }}" class="flex items-center justify-center w-full px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Responden Baru
                </a>
            </div>
        </div>

        <!-- Recent Kritik -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Kritik Terbaru</h3>
                    <a href="{{ route('admin.kritiks.index') }}" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">Lihat Semua</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Responden</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Layanan</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recentKritiks as $kritik)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $kritik->responden->nama ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $kritik->responden->layanan->nama ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $kritik->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data kritik</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100">
                <a href="{{ route('admin.kritiks.create') }}" class="flex items-center justify-center w-full px-4 py-2 bg-pink-600 text-white text-sm font-medium rounded-lg hover:bg-pink-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Kritik Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Menu Navigation Guide -->
    <div class="mt-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl p-6 text-white">
        <h3 class="text-lg font-semibold mb-4">Panduan Menu</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="text-sm">Users</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <span class="text-sm">Layanan</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    </svg>
                </div>
                <span class="text-sm">Wilayah</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <span class="text-sm">Responden</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-sm">Pertanyaan</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                </div>
                <span class="text-sm">Kritik</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-sm">Jawaban</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <span class="text-sm">Laporan</span>
            </div>
        </div>
    </div>
@endsection