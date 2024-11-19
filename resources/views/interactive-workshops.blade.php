@extends('layouts.master')

@section('title', 'Workshops')

@section('content')
<main class="workshopscontainer">
    <section class="filter-section">
      <h2>Interactive Workshops</h2>
      <p>Explore live or recorded sessions on mental health topics. Choose what suits your schedule!</p>
      <div class="filter-buttons">
        <button class="filter-btn" id="liveBtn">Live Workshops</button>
        <button class="filter-btn" id="recordedBtn">Recorded Workshops</button>
      </div>
    </section>

    <section class="workshops-list">
      <!-- Live Workshop 1 -->
      <div class="workshop-item live">
        <a href="https://www.youtube.com/watch?v=your_live_video1" target="_blank" class="video-thumbnail">
          <img src="https://img.youtube.com/vi/your_live_video1/maxresdefault.jpg" alt="Live Workshop 1">
        </a>
        <h3>Live: Mental Health & Coping Strategies</h3>
        <p>Join a live session on mental health awareness and effective coping strategies.</p>
        <p><strong>Date:</strong> Sep 20, 2024 | <strong>Time:</strong> 5:00 PM</p>
        <a href="https://www.youtube.com/watch?v=your_live_video1" target="_blank">
          <button class="join-btn">Join Live</button>
        </a>
      </div>

      <!-- Recorded Workshop 1 -->
      <div class="workshop-item recorded">
        <a href="https://www.youtube.com/watch?v=K6o4Ww3bkpY" target="_blank" class="video-thumbnail">
          <img src="https://img.youtube.com/vi/K6o4Ww3bkpY/maxresdefault.jpg" alt="Recorded Workshop 1">
        </a>
        <h3>Recorded: How to Manage Anxiety</h3>
        <p>Watch a recorded session on managing anxiety and building emotional resilience.</p>
        <p><strong>Duration:</strong> 20 minutes</p>
        <a href="https://www.youtube.com/watch?v=K6o4Ww3bkpY" target="_blank">
          <button class="watch-btn">Watch Now</button>
        </a>
      </div>

      <!-- Live Workshop 2 -->
      <div class="workshop-item live">
        <a href="https://www.youtube.com/watch?v=your_live_video2" target="_blank" class="video-thumbnail">
          <img src="https://img.youtube.com/vi/your_live_video2/maxresdefault.jpg" alt="Live Workshop 2">
        </a>
        <h3>Live: Mindfulness & Relaxation</h3>
        <p>Experience a live guided mindfulness session for relaxation and mental well-being.</p>
        <p><strong>Date:</strong> Sep 25, 2024 | <strong>Time:</strong> 8:00 PM</p>
        <a href="https://www.youtube.com/watch?v=your_live_video2" target="_blank">
          <button class="join-btn">Join Live</button>
        </a>
      </div>

      <!-- Recorded Workshop 2 -->
      <div class="workshop-item recorded">
        <a href="https://www.youtube.com/watch?v=J5I0ReXjRzM" target="_blank" class="video-thumbnail">
          <img src="https://img.youtube.com/vi/J5I0ReXjRzM/maxresdefault.jpg" alt="Recorded Workshop 2">
        </a>
        <h3>Recorded: Understanding Depression</h3>
        <p>Learn more about depression, its symptoms, and treatment options in this pre-recorded session.</p>
        <p><strong>Duration:</strong> 14 minutes</p>
        <a href="https://www.youtube.com/watch?v=J5I0ReXjRzM" target="_blank">
          <button class="watch-btn">Watch Now</button>
        </a>
      </div>
    </section>
  </main>
@endsection
