@extends('layouts.user')

@section('title', 'Rating')
@section('header', 'Rating')
@section('breadcrumb', 'Beri Penilaian')

@section('content')
    <!-- Info Card -->
    <div class="mb-8">
        <div class="bg-gradient-to-r from-amber-500 to-orange-500 rounded-2xl p-6 text-white">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-xl font-bold mb-2">Beri Rating Layanan</h2>
                    <p class="text-white/80 text-sm">Nilai pengalaman Anda dengan memberikan rating bintang.</p>
                </div>
                <div class="bg-white/20 rounded-lg p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Rating Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Form Rating</h3>
        </div>
        
        <div class="p-6">
            <form action="{{ route('user.rating.store') }}" method="POST">
                @csrf
                
                <!-- Service Selection -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Layanan</label>
                    <select name="layanan_id" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
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

                <!-- Star Rating -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-4">Rating Anda</label>
                    <div class="flex items-center space-x-2" id="star-rating">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" onclick="setRating({{ $i }})" class="star-btn transition-transform hover:scale-110" data-value="{{ $i }}">
                                <svg class="w-12 h-12 text-gray-300 star-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                            </button>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating-input" value="{{ old('rating') }}">
                    <p class="text-sm text-gray-500 mt-2" id="rating-label">Klik bintang untuk memberikan rating</p>
                    @error('rating')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 transition-colors flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Kirim Rating
                </button>
            </form>
        </div>
    </div>

    <!-- Recent Ratings -->
    @if(isset($recentRatings) && $recentRatings->count() > 0)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-800">Rating Saya</h3>
            </div>
            
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($recentRatings as $rating)
                        <div class="flex items-start p-4 bg-gray-50 rounded-lg">
                            <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="font-medium text-gray-800">{{ $rating->layanan->nama ?? 'Layanan' }}</h4>
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $rating->rating ? 'text-amber-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                                @if($rating->komentar)
                                    <p class="text-sm text-gray-600 mb-2">{{ $rating->komentar }}</p>
                                @endif
                                <p class="text-xs text-gray-400">{{ $rating->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Rating Guide -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mt-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <svg class="w-5 h-5 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Panduan Rating
        </h3>
        <div class="grid grid-cols-5 gap-4 text-center">
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="flex justify-center mb-2">
                    <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-800">1</p>
                <p class="text-xs text-gray-500">Sangat Buruk</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="flex justify-center mb-2">
                    <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-800">2</p>
                <p class="text-xs text-gray-500">Buruk</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="flex justify-center mb-2">
                    <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-800">3</p>
                <p class="text-xs text-gray-500">Cukup</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="flex justify-center mb-2">
                    <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-800">4</p>
                <p class="text-xs text-gray-500">Baik</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <div class="flex justify-center mb-2">
                    <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-gray-800">5</p>
                <p class="text-xs text-gray-500">Sangat Baik</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let currentRating = document.getElementById('rating-input').value || 0;
    
    function setRating(rating) {
        currentRating = rating;
        document.getElementById('rating-input').value = rating;
        updateStars(rating);
        
        const labels = [
            'Klik bintang untuk memberikan rating',
            'Sangat Buruk',
            'Buruk',
            'Cukup',
            'Baik',
            'Sangat Baik'
        ];
        document.getElementById('rating-label').textContent = labels[rating];
    }
    
    function updateStars(rating) {
        const stars = document.querySelectorAll('.star-btn');
        stars.forEach((star, index) => {
            const icon = star.querySelector('.star-icon');
            if (index < rating) {
                icon.classList.remove('text-gray-300');
                icon.classList.add('text-amber-400');
            } else {
                icon.classList.remove('text-amber-400');
                icon.classList.add('text-gray-300');
            }
        });
    }
    
    // Initialize stars on page load
    if (currentRating > 0) {
        updateStars(currentRating);
        const labels = ['Klik bintang untuk memberikan rating', 'Sangat Buruk', 'Buruk', 'Cukup', 'Baik', 'Sangat Baik'];
        document.getElementById('rating-label').textContent = labels[currentRating];
    }
</script>
@endpush
