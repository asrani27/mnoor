@extends('layouts.app')

@section('title', 'Kritik')
@section('header', 'Kritik')
@section('breadcrumb', 'Manage kritik')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">All Kritik</h2>
                <p class="text-sm text-gray-500 mt-1">Manage kritik data</p>
            </div>
            <a href="{{ route('admin.kritiks.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700">Add Kritik</a>
        </div>
    </div>

    <div class="p-4 border-b border-gray-200">
        <form action="{{ route('admin.kritiks.index') }}" method="GET" class="flex items-center">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
            <button type="submit" class="ml-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Search</button>
        </form>
    </div>

    @if(session('success'))<div class="mx-6 mt-4 p-4 bg-green-50 border border-green-200 rounded-lg"><span class="text-sm text-green-700">{{ session('success') }}</span></div>@endif

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-indigo-600">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Responden</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Layanan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Isi Kritik</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase">Tindak Lanjut</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-white uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($kritiks as $kritik)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $kritik->responden->nama ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $kritik->layanan->nama ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($kritik->isi_kritik, 50) }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($kritik->tindak_lanjut, 50) }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('admin.kritiks.edit', $kritik->id) }}" class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></a>
                            <form action="{{ route('admin.kritiks.destroy', $kritik->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button></form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-12 text-center text-gray-500">No kritik found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($kritiks->hasPages())<div class="px-6 py-4 border-t">{{ $kritiks->links() }}</div>@endif
</div>
@endsection
