@extends('layouts.app')

{{-- The header slot for app.blade.php --}}
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Chat with {{ $mentor->name }}
    </h2>
</x-slot>

@section('content')
<div class="container mx-auto py-6 px-4 h-[calc(100vh-200px)] flex flex-col"> {{-- Adjusted height calculation slightly --}}
    <!-- Chat Header (already in app layout header, but can add more details or keep it simple) -->
    {{--
    <div class="mb-4 p-4 bg-white dark:bg-gray-800 shadow rounded-lg">
        <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Chat with {{ $mentor->name }}</h1>
    </div>
    --}}

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

    <form action="{{ route('startdialogue') }}" method="post" id="send-message-form" class="bg-white dark:bg-gray-800 p-4 shadow rounded-lg">
        @csrf
        <input type="hidden" value="{{ $allchast->id }}" name="chat_id">
        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
        <div class="flex items-center">
            <input type="text" id="message-input" name="message" placeholder="Enter text here..." class="flex-grow p-3 border border-gray-300 dark:border-gray-600 rounded-l-md focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200 outline-none" autocomplete="off">
            <button type="submit" class="bg-blue-500 text-white p-3 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:ring-offset-gray-800">
                <svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3.105 3.105a1 1 0 00-1.414 1.414L1.586 4.5H10v1.5H1.586l-.001.001-2.08 2.08a1 1 0 001.414 1.414L3.105 7.072V3.105zM6.05 16.95a1 1 0 001.414-1.414L7.586 15.5H10v-1.5H7.586l.001-.001 2.08-2.08a1 1 0 00-1.414-1.414L6.05 12.928v3.978zM16.95 3.05a1 1 0 00-1.414 1.414L15.414 4.5H10v1.5h5.414l.001.001 2.08 2.08a1 1 0 001.414-1.414L16.95 7.072V3.05zm-6.845 6.845a1 1 0 00-1.414-1.414L7.072 10.664l-1.627-1.627a1 1 0 00-1.414 1.414L5.658 12l-1.627 1.627a1 1 0 001.414 1.414L7.072 13.336l1.627 1.627a1 1 0 001.414-1.414L8.486 12l1.62-1.627zM10.095 10l1.627 1.627a1 1 0 001.414-1.414L11.514 8.586l1.627-1.627a1 1 0 00-1.414-1.414L10.095 7.172V10z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                Send
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const conversationId = {{ $allchast->id }}; // Ensure $allchast is passed to the view
    const currentUserId = {{ Auth::id() }};

    console.log('Chat Page: DOMContentLoaded. Attempting to connect to Echo for conversation ID:', conversationId);

    if (typeof Echo !== 'undefined') { // Check if Echo is defined
        Echo.private('chat.' + conversationId)
            .listen('\\App\\Events\\ChatMessageSent', (e) => {
                console.log('Chat Page: ChatMessageSent event received:', e);

                const chatMessagesContainer = document.getElementById('chat-messages-container');
                if (!chatMessagesContainer) {
                    console.error('Chat messages container not found');
                    return;
                }

                const messageElement = document.createElement('div');
                // currentUserId is already defined in the script
                const isMyMessage = e.user_id === currentUserId;

                let messageClasses = ['p-3', 'rounded-lg', 'mb-2', 'max-w-md', 'shadow'];
                let outerDivClasses = ['flex', 'mb-2'];

                if (isMyMessage) {
                    messageClasses.push('bg-blue-500', 'text-white');
                    outerDivClasses.push('justify-end');
                } else {
                    messageClasses.push('bg-gray-200', 'dark:bg-gray-600', 'text-gray-800', 'dark:text-gray-100');
                    outerDivClasses.push('justify-start');
                }

                messageElement.classList.add(...messageClasses);
                // Use e.content, e.created_at directly from the broadcastWith payload
                messageElement.innerHTML = `<p class="text-sm">${e.content}</p><small class="text-xs opacity-75 block text-right mt-1 ${isMyMessage ? 'text-blue-100' : 'text-gray-500 dark:text-gray-300'}">${new Date(e.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</small>`;

                const outerDiv = document.createElement('div');
                outerDiv.classList.add(...outerDivClasses);
                outerDiv.appendChild(messageElement);

                chatMessagesContainer.appendChild(outerDiv);
                chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
            })
            .error((error) => {
                console.error('Chat Page: Echo channel error:', error);
            });

        // Pusher connection status logging
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

    // AJAX form submission
    const messageForm = document.getElementById('send-message-form');
    const messageInput = document.getElementById('message-input');

    if (messageForm && messageInput) {
      messageForm.addEventListener('submit', function(e) {
          e.preventDefault();
          const messageText = messageInput.value;
          if (messageText.trim() === '') return;

          messageInput.value = ''; // Clear input immediately

          fetch(this.action, { // this.action gets the form's action URL
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
    const chatMessagesContainer = document.getElementById('chat-messages-container');
    if(chatMessagesContainer){
        chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
    }
});
</script>
@endpush