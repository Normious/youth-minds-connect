@extends('layouts.master')

@section('title', 'Events')

@section('content')
<br><br><br>
<section class="events">
    <h1 class="mb-4">Events</h1>
    <div class="events-container">
        
        <!-- <a href="{{ route('calendar') }}" class="btn btn-primary mb-3">View Our Calendar</a> {{-- Add this button --}} -->

        @if($events->isEmpty())
        <p>No events available.</p>
        @else
        @foreach($events as $event)
        <div class="events-card">
            @if($event->image)
            <img src="{{ $event->image }}" alt="{{ $event->name }}">
            @else
            <img src="https://scontent-mba2-1.xx.fbcdn.net/v/t39.30808-6/485723823_650204291095177_7021488960199201908_n.jpg?stp=dst-jpg_s720x720_tt6&_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFyPW7G96IvdpAVJex2_uQUJfJ9_XUrv3Ml8n39dSu_c_yWFB-TNlMguvNJ-pag4Ap3FfIj61HqjMusqFiPM2xo&_nc_ohc=8SD3K8oGzq0Q7kNvgFEiwWv&_nc_oc=AdnJ9QHL3-v_W1utxAbyDgqdq2C5KAfuJLNEveKtXorLw10RjsrALBahIXGYUFbE5tMAH5bj0HzcPg_Gw24c67MQ&_nc_zt=23&_nc_ht=scontent-mba2-1.xx&_nc_gid=1LpUS11Lh_zlk7Z41Y8XTQ&oh=00_AYEwA85JvhPIkiGGlsPMYYQJLxkY9vvKqBbSRVDy-lPjnA&oe=67E986CF" class="card-img-top" alt="Default Event Image">
            @endif
            <div class="events-content">
                <h2>{{ $event->name }}</h2>
                <p>{{ Str::limit($event->description, 100) }}</p>
                <p>Date: {{ $event->date_from->format('F j, Y') }} - {{ $event->date_to->format('F j, Y') }}</p>
                <p>Location: {{ $event->location }}</p>
                <a href="{{ route('calendar') }}" class="btn btn-primary">View Calendar</a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</section>
@endsection