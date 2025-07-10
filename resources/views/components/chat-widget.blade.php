<!-- Chat Widget -->
<div id="chatWidget" class="fixed bottom-6 right-6 z-50">
    <!-- Chat Button -->
    <div id="chatButton" class="bg-gradient-to-r from-primary-600 to-secondary-600 text-white w-16 h-16 rounded-full shadow-2xl cursor-pointer flex items-center justify-center hover:from-primary-700 hover:to-secondary-700 transition duration-300 transform hover:scale-110">
        <i class="fas fa-comments text-xl"></i>
        <div id="unreadBadge" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-6 h-6 rounded-full flex items-center justify-center hidden">0</div>
    </div>

    <!-- Chat Window -->
    <div id="chatWindow" class="hidden absolute bottom-20 right-0 w-80 h-96 bg-white rounded-2xl shadow-2xl border border-gray-200 flex flex-col overflow-hidden">
        <!-- Chat Header -->
        <div class="bg-gradient-to-r from-primary-600 to-secondary-600 text-white p-4 flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-user text-sm"></i>
                </div>
                <div>
                    <h3 class="font-semibold">Dian Gita Meilani</h3>
                    <p class="text-xs text-blue-100">Online</p>
                </div>
            </div>
            <button id="closeChatBtn" class="text-white hover:text-gray-200 transition duration-300">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Loading State -->
        <div id="loadingState" class="hidden p-4 flex-1 flex flex-col justify-center items-center text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-primary-100 to-secondary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-spinner fa-spin text-primary-600 text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Loading...</h3>
            <p class="text-gray-600 text-sm">Please wait while we set up your chat.</p>
        </div>

        <!-- Authentication Required Message -->
        <div id="authRequired" class="hidden p-4 flex-1 flex flex-col justify-center items-center text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-primary-100 to-secondary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-lock text-primary-600 text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Login Required</h3>
            <p class="text-gray-600 text-sm mb-6">Please login or register to start chatting with me.</p>
            <div class="space-y-3 w-full">
                <a href="{{ route('login') }}" class="block w-full bg-gradient-to-r from-primary-600 to-secondary-600 text-white py-2 px-4 rounded-lg font-medium hover:from-primary-700 hover:to-secondary-700 transition duration-300 text-center">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
                <a href="{{ route('register') }}" class="block w-full bg-white border-2 border-primary-600 text-primary-600 py-2 px-4 rounded-lg font-medium hover:bg-primary-50 transition duration-300 text-center">
                    <i class="fas fa-user-plus mr-2"></i>Register
                </a>
            </div>
        </div>

        <!-- Error State -->
        <div id="errorState" class="hidden p-4 flex-1 flex flex-col justify-center items-center text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-red-100 to-red-200 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Connection Error</h3>
            <p class="text-gray-600 text-sm mb-4" id="errorMessage">Something went wrong. Please try again.</p>
            <button onclick="retryConnection()" class="bg-gradient-to-r from-primary-600 to-secondary-600 text-white py-2 px-4 rounded-lg font-medium hover:from-primary-700 hover:to-secondary-700 transition duration-300">
                <i class="fas fa-redo mr-2"></i>Retry
            </button>
        </div>

        <!-- Chat Messages -->
        <div id="chatMessages" class="hidden flex-1 flex flex-col">
            <div id="messagesList" class="flex-1 p-4 overflow-y-auto space-y-3 max-h-64">
                <!-- Messages will be loaded here -->
            </div>
            
            <!-- Message Input -->
            <div class="p-4 border-t border-gray-200">
                <form id="sendMessageForm" class="flex space-x-2">
                    <input type="text" id="messageInput" placeholder="Type your message..." required
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-sm">
                    <button type="submit" class="bg-gradient-to-r from-primary-600 to-secondary-600 text-white px-4 py-2 rounded-lg hover:from-primary-700 hover:to-secondary-700 transition duration-300">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
let chatSessionId = null;
let userName = null;
let messagePolling = null;
let isAuthenticated = false;

document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById('chatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeChatBtn = document.getElementById('closeChatBtn');
    const loadingState = document.getElementById('loadingState');
    const authRequired = document.getElementById('authRequired');
    const errorState = document.getElementById('errorState');
    const chatMessages = document.getElementById('chatMessages');
    const sendMessageForm = document.getElementById('sendMessageForm');

    // Toggle chat window
    chatButton.addEventListener('click', function() {
        chatWindow.classList.toggle('hidden');
        if (!chatWindow.classList.contains('hidden')) {
            console.log('Chat window opened, checking auth status...');
            checkAuthStatus();
        }
    });

    // Close chat window
    closeChatBtn.addEventListener('click', function() {
        chatWindow.classList.add('hidden');
        if (messagePolling) {
            clearInterval(messagePolling);
            messagePolling = null;
        }
    });

    // Send message
    sendMessageForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!isAuthenticated || !chatSessionId) {
            console.log('Cannot send message: authenticated =', isAuthenticated, 'sessionId =', chatSessionId);
            showError('Please login and start a chat session first');
            return;
        }
        
        const messageInput = document.getElementById('messageInput');
        const message = messageInput.value.trim();

        if (!message) {
            console.log('Empty message, not sending');
            return;
        }

        console.log('Sending message:', message, 'to session:', chatSessionId);

        // Disable input while sending
        messageInput.disabled = true;
        const submitBtn = sendMessageForm.querySelector('button[type="submit"]');
        const originalBtnContent = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        submitBtn.disabled = true;

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                throw new Error('CSRF token not found');
            }

            console.log('Making request to /chat/send with CSRF token');
        
            const response = await fetch('/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    session_id: chatSessionId,
                    message: message
                })
            });

            console.log('Response status:', response.status);
            console.log('Response headers:', response.headers);

            const data = await response.json();
            console.log('Send message response:', data);

            if (response.ok && data.success) {
                messageInput.value = '';
                console.log('Message sent successfully, loading messages...');
                await loadMessages();
            } else {
                console.error('Error sending message:', data);
                let errorMsg = 'Failed to send message';
                if (data.error) {
                    errorMsg += ': ' + data.error;
                }
                if (data.details) {
                    errorMsg += ' (' + JSON.stringify(data.details) + ')';
                }
                showError(errorMsg);
            }
        } catch (error) {
            console.error('Network error sending message:', error);
            showError('Network error: ' + error.message);
        } finally {
            // Re-enable input
            messageInput.disabled = false;
            submitBtn.innerHTML = originalBtnContent;
            submitBtn.disabled = false;
            messageInput.focus();
        }
    });

    async function checkAuthStatus() {
        console.log('Checking authentication status...');
        showLoading();

        try {
            const response = await fetch('/chat/status');
            const data = await response.json();
            console.log('Auth status response:', data);

            isAuthenticated = data.authenticated;

            if (!isAuthenticated) {
                console.log('User not authenticated');
                showAuthRequired();
            } else {
                console.log('User authenticated:', data.user_name);
                userName = data.user_name;
                if (data.active_session) {
                    console.log('Found active session:', data.active_session);
                    chatSessionId = data.active_session;
                    showChatMessages();
                    loadMessages();
                    startMessagePolling();
                } else {
                    console.log('No active session, starting new chat...');
                    startChat();
                }
            }
        } catch (error) {
            console.error('Error checking auth status:', error);
            showError('Failed to check authentication status');
        }
    }

    function showLoading() {
        hideAllStates();
        loadingState.classList.remove('hidden');
    }

    function showAuthRequired() {
        hideAllStates();
        authRequired.classList.remove('hidden');
    }

    function showError(message) {
        hideAllStates();
        document.getElementById('errorMessage').textContent = message;
        errorState.classList.remove('hidden');
    }

    function showChatMessages() {
        hideAllStates();
        chatMessages.classList.remove('hidden');
    }

    function hideAllStates() {
        loadingState.classList.add('hidden');
        authRequired.classList.add('hidden');
        errorState.classList.add('hidden');
        chatMessages.classList.add('hidden');
    }

    async function startChat() {
        if (!isAuthenticated) {
            console.log('Cannot start chat: not authenticated');
            return;
        }

        console.log('Starting new chat...');

        try {
            const response = await fetch('/chat/start', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            const data = await response.json();
            console.log('Start chat response:', data);

            if (data.success) {
                chatSessionId = data.session_id;
                console.log('Chat started with session ID:', chatSessionId);
                showChatMessages();
                loadMessages();
                startMessagePolling();
            } else {
                console.error('Failed to start chat:', data.error);
                showError('Failed to start chat: ' + (data.error || 'Unknown error'));
            }
        } catch (error) {
            console.error('Error starting chat:', error);
            showError('Network error while starting chat');
        }
    }

    async function loadMessages() {
        if (!chatSessionId || !isAuthenticated) {
            console.log('Cannot load messages: no session or not authenticated');
            return;
        }

        console.log('Loading messages for session:', chatSessionId);

        try {
            const response = await fetch(`/chat/messages/${chatSessionId}`);
            const data = await response.json();
            console.log('Load messages response:', data);

            if (data.success) {
                displayMessages(data.messages);
            } else {
                console.error('Failed to load messages:', data.error);
            }
        } catch (error) {
            console.error('Error loading messages:', error);
        }
    }

    function displayMessages(messages) {
        const messagesList = document.getElementById('messagesList');
        messagesList.innerHTML = '';

        console.log('Displaying', messages.length, 'messages');

        messages.forEach(message => {
            const messageDiv = document.createElement('div');
            messageDiv.className = `flex ${message.sender_type === 'visitor' ? 'justify-end' : 'justify-start'}`;

            const messageBubble = document.createElement('div');
            messageBubble.className = `max-w-xs px-3 py-2 rounded-lg text-sm ${
                message.sender_type === 'visitor' 
                    ? 'bg-gradient-to-r from-primary-600 to-secondary-600 text-white' 
                    : 'bg-gray-100 text-gray-800'
            }`;
            messageBubble.textContent = message.message;

            messageDiv.appendChild(messageBubble);
            messagesList.appendChild(messageDiv);
        });

        messagesList.scrollTop = messagesList.scrollHeight;
    }

    function startMessagePolling() {
        if (messagePolling) clearInterval(messagePolling);
        console.log('Starting message polling...');
        messagePolling = setInterval(loadMessages, 3000); // Poll every 3 seconds
    }

    // Global retry function
    window.retryConnection = function() {
        console.log('Retrying connection...');
        checkAuthStatus();
    };

    // Stop polling when chat window is closed
    closeChatBtn.addEventListener('click', function() {
        if (messagePolling) {
            clearInterval(messagePolling);
            messagePolling = null;
            console.log('Message polling stopped');
        }
    });

    function showChatError(message) {
        const messagesList = document.getElementById('messagesList');
        const errorDiv = document.createElement('div');
        errorDiv.className = 'flex justify-center';
        errorDiv.innerHTML = `
            <div class="bg-red-100 border border-red-300 text-red-700 px-3 py-2 rounded-lg text-sm max-w-xs">
                <i class="fas fa-exclamation-triangle mr-2"></i>${message}
            </div>
        `;
        messagesList.appendChild(errorDiv);
        messagesList.scrollTop = messagesList.scrollHeight;
    }

    // Handle responsive positioning
    function adjustChatPosition() {
        const chatWidget = document.getElementById('chatWidget');
        const chatWindow = document.getElementById('chatWindow');
        
        if (window.innerWidth < 768) { // Mobile
            chatWidget.className = 'fixed bottom-4 right-4 z-50';
            chatWindow.className = chatWindow.className.replace('right-0', 'right-0').replace('w-80', 'w-72');
        } else { // Desktop
            chatWidget.className = 'fixed bottom-6 right-6 z-50';
        }
    }

    // Adjust position on load and resize
    adjustChatPosition();
    window.addEventListener('resize', adjustChatPosition);
});
</script>
