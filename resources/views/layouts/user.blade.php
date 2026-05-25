@extends('layouts.app')

@section('user-content')
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-indigo-800 to-purple-700 text-white transform transition-transform duration-300 z-40" id="sidebar">
            <div class="flex items-center justify-center h-16 bg-indigo-900/50 border-b border-indigo-600/30">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold">MNOOR User</span>
                </div>
            </div>
            
            <nav class="mt-6 px-4">
                <div class="space-y-2">
                    <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('user.dashboard') ? 'bg-white/20 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </a>
                    
                    <a href="{{ route('user.jawab-pertanyaan') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('user.jawab-pertanyaan') ? 'bg-white/20 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Jawab Pertanyaan
                    </a>
                    
                    <a href="{{ route('user.rating') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('user.rating') ? 'bg-white/20 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                        Rating
                    </a>
                </div>
            </nav>
            
            <!-- User Section -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/20">
                <div class="flex items-center px-4 py-3 rounded-lg bg-white/10">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-white font-semibold">
                        {{ strtoupper(substr(Auth::user()->username ?? 'U', 0, 1)) }}
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->username ?? 'User' }}</p>
                        <p class="text-xs text-white/60">{{ Auth::user()->role ?? 'User' }}</p>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    <button type="button" onclick="confirm('Apakah Anda yakin ingin logout?') && document.getElementById('logout-form').submit()" class="ml-auto text-white/60 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Header -->
            <header class="bg-white border-b border-gray-200 sticky top-0 z-30">
                <div class="flex items-center justify-between px-8 py-4">
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-500 hover:text-gray-700 lg:hidden" id="menu-toggle">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
                            <p class="text-sm text-gray-500">@yield('breadcrumb', 'Welcome back')</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- Profile Dropdown -->
                        <div class="relative">
                            <button class="flex items-center space-x-3 p-2 hover:bg-gray-100 rounded-lg transition-colors" id="profile-dropdown">
                                <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                    {{ strtoupper(substr(Auth::user()->username ?? 'U', 0, 1)) }}
                                </div>
                                <span class="hidden md:block text-sm font-medium text-gray-700">{{ Auth::user()->username ?? 'User' }}</span>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>
@endsection
