@extends('layouts.master')

@section('title', 'Peer Support')

@section('content')
<section class="peer-support">
    <h1>Peer-to-Peer Support</h1>
    <p>Connect with others through forums and chat rooms. Engage in private messaging and share experiences with people
      who understand.</p>
    <div class="forums">
      <h2>Forums</h2>
      <div class="forum">
        <h3>General Discussion</h3>
        <p>Discuss various topics related to mental health and support.</p>
        <!-- Placeholder for forum integration -->
        <a href="#">Visit Forum</a>
      </div>
      <!-- Add more forum sections as needed -->
    </div>

    <div class="chat-rooms">
      <h2>Chat Rooms</h2>
      <div class="chat-room">
        <h3>Support Chat</h3>
        <p>Join the support chat room to connect with others in real-time.</p>
        <iframe src="https://example-chat-service.com/embed" width="100%" height="400px" frameborder="0"></iframe>
      </div>
      <div class="chat-room">
        <h3>Support Chat</h3>
        <p>Join the support chat room to connect with others in real-time.</p>
        <p>The chat feature will appear as a floating widget on the bottom right of the page.</p>
      </div>
      <!-- Add more chat rooms as needed -->
    </div>

    <div class="private-messaging">
      <h2>Private Messaging</h2>
      <p>Send private messages to connect with other members directly.</p>
      <!-- Placeholder for private messaging integration -->
      <a href="#">Send a Message</a>
    </div>
  </section>
@endsection
