@extends('layouts.master')

@section('title', 'Chat')

@section('content')
<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Chat with Therapist</h2>

        <!-- Chat messages container -->
        <div id="chat-messages" style="height: 300px; overflow-y: scroll;">
            @foreach($messages as $message)
                <div class="{{ $message->user_id === auth()->id() ? 'my-message' : 'their-message' }}">
                    <p>{{ $message->content }}</p>
                    <small>{{ $message->created_at->format('H:i') }}</small>
                </div>
            @endforeach
        </div>

        <!-- Message input form -->
        <form id="chat-form" action="{{ route('chat.send') }}" method="POST">
            @csrf
            <input type="hidden" name="conversation_id" value="{{ $conversation->id }}">
            <input type="text" id="message-input" name="message" placeholder="Type your message here">
            <button type="submit">Send</button>
        </form>
    </div>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Listen for incoming messages
        Echo.channel('chat.{{ $conversation->id }}')
            .listen('MessageSent', (e) => {
                const chatMessages = document.getElementById('chat-messages');
                const messageElement = document.createElement('div');
                messageElement.classList.add(e.message.user_id === {{ auth()->id() }} ? 'my-message' : 'their-message');
                messageElement.innerHTML = `<p>${e.message.content}</p><small>${new Date(e.message.created_at).toLocaleTimeString()}</small>`;
                chatMessages.appendChild(messageElement);
                chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll
            });

        // AJAX form submission for sending messages
        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const messageInput = document.getElementById('message-input');
            fetch('{{ route('chat.send') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    message: messageInput.value,
                    conversation_id: {{ $conversation->id }}
                })
            });
            messageInput.value = ''; // Clear input
        });
    </script>
</body>
</html>
@endsection