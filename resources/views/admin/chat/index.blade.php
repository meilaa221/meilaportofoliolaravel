@extends('admin.layout')

@section('title', 'Chat Management')
@section('header', 'Live Chat Management')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Chat Sessions</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Message</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unread</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($chatSessions as $session)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $session->display_name }}</div>
                                <div class="text-sm text-gray-500">{{ $session->display_email }}</div>
                                @if($session->user)
                                    <div class="text-xs text-green-600 font-medium">
                                        <i class="fas fa-check-circle mr-1"></i>Registered User
                                    </div>
                                @else
                                    <div class="text-xs text-gray-500">
                                        <i class="fas fa-user-times mr-1"></i>Guest User
                                    </div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $session->latestMessage ? Str::limit($session->latestMessage->message, 50) : 'No messages yet' }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $session->updated_at->diffForHumans() }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $session->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($session->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($session->unreadMessages->count() > 0)
                            <span class="px-2 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full">
                                {{ $session->unreadMessages->count() }}
                            </span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.chat.show', $session) }}" class="text-primary-600 hover:text-primary-900 mr-3">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        No chat sessions found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($chatSessions->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $chatSessions->links() }}
    </div>
    @endif
</div>
@endsection
