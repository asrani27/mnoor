@extends('layouts.app')

@section('title', 'Edit Kritik')
@section('header', 'Edit Kritik')
@section('breadcrumb', 'Update kritik')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200"><h2 class="text-lg font-semibold text-gray-800">Kritik Information</h2></div>
        <form action="{{ route('admin.kritiks.update', $kritik->id) }}" method="POST" class="p-6 space-y-6">
            @csrf @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Layanan</label>
                    <select name="layanan_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('layanan_id') border-red-500 @enderror">
                        <option value="">Select Layanan</option>
                        @foreach($layanans as $layanan)
                        <option value="{{ $layanan->id }}" {{ $kritik->layanan_id == $layanan->id ? 'selected' : '' }}>{{ $layanan->nama }}</option>
                        @endforeach
                    </select>
                    @error('layanan_id')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Responden</label>
                    <select name="responden_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('responden_id') border-red-500 @enderror">
                        <option value="">Select Responden</option>
                        @foreach($respondens as $responden)
                        <option value="{{ $responden->id }}" {{ $kritik->responden_id == $responden->id ? 'selected' : '' }}>{{ $responden->nama }}</option>
                        @endforeach
                    </select>
                    @error('responden_id')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Isi Kritik</label>
                <textarea name="isi_kritik" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('isi_kritik') border-red-500 @enderror">{{ old('isi_kritik', $kritik->isi_kritik) }}</textarea>
                @error('isi_kritik')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tindak Lanjut <span class="text-gray-400">(optional)</span></label>
                <textarea name="tindak_lanjut" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('tindak_lanjut') border-red-500 @enderror">{{ old('tindak_lanjut', $kritik->tindak_lanjut) }}</textarea>
                @error('tindak_lanjut')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-end space-x-4 pt-4 border-t">
                <a href="{{ route('admin.kritiks.index') }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
