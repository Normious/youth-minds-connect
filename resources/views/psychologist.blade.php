@extends('layouts.master')

@section('title', 'Professionals')

@section('content')

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
                                        class="btn btn-outline-secondary btn-chat">Continue</a>
                                @else
                                    <a href="{{ route('startchat', $mentor) }}"
                                        class="btn btn-outline-secondary btn-chat">Chat</a>
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

@endsection
