@extends('layouts.app')

@section('title', 'Edit Pertanyaan')
@section('header', 'Edit Pertanyaan')
@section('breadcrumb', 'Update pertanyaan')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200"><h2 class="text-lg font-semibold text-gray-800">Pertanyaan Information</h2></div>
        <form action="{{ route('admin.pertanyaans.update', $pertanyaan->id) }}" method="POST" class="p-6 space-y-6">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pertanyaan</label>
                <textarea name="pertanyaan" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('pertanyaan') border-red-500 @enderror">{{ old('pertanyaan', $pertanyaan->pertanyaan) }}</textarea>
                @error('pertanyaan')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Layanan</label>
                <select name="layanan_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('layanan_id') border-red-500 @enderror">
                    <option value="">-- Pilih Layanan --</option>
                    @foreach($layanans as $layanan)
                    <option value="{{ $layanan->id }}" {{ old('layanan_id', $pertanyaan->layanan_id) == $layanan->id ? 'selected' : '' }}>{{ $layanan->nama }}</option>
                    @endforeach
                </select>
                @error('layanan_id')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-end space-x-4 pt-4 border-t">
                <a href="{{ route('admin.pertanyaans.index') }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
