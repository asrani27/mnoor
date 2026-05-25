<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SISKAM') - Sistem Informasi Survey Kepuasan Masyarakat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 min-h-screen font-sans antialiased">
    
    <!-- Navigation -->
    <nav class="bg-white/10 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white tracking-tight">SISKAM</span>
                </div>
                
                <!-- Nav Links -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-lg {{ request()->routeIs('home') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-white/90 hover:text-white hover:bg-white/10' }} transition-all duration-200 font-medium">Home</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg {{ request()->routeIs('register') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'border border-white/20 text-white/90 hover:text-white hover:bg-white/10' }} transition-all duration-200 font-medium">Daftar Responden</a>
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg {{ request()->routeIs('login') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'border border-white/20 text-white/90 hover:text-white hover:bg-white/10' }} transition-all duration-200 font-medium">Login</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg text-white/70 hover:text-white hover:bg-white/10" id="mobile-menu-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="md:hidden hidden bg-white/5 border-t border-white/10" id="mobile-menu">
            <div class="px-4 py-3 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs('home') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-white/90 hover:bg-white/10' }}">Home</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs('register') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-white/90 hover:bg-white/10' }}">Daftar Responden</a>
                <a href="{{ route('login') }}" class="block px-4 py-2 rounded-lg {{ request()->routeIs('login') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-white/90 hover:bg-white/10' }}">Login</a>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    @yield('content')
    
    <!-- Footer -->
    <footer class="bg-white/5 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">SISKAM</span>
                </div>
                <p class="text-white/50 text-sm">© 2024 Sistem Informasi Survey Kepuasan Masyarakat. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Toast Notification -->
    @if(session('success'))
    <div id="toast" class="fixed bottom-4 right-4 bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center space-x-3 transform translate-y-full opacity-0 transition-all duration-500 z-50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    @endif
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        
        // Toast notification
        @if(session('success'))
        setTimeout(function() {
            var toast = document.getElementById('toast');
            if(toast) {
                toast.classList.remove('translate-y-full', 'opacity-0');
                setTimeout(function() {
                    toast.classList.add('translate-y-full', 'opacity-0');
                }, 3000);
            }
        }, 100);
        @endif
    </script>
    
    @stack('scripts')
</body>
</html>
