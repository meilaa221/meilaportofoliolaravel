@extends('admin.layout')

@section('title', 'Chat with ' . $session->display_name)
@section('header', 'Chat with ' . $session->display_name)

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
    <!-- Chat Messages -->
    <div class="lg:col-span-3">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 h-96 flex flex-col">
            <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $session->display_name }}</h3>
                        <p class="text-sm text-gray-600">{{ $session->display_email }}</p>
                        @if($session->user)
                            <p class="text-xs text-green-600 font-medium">
                                <i class="fas fa-check-circle mr-1"></i>Registered User
                            </p>
                        @else
                            <p class="text-xs text-gray-500">
                                <i class="fas fa-user-times mr-1"></i>Guest User
                            </p>
                        @endif
                    </div>
                </div>
                <div class="flex space-x-2">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $session->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($session->status) }}
                    </span>
                    @if($session->status === 'active')
                    <button onclick="closeChat()" class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full hover:bg-red-200 transition duration-300">
                        Close Chat
                    </button>
                    @endif
                </div>
            </div>
            
            <div id="messagesContainer" class="flex-1 p-4 overflow-y-auto space-y-3">
                @foreach($messages as $message)
                <div class="flex {{ $message->sender_type === 'admin' ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-xs lg:max-w-md">
                        <div class="px-4 py-2 rounded-lg {{ $message->sender_type === 'admin' ? 'bg-primary-600 text-white' : 'bg-gray-100 text-gray-800' }}">
                            {{ $message->message }}
                        </div>
                        <div class="text-xs text-gray-500 mt-1 {{ $message->sender_type === 'admin' ? 'text-right' : 'text-left' }}">
                            {{ $message->sender_name }} • {{ $message->created_at->format('H:i') }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            @if($session->status === 'active')
            <div class="p-4 border-t border-gray-200">
                <form id="replyForm" class="flex space-x-2">
                    @csrf
                    <input type="text" id="replyMessage" placeholder="Type your reply..." required
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition duration-300">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
    
    <!-- Chat Info -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h4 class="font-semibold text-gray-800 mb-4">Chat Information</h4>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-gray-600">User Name</label>
                    <p class="text-gray-800">{{ $session->display_name }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Email</label>
                    <p class="text-gray-800">{{ $session->display_email }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">User Type</label>
                    <p class="text-gray-800">
                        @if($session->user)
                            <span class="text-green-600 font-medium">
                                <i class="fas fa-check-circle mr-1"></i>Registered
                            </span>
                        @else
                            <span class="text-gray-500">
                                <i class="fas fa-user-times mr-1"></i>Guest
                            </span>
                        @endif
                    </p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Started</label>
                    <p class="text-gray-800">{{ $session->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Last Activity</label>
                    <p class="text-gray-800">{{ $session->updated_at->diffForHumans() }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Total Messages</label>
                    <p class="text-gray-800">{{ $session->messages->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let messagePolling = null;

document.addEventListener('DOMContentLoaded', function() {
    const replyForm = document.getElementById('replyForm');
    
    if (replyForm) {
        replyForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const messageInput = document.getElementById('replyMessage');
            const message = messageInput.value.trim();
            
            if (!message) return;
            
            try {
                const response = await fetch(`/admin/chat/{{ $session->id }}/reply`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ message })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    messageInput.value = '';
                    location.reload(); // Reload to show new message
                }
            } catch (error) {
                console.error('Error sending reply:', error);
            }
        });
    }
    
    // Auto-scroll to bottom
    const container = document.getElementById('messagesContainer');
    container.scrollTop = container.scrollHeight;
});

async function closeChat() {
    if (!confirm('Are you sure you want to close this chat?')) return;
    
    try {
        const response = await fetch(`/admin/chat/{{ $session->id }}/close`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            location.reload();
        }
    } catch (error) {
        console.error('Error closing chat:', error);
    }
}
</script>
@endsection
