@extends('layouts.app')

@section('title', 'Edit Jawaban')
@section('header', 'Edit Jawaban')
@section('breadcrumb', 'Update jawaban')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200"><h2 class="text-lg font-semibold text-gray-800">Jawaban Information</h2></div>
        <form action="{{ route('admin.jawabans.update', $jawaban->id) }}" method="POST" class="p-6 space-y-6">
            @csrf @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pertanyaan</label>
                    <select name="pertanyaan_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('pertanyaan_id') border-red-500 @enderror">
                        <option value="">Select Pertanyaan</option>
                        @foreach($pertanyaans as $pertanyaan)
                        <option value="{{ $pertanyaan->id }}" {{ $jawaban->pertanyaan_id == $pertanyaan->id ? 'selected' : '' }}>{{ Str::limit($pertanyaan->pertanyaan, 60) }}</option>
                        @endforeach
                    </select>
                    @error('pertanyaan_id')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Responden</label>
                    <select name="responden_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('responden_id') border-red-500 @enderror">
                        <option value="">Select Responden</option>
                        @foreach($respondens as $responden)
                        <option value="{{ $responden->id }}" {{ $jawaban->responden_id == $responden->id ? 'selected' : '' }}>{{ $responden->nama }}</option>
                        @endforeach
                    </select>
                    @error('responden_id')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jawaban</label>
                <textarea name="jawaban" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('jawaban') border-red-500 @enderror">{{ old('jawaban', $jawaban->jawaban) }}</textarea>
                @error('jawaban')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-end space-x-4 pt-4 border-t">
                <a href="{{ route('admin.jawabans.index') }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
