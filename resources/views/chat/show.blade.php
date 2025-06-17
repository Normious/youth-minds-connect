@extends('layouts.app')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Chat with Therapist (Conversation ID: ') . $conversation->id . __(')') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Chat messages container -->
                <div id="chat-messages" class="h-96 overflow-y-auto border border-gray-300 dark:border-gray-700 rounded-lg p-4 space-y-4 bg-gray-50 dark:bg-gray-900">
                    @foreach($messages as $message)
                        @if($message->user_id === auth()->id())
                            <div class="flex justify-end">
                                <div class="bg-blue-500 text-white rounded-lg py-2 px-4 max-w-xs lg:max-w-md shadow">
                                    <p class="text-sm">{{ $message->content }}</p>
                                    <small class="text-xs opacity-75 block text-right mt-1">{{ $message->created_at->format('H:i') }}</small>
                                </div>
                            </div>
                        @else
                            <div class="flex justify-start">
                                <div class="bg-gray-200 text-gray-800 rounded-lg py-2 px-4 max-w-xs lg:max-w-md shadow">
                                    <p class="text-sm">{{ $message->content }}</p>
                                    <small class="text-xs text-gray-500 block text-left mt-1">{{ $message->created_at->format('H:i') }}</small>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Message input form -->
                <form id="chat-form" action="{{ route('chat.send') }}" method="POST" class="mt-6 flex">
                    @csrf
                    <input type="hidden" name="conversation_id" value="{{ $conversation->id }}">
                    <input type="text" id="message-input" name="message" placeholder="Type your message here..." class="flex-grow p-3 border border-gray-300 dark:border-gray-600 rounded-l-md focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200 outline-none">
                    <button type="submit" class="bg-blue-500 text-white p-3 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:ring-offset-gray-800 transition duration-150 ease-in-out">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const chatMessages = document.getElementById('chat-messages');
    const userId = {{ auth()->id() }};
    const conversationId = {{ $conversation->id }};

    // Function to append a message to the chat
    function appendMessage(messageData) {
        const messageWrapper = document.createElement('div');
        const messageBubble = document.createElement('div');
        const messageContent = document.createElement('p');
        const messageTimestamp = document.createElement('small');

        messageContent.textContent = messageData.content;
        messageContent.classList.add('text-sm');

        messageTimestamp.textContent = new Date(messageData.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        messageTimestamp.classList.add('text-xs', 'block', 'mt-1');

        if (messageData.user_id === userId) {
            messageWrapper.classList.add('flex', 'justify-end', 'mb-2');
            messageBubble.classList.add('bg-blue-500', 'text-white', 'rounded-lg', 'py-2', 'px-4', 'max-w-xs', 'lg:max-w-md', 'shadow');
            messageTimestamp.classList.add('opacity-75', 'text-right');
        } else {
            messageWrapper.classList.add('flex', 'justify-start', 'mb-2');
            messageBubble.classList.add('bg-gray-200', 'text-gray-800', 'dark:bg-gray-700', 'dark:text-gray-200', 'rounded-lg', 'py-2', 'px-4', 'max-w-xs', 'lg:max-w-md', 'shadow');
            messageTimestamp.classList.add('text-gray-500', 'dark:text-gray-400', 'text-left');
        }

        messageBubble.appendChild(messageContent);
        messageBubble.appendChild(messageTimestamp);
        messageWrapper.appendChild(messageBubble);
        chatMessages.appendChild(messageWrapper);
        chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll
    }

    // Listen for incoming messages
    Echo.private(`chat.${conversationId}`)
        .listen('\\App\\Events\\ChatMessageSent', (e) => {
            // Check if the message belongs to the current conversation
            if (e.message.conversation_id == conversationId) {
                 appendMessage(e.message);
            }
        });

    // AJAX form submission for sending messages
    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const messageInput = document.getElementById('message-input');
        if (messageInput.value.trim() === '') {
            return; // Don't send empty messages
        }

        fetch('{{ route('chat.send') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                message: messageInput.value,
                conversation_id: conversationId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'Message sent successfully') {
                // Optionally, append the sent message immediately without waiting for Echo
                // This can make the UI feel faster.
                // However, ensure it matches what Echo would deliver.
                // For now, relying on Echo to deliver the message.
            } else {
                // Handle error, e.g., show a notification
                console.error('Failed to send message:', data);
            }
        })
        .catch(error => console.error('Error sending message:', error));

        messageInput.value = ''; // Clear input
    });

    // Scroll to bottom on page load
    chatMessages.scrollTop = chatMessages.scrollHeight;
</script>
@endpush