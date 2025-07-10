@extends('admin.layout')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Chats -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-comments text-primary-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalChats }}</h3>
                <p class="text-gray-600">Total Chats</p>
            </div>
        </div>
    </div>

    <!-- Active Chats -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-circle text-green-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $activeChats }}</h3>
                <p class="text-gray-600">Active Chats</p>
            </div>
        </div>
    </div>

    <!-- Unread Messages -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-envelope text-red-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $unreadMessages }}</h3>
                <p class="text-gray-600">Unread Messages</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('admin.chat') }}" class="flex items-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition duration-300">
                <i class="fas fa-comments text-primary-600 text-xl mr-4"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">Manage Chats</h4>
                    <p class="text-sm text-gray-600">View and respond to customer messages</p>
                </div>
            </a>
            <a href="{{ route('home') }}" class="flex items-center p-4 bg-secondary-50 rounded-lg hover:bg-secondary-100 transition duration-300">
                <i class="fas fa-globe text-secondary-600 text-xl mr-4"></i>
                <div>
                    <h4 class="font-semibold text-gray-800">View Portfolio</h4>
                    <p class="text-sm text-gray-600">Check your public portfolio website</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
