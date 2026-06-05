@extends('layouts.user')

@section('title', 'Jawab Pertanyaan')
@section('header', 'Jawab Pertanyaan')
@section('breadcrumb', 'Survey Kepuasan')

@section('content')
    <!-- Info Card -->
    <div class="mb-8">
        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl p-6 text-white">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-xl font-bold mb-2">Survey Kepuasan Masyarakat</h2>
                    <p class="text-white/80 text-sm">Silakan jawab pertanyaan di bawah ini sesuai dengan pengalaman Anda.</p>
                </div>
                <div class="bg-white/20 rounded-lg p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Questions Form -->
    <form action="{{ route('user.jawab-pertanyaan.store') }}" method="POST">
        @csrf
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Daftar Pertanyaan</h3>
                    <span class="text-sm text-gray-500">
                        {{ $answeredCount ?? 0 }} / {{ $totalPertanyaan ?? 0 }} dijawab
                    </span>
                </div>
            </div>
            
            <div class="p-6">
                @if(isset($pertanyaans) && $pertanyaans->count() > 0)
                
                    <div class="space-y-6">
                        @foreach($pertanyaans as $index => $pertanyaan)
                            <div class="border border-gray-200 rounded-xl p-6 hover:border-indigo-300 transition-colors">
                                <div class="flex items-start mb-4">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                        <span class="text-indigo-600 font-semibold text-sm">{{ $index + 1 }}</span>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-800 font-medium">{{ $pertanyaan->pertanyaan }}</p>
                                        <p class="text-xs text-gray-500 mt-1">Layanan: {{ $pertanyaan->layanan->nama ?? 'Umum' }}</p>
                                    </div>
                                </div>
                                
                                <div class="ml-11">
                                    <!-- Check if already answered -->
                                    @php
                                        $existingAnswer = $pertanyaan->jawabans->where('responden_id', Auth::user()->responden->id ?? null)->first();
                                    @endphp
                                    
                                    @if($existingAnswer)
                                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-sm text-green-800">Sudah dijawab: <strong>{{ $existingAnswer->jawaban }}</strong></span>
                                            </div>
                                            <button type="button" onclick="toggleEdit({{ $pertanyaan->id }})" class="text-sm text-indigo-600 hover:text-indigo-800">
                                                Ubah Jawaban
                                            </button>
                                        </div>
                                        <div id="edit-form-{{ $pertanyaan->id }}" class="hidden mt-4">
                                            <input type="hidden" name="pertanyaan_id[]" value="{{ $pertanyaan->id }}">
                                            <div class="flex flex-wrap gap-4">
                                                @foreach(['Sangat Puas', 'Puas', 'Cukup Puas', 'Kurang', 'Sangat Kurang'] as $option)
                                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-indigo-50 transition-colors {{ $existingAnswer->jawaban == $option ? 'bg-indigo-100 border-indigo-300' : '' }}">
                                                        <input type="radio" name="jawaban[{{ $pertanyaan->id }}]" value="{{ $option }}" class="w-4 h-4 text-indigo-600 focus:ring-indigo-500" {{ $existingAnswer->jawaban == $option ? 'checked' : '' }}>
                                                        <span class="ml-2 text-sm text-gray-700">{{ $option }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <input type="hidden" name="pertanyaan_id[]" value="{{ $pertanyaan->id }}">
                                        <div class="flex flex-wrap gap-4">
                                            @foreach(['Sangat Puas', 'Puas', 'Cukup Puas', 'Kurang', 'Sangat Kurang'] as $option)
                                                <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-indigo-50 transition-colors">
                                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]" value="{{ $option }}" class="w-4 h-4 text-indigo-600 focus:ring-indigo-500" required>
                                                    <span class="ml-2 text-sm text-gray-700">{{ $option }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-500">Belum ada pertanyaan tersedia saat ini.</p>
                    </div>
                @endif
            </div>
            
            @if(isset($pertanyaans) && $pertanyaans->count() > 0)
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Jawaban
                    </button>
                </div>
            @endif
        </div>
    </form>

    <!-- Tips Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <svg class="w-5 h-5 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Petunjuk Pengisian
        </h3>
        <div class="space-y-3 text-sm text-gray-600">
            <div class="flex items-start">
                <span class="w-6 h-6 bg-indigo-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0 text-indigo-600 font-semibold text-xs">1</span>
                <p>Baca setiap pertanyaan dengan teliti</p>
            </div>
            <div class="flex items-start">
                <span class="w-6 h-6 bg-indigo-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0 text-indigo-600 font-semibold text-xs">2</span>
                <p>Pilih jawaban yang paling sesuai dengan pengalaman Anda</p>
            </div>
            <div class="flex items-start">
                <span class="w-6 h-6 bg-indigo-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0 text-indigo-600 font-semibold text-xs">3</span>
                <p>Isi semua pertanyaan yang tersedia</p>
            </div>
            <div class="flex items-start">
                <span class="w-6 h-6 bg-indigo-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0 text-indigo-600 font-semibold text-xs">4</span>
                <p>Klik "Simpan Jawaban" setelah menyelesaikan semua pertanyaan</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function toggleEdit(id) {
        const editForm = document.getElementById('edit-form-' + id);
        editForm.classList.toggle('hidden');
    }
</script>
@endpush
