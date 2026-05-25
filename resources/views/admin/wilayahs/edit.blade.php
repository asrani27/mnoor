@extends('layouts.app')

@section('title', 'Edit Wilayah')
@section('header', 'Edit Wilayah')
@section('breadcrumb', 'Update wilayah')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200"><h2 class="text-lg font-semibold text-gray-800">Wilayah Information</h2></div>
        <form action="{{ route('admin.wilayahs.update', $wilayah->id) }}" method="POST" class="p-6 space-y-6">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kode</label>
                <input type="text" name="kode" value="{{ old('kode', $wilayah->kode) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('kode') border-red-500 @enderror">
                @error('kode')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $wilayah->nama) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('nama') border-red-500 @enderror">
                @error('nama')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-end space-x-4 pt-4 border-t">
                <a href="{{ route('admin.wilayahs.index') }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
