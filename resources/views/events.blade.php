@extends('layouts.master')

@section('title', 'Events')

@section('content')
<br><br><br>
    <div class="container mt-4">
        <h1 class="mb-4">Events</h1>

        <!-- <a href="{{ route('calendar') }}" class="btn btn-primary mb-3">View Our Calendar</a> {{-- Add this button --}} -->
        
        @if($events->isEmpty())
            <p>No events available.</p>
        @else
        <div class="row">
        @foreach($events as $event)
        <div class="col-sm-6 col-lg-4 mb-4">
            <div class="card">
                @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                @else
                    <img src="https://scontent-mba2-1.xx.fbcdn.net/v/t39.30808-6/485723823_650204291095177_7021488960199201908_n.jpg?stp=dst-jpg_s720x720_tt6&_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFyPW7G96IvdpAVJex2_uQUJfJ9_XUrv3Ml8n39dSu_c_yWFB-TNlMguvNJ-pag4Ap3FfIj61HqjMusqFiPM2xo&_nc_ohc=8SD3K8oGzq0Q7kNvgFEiwWv&_nc_oc=AdnJ9QHL3-v_W1utxAbyDgqdq2C5KAfuJLNEveKtXorLw10RjsrALBahIXGYUFbE5tMAH5bj0HzcPg_Gw24c67MQ&_nc_zt=23&_nc_ht=scontent-mba2-1.xx&_nc_gid=1LpUS11Lh_zlk7Z41Y8XTQ&oh=00_AYEwA85JvhPIkiGGlsPMYYQJLxkY9vvKqBbSRVDy-lPjnA&oe=67E986CF" class="card-img-top" alt="Default Event Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                    <a href="{{ route('calendar') }}" class="btn btn-primary">View Calendar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        @endif
    </div>
@endsection
