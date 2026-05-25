@extends('layouts.app')

@section('title', 'Create Responden')
@section('header', 'Create Responden')
@section('breadcrumb', 'Add new responden')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200"><h2 class="text-lg font-semibold text-gray-800">Responden Information</h2></div>
        <form action="{{ route('admin.respondens.store') }}" method="POST" class="p-6 space-y-6">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Wilayah</label>
                    <select name="wilayah_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('wilayah_id') border-red-500 @enderror">
                        <option value="">Select Wilayah</option>
                        @foreach($wilayahs as $wilayah)
                        <option value="{{ $wilayah->id }}">{{ $wilayah->nama }}</option>
                        @endforeach
                    </select>
                    @error('wilayah_id')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Layanan</label>
                    <select name="layanan_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('layanan_id') border-red-500 @enderror">
                        <option value="">Select Layanan</option>
                        @foreach($layanans as $layanan)
                        <option value="{{ $layanan->id }}">{{ $layanan->nama }}</option>
                        @endforeach
                    </select>
                    @error('layanan_id')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('nama') border-red-500 @enderror">
                @error('nama')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                    <select name="jkel" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('jkel') border-red-500 @enderror">
                        <option value="">Select</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    @error('jkel')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('pekerjaan') border-red-500 @enderror">
                    @error('pekerjaan')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                <textarea name="alamat" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('alamat') border-red-500 @enderror">{{ old('alamat') }}</textarea>
                @error('alamat')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Telp</label>
                <input type="text" name="telp" value="{{ old('telp') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('telp') border-red-500 @enderror">
                @error('telp')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-end space-x-4 pt-4 border-t">
                <a href="{{ route('admin.respondens.index') }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
