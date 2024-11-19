@extends('layouts.master')

@section('title', 'Wellness Challenges')

@section('content')
<section class="challenges">
    <h1>Wellness Challenges</h1>
    <p>Participate in our wellness challenges and track your progress to earn rewards.</p>

    <!-- Progress Tracker -->
    <div class="tracker">
      <h2>Your Progress</h2>
      <div class="progress-bar">
        <div class="progress-fill" style="width: 60%;">60%</div>
      </div>
      <p>You have completed 60% of your mindfulness challenge.</p>
    </div>

    <!-- Challenges List -->
    <div class="challenge-list row">
      <!-- Challenge 1 -->
      <div class="card col s12 m6">
        <div class="card-content">
          <span class="card-title">30-Day Mindfulness Challenge</span>
          <p>Complete daily mindfulness exercises to reduce stress and improve focus.</p>
        </div>
        <div class="card-action">
          <button class="btn" onclick="trackProgress()">Mark Day Complete</button>
        </div>
      </div>

      <!-- Challenge 2 -->
      <div class="card col s12 m6">
        <div class="card-content">
          <span class="card-title">Weekly Fitness Challenge</span>
          <p>Track your workouts and stay active throughout the week.</p>
        </div>
        <div class="card-action">
          <button class="btn" onclick="trackProgress()">Mark Workout Complete</button>
        </div>
      </div>

      <!-- Challenge 3 -->
      <div class="card col s12 m6">
        <div class="card-content">
          <span class="card-title">Daily Gratitude Journal</span>
          <p>Write down three things you are grateful for each day to boost positivity.</p>
        </div>
        <div class="card-action">
          <button class="btn" onclick="trackProgress()">Mark Entry Complete</button>
        </div>
      </div>

      <!-- Rewards -->
      <div class="rewards col s12">
        <h2>Your Rewards</h2>
        <ul>
          <li>Mindfulness Master Badge (Earned for 30% completion)</li>
          <li>Fitness Champion Badge (Earned for 50% completion)</li>
          <!-- More rewards can be added here -->
        </ul>
      </div>
    </div>
  </section>
@endsection
