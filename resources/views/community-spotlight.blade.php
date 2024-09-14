@extends('layouts.master')

@section('title', 'Community Spotlight')

@section('content')
<section class="community-spotlight">
    <h1>Community Spotlight</h1>
    <p>Discover inspiring stories and success features from our community members.</p>

    <div class="spotlight-container">
      <div class="spotlight-card">
        <img src="{{ asset('assets/image.png') }}" alt="Feature Story 1" />
        <div class="spotlight-content">
          <h2>Feature Story 1</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
        </div>
      </div>
      <div class="spotlight-card">
        <img src="{{ asset('assets/pexels-caio-mantovani-97605853-28378834.jpg') }}" alt="Feature Story 2" />
        <div class="spotlight-content">
          <h2>Feature Story 2</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
        </div>
      </div>
      <div class="spotlight-card">
      <img src="{{ asset('assets/pexels-jonas-mohamadi-1416736.jpg') }}"alt="Feature Story 3" />
        <div class="spotlight-content">
          <h2>Feature Story 3</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
        </div>
      </div>
      <div class="spotlight-card">
      <img src="{{ asset('assets/pexels-gary-barnes-6231809.jpg') }}"alt="Feature Story 4" />
        <div class="spotlight-content">
          <h2>Feature Story 4</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
        </div>
      </div>
    </div>
  </section>
@endsection
