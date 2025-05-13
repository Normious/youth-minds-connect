@extends('layouts.master')

@section('title', 'Professionals')

@section('content')
@if(auth()->check() && auth()->user()->hasRole('mentor'))
<div style="margin-top:180px;" class="container">
    <div class="my-5 text-center">
        <h1>Your Active Chats</h1>
        <p>View and manage your conversations with users seeking support.</p>
    </div>

    <div class="row">
        @foreach ($chats as $chat)
        <div class="col-md-4 mb-4">
            <div class="text-center card">
                <img src="https://img.freepik.com/premium-vector/young-man-face-avater-vector-illustration-design_968209-13.jpg?w=740"
                    alt="User profile picture" class="card-img-top" height="100" width="100" />
                <div class="card-body">
                    <h5 class="card-title">{{ $chat->user->name }}</h5>
                    <p class="card-text">Chat Session</p>
                    <a href="{{ route('mentor.chat', $chat) }}"
                        class="btn btn-outline-secondary btn-chat">Continue Chat {{ $chat->user_id}}</a>
                </div>
            </div>
        </div>
        @endforeach

        @if($chats->isEmpty())
        <div class="col-12 text-center">
            <p>You currently have no chat sessions. </p>
        </div>
        @endif
    </div>
</div>



@else

<div style="margin-top:180px;" class="container">
    <div class="my-5 text-center">
        <h1>Meet Our Licensed Psychologists</h1>
        <p>Our team of professionals is here to provide you with the support and guidance you need. Feel free to explore
            their profiles and initiate a conversation to start your journey toward better mental health.</p>
    </div>

    <div class="row">
        <!-- Example Psychologist 1 -->

        @foreach ($mentors as $mentor)
        <div class="col-md-4">
            <div class="text-center card">
                <img src="https://img.freepik.com/premium-vector/young-man-face-avater-vector-illustration-design_968209-13.jpg?w=740"
                    alt="Profile picture placeholder" class="card-img-top" height="100" width="100" />
                <div class="card-body">
                    <h5 class="card-title">{{ $mentor->name }}</h5>
                    <p class="card-text">{{ $mentor->description }}</p>
                    @auth
                    @if (Auth::user()->chats)
                    <a href="{{ route('startchat', $mentor) }}"
                        class="btn btn-outline-secondary btn-chat">Continue {{ $mentor->id}}</a>
                    @else
                    <a href="{{ route('startchat', $mentor) }}"
                        class="btn btn-outline-secondary btn-chat">Chat  {{ $mentor->id}}</a>
                    @endif


                    @endauth
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-chat">Login </a>
                    @endguest
                </div>
            </div>
        </div>
        @endforeach


        <!-- Add more psychologist cards as needed -->
    </div>
</div>
@endif

@endsection