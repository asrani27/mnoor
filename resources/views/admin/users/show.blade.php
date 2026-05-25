@extends('layouts.app')

@section('title', 'User Details')
@section('header', 'User Details')
@section('breadcrumb', 'View user information')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800">User Information</h2>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Back
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="flex items-center mb-6">
                <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 text-2xl font-bold">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div class="ml-6">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $user->name }}</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $user->role === 'admin' ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Username</label>
                    <p class="text-gray-900">{{ $user->username }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                    <p class="text-gray-900">{{ $user->email }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Role</label>
                    <p class="text-gray-900 capitalize">{{ $user->role }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Created At</label>
                    <p class="text-gray-900">{{ $user->created_at->format('F d, Y h:i A') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Last Updated</label>
                    <p class="text-gray-900">{{ $user->updated_at->format('F d, Y h:i A') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
