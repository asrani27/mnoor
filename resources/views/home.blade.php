@extends('layouts.master')

@section('title', 'Home')

@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="text-center">
            <img src="{{ asset('logo/bjm.png') }}" alt="Logo" class="h-40 w-auto mx-auto mb-4">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-2 tracking-tight">
                <span class="bg-gradient-to-r from-blue-400 via-indigo-400 to-purple-400 bg-clip-text text-transparent">SURVEY KEPUASAN</span>
                <br>
                <span class="text-white">MASYARAKAT</span><br>
                <span class="text-white">kantor kelurahan kertak baru ulu</span>
            </h1>
            <p class="text-lg md:text-xl text-white/70 max-w-2xl mx-auto mb-8">
                Platform survei untuk mengukur dan meningkatkan kepuasan masyarakat terhadap layanan publik dengan hasil yang transparan dan akurat.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-2xl font-semibold text-lg hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Daftar Sebagai Responden
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/60 text-sm font-medium">Total Responden</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ $totalResponden }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/60 text-sm font-medium">Total Layanan</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ $totalLayanan }}</p>
                </div>
                <div class="w-12 h-12 bg-indigo-500/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/60 text-sm font-medium">Pertanyaan</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ $totalJawaban }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/10">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/60 text-sm font-medium">Survey Selesai</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ $totalJawaban > 0 ? round(($totalJawaban / max($totalResponden * 5, 1)) * 100) : 0 }}%</p>
                </div>
                <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section - Per Layanan -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-4">Statistik Survey per Layanan</h2>
        <p class="text-white/60 max-w-2xl mx-auto">Visualisasi data survey kepuasan masyarakat untuk setiap layanan.</p>
    </div>
    
    @foreach($layananCharts as $index => $layanan)
    <div class="mb-12">
        <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
            <span class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center mr-3">
                <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </span>
            {{ $layanan['nama'] }}
        </h3>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Bar Chart -->
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-6 md:p-8 border border-white/10">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-white">Jawaban</h4>
                    <div class="w-10 h-10 bg-blue-500/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="barChart{{ $index }}"></canvas>
                </div>
            </div>
            
            <!-- Pie Chart -->
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-6 md:p-8 border border-white/10">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-white">Distribusi Jawaban</h4>
                    <div class="w-10 h-10 bg-indigo-500/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="pieChart{{ $index }}"></canvas>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Features Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-br from-blue-500/20 to-blue-600/10 backdrop-blur-md rounded-3xl p-8 border border-blue-500/20 hover:border-blue-500/40 transition-all duration-300">
            <div class="w-14 h-14 bg-blue-500/30 rounded-2xl flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-3">Mudah & Cepat</h3>
            <p class="text-white/60">Proses survey yang simpel dan cepat dengan antarmuka yang intuitif untuk semua kalangan.</p>
        </div>
        <div class="bg-gradient-to-br from-indigo-500/20 to-indigo-600/10 backdrop-blur-md rounded-3xl p-8 border border-indigo-500/20 hover:border-indigo-500/40 transition-all duration-300">
            <div class="w-14 h-14 bg-indigo-500/30 rounded-2xl flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-3">Aman & Terpercaya</h3>
            <p class="text-white/60">Data survey terenkripsi dengan aman dan privasi responden dijamin kerahasiaannya.</p>
        </div>
        <div class="bg-gradient-to-br from-purple-500/20 to-purple-600/10 backdrop-blur-md rounded-3xl p-8 border border-purple-500/20 hover:border-purple-500/40 transition-all duration-300">
            <div class="w-14 h-14 bg-purple-500/30 rounded-2xl flex items-center justify-center mb-6">
                <svg class="w-7 h-7 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-3">Analisis Mendalam</h3>
            <p class="text-white/60">Hasil survey divisualisasikan dalam bentuk grafik yang informatif dan mudah dipahami.</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Chart colors
    const chartColors = {
        blue: ['#3B82F6', '#60A5FA', '#93C5FD', '#BFDBFE'],
        pie: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6']
    };
    
    // Data dari controller
    const layananCharts = @json($layananCharts);
    
    // Chart options
    const barOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                backgroundColor: 'rgba(15, 23, 42, 0.9)',
                titleColor: '#fff',
                bodyColor: '#fff',
                padding: 12,
                cornerRadius: 8,
                displayColors: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(255, 255, 255, 0.1)',
                    drawBorder: false
                },
                ticks: {
                    color: 'rgba(255, 255, 255, 0.6)',
                    font: {
                        family: 'Inter'
                    }
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    color: 'rgba(255, 255, 255, 0.6)',
                    font: {
                        family: 'Inter'
                    }
                }
            }
        }
    };
    
    const pieOptions = {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '60%',
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: 'rgba(255, 255, 255, 0.8)',
                    padding: 20,
                    usePointStyle: true,
                    pointStyle: 'circle',
                    font: {
                        family: 'Inter',
                        size: 12
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(15, 23, 42, 0.9)',
                titleColor: '#fff',
                bodyColor: '#fff',
                padding: 12,
                cornerRadius: 8
            }
        }
    };
    
    // Create charts untuk setiap layanan
    layananCharts.forEach((layanan, index) => {
        // Bar Chart
        const barCanvas = document.getElementById('barChart' + index);
        if (barCanvas) {
            const answers = layanan.answers || [];
            const labels = answers.length > 0 ? answers.map(a => a.jawaban) : ['Tidak Ada Data'];
            const data = answers.length > 0 ? answers.map(a => a.total) : [0];
            const totalLayanan = data.reduce((a, b) => a + b, 0);
            
            new Chart(barCanvas.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Jawaban',
                        data: data,
                        backgroundColor: chartColors.blue[0],
                        borderColor: chartColors.blue[1],
                        borderWidth: 1,
                        borderRadius: 8,
                        borderSkipped: false,
                    }]
                },
                options: barOptions
            });
        }
        
        // Pie Chart
        const pieCanvas = document.getElementById('pieChart' + index);
        if (pieCanvas) {
            const answers = layanan.answers || [];
            const labels = answers.length > 0 ? answers.map(a => a.jawaban) : ['Tidak Ada Data'];
            const data = answers.length > 0 ? answers.map(a => a.total) : [1];
            const totalLayanan = data.reduce((a, b) => a + b, 0);
            
            new Chart(pieCanvas.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: chartColors.pie,
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    ...pieOptions,
                    plugins: {
                        ...pieOptions.plugins,
                        tooltip: {
                            ...pieOptions.plugins.tooltip,
                            callbacks: {
                                label: function(context) {
                                    const value = context.raw;
                                    const percentage = totalLayanan > 0 ? ((value / totalLayanan) * 100).toFixed(1) : 0;
                                    return `${context.label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        }
    });
</script>
@endpush
