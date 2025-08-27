<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Chat with {{ $chatPartnerName }}
        </h2>
    </x-slot>

    <!-- Include notification service -->
    <script src="{{ asset('js/notification-service.js') }}"></script>

    {{-- Main content that was previously in @section('content') now goes here directly --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- The container for chat itself, ensuring it doesn't try to be full viewport height on its own if not desired --}}
            {{-- The h-[calc(100vh-200px)] was from the old @section('content') top div, adjust if needed or make it part of a more specific inner div --}}
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="container mx-auto py-6 px-4 {{-- removed h-[calc(100vh-200px)] to be less prescriptive, height can be managed internally --}} flex flex-col" style="height: calc(100vh - 12rem);"> {{-- Example height, adjust as needed --}}

                    <!-- Chat History -->
                    <div id="chat-messages-container" class="flex-grow bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow overflow-y-auto space-y-4 mb-4">
                        @foreach ($allchats as $chatMessage)
                            <div class="flex @if ($chatMessage->user_id == Auth::id()) justify-end @else justify-start @endif">
                                <div class="max-w-md p-3 rounded-lg shadow @if ($chatMessage->user_id == Auth::id()) bg-blue-500 text-white @else bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 @endif">
                                    <p class="text-sm">{{ $chatMessage->message }}</p>
                                    <small class="text-xs opacity-75 block @if ($chatMessage->user_id == Auth::id()) text-blue-100 @else text-gray-500 dark:text-gray-300 @endif text-right mt-1">{{ $chatMessage->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Message Input Form -->
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('startdialogue') }}" method="post" id="send-message-form" class="bg-white dark:bg-gray-800 p-4 shadow rounded-t-none sm:rounded-b-lg"> {{-- Ensure form is part of the card or styled consistently --}}
                        @csrf
                        <input type="hidden" value="{{ $allchast->id }}" name="chat_id">
                        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                        <div class="flex items-center">
                            <input type="text" id="message-input" name="message" placeholder="Enter text here..." class="flex-grow p-3 border border-gray-300 dark:border-gray-600 rounded-l-md focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200 outline-none" autocomplete="off">
                            <button type="submit" class="bg-blue-500 text-white p-3 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-offset-gray-800">
                                <svg class="w-5 h-5 inline-block transform rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 16.571V11.69l5.728-2.455L10.894 2.553zM3 20a1 1 0 01-1-1v-2.571a1 1 0 01.22-.63L5.714 12 3 13.63V20zm14-1a1 1 0 01-1 1h-2.571a1 1 0 01-.63-.22L12 14.286l1.63-3L17 12.37V19z"></path></svg>
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const conversationId = {{ $allchast->id }};
        const currentUserId = {{ Auth::id() }};

        console.log('Chat Page: DOMContentLoaded. Attempting to connect to Echo for conversation ID:', conversationId);

        if (typeof Echo !== 'undefined') {
            Echo.private('chat.' + conversationId)
                .listen('\\App\\Events\\ChatMessageSent', (e) => {
                    console.log('Chat Page: ChatMessageSent event received:', e);

                    const chatMessagesContainer = document.getElementById('chat-messages-container');
                    if (!chatMessagesContainer) {
                        console.error('Chat messages container not found');
                        return;
                    }

                    const messageElement = document.createElement('div');
                    const isMyMessage = e.user_id === currentUserId;

                    // Show browser notification for messages from other users
                    if (!isMyMessage && window.notificationService && window.notificationService.shouldShowNotification()) {
                        const senderName = e.user ? e.user.name : 'Someone';
                        const chatUrl = window.location.href;
                        window.notificationService.showChatMessageNotification(
                            e.content,
                            senderName,
                            chatUrl
                        );
                    }

                    let messageClasses = ['p-3', 'rounded-lg', 'mb-2', 'max-w-md', 'shadow'];
                    let outerDivClasses = ['flex', 'mb-2'];

                    if (isMyMessage) {
                        messageClasses.push('bg-blue-500', 'text-white'); // Removed self-end, use justify-end on outer
                        outerDivClasses.push('justify-end');
                    } else {
                        messageClasses.push('bg-gray-200', 'dark:bg-gray-600', 'text-gray-800', 'dark:text-gray-100'); // Removed self-start
                        outerDivClasses.push('justify-start');
                    }

                    messageElement.classList.add(...messageClasses);
                    // Adjusted timestamp classes for better consistency
                    messageElement.innerHTML = `<p class="text-sm">${e.content}</p><small class="text-xs opacity-75 block mt-1 ${isMyMessage ? 'text-blue-100 text-right' : 'text-gray-500 dark:text-gray-300 text-right'}">${new Date(e.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</small>`;

                    const outerDiv = document.createElement('div');
                    outerDiv.classList.add(...outerDivClasses);
                    outerDiv.appendChild(messageElement);

                    chatMessagesContainer.appendChild(outerDiv);
                    chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
                })
                .error((error) => {
                    console.error('Chat Page: Echo channel error:', error);
                });

            if (window.Echo && window.Echo.connector && window.Echo.connector.pusher) {
                window.Echo.connector.pusher.connection.bind('state_change', function(states) {
                    console.log("Chat Page: Pusher connection state from " + states.previous + " to " + states.current);
                });
                window.Echo.connector.pusher.connection.bind('connected', () => {
                    console.log('Chat Page: Pusher connected successfully!');
                });
                window.Echo.connector.pusher.connection.bind('error', (err) => {
                    console.error('Chat Page: Pusher connection error:', err);
                });
            } else {
                console.warn('Chat Page: Pusher connector not available for binding state changes immediately after Echo init.');
            }
        } else {
            console.error('Chat Page: Echo is not defined after DOMContentLoaded!');
        }

        const messageForm = document.getElementById('send-message-form');
        const messageInput = document.getElementById('message-input');
        if (messageForm && messageInput) {
            messageForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const messageText = messageInput.value;
                if (messageText.trim() === '') return;
                messageInput.value = '';
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        chat_id: conversationId,
                        user_id: currentUserId,
                        message: messageText
                    })
                })
                .then(response => {
                    if (!response.ok) {
                         response.json().then(errData => {
                            console.error('Error sending message - Server responded with:', errData);
                        }).catch(() => {
                            console.error('Error sending message - Server response not JSON:', response);
                        });
                    }
                })
                .catch(error => {
                    console.error('Fetch error sending message:', error);
                });
            });
        } else {
            console.warn('Chat Page: Message form or input field not found for AJAX setup.');
        }
        // Scroll to bottom on page load for existing messages
        const chatMessagesContainerOnLoad = document.getElementById('chat-messages-container');
        if(chatMessagesContainerOnLoad){
            chatMessagesContainerOnLoad.scrollTop = chatMessagesContainerOnLoad.scrollHeight;
        }
    });
    </script>
    @endpush
</x-app-layout>