@extends('layouts.master')

@section('title', 'Articles')

@section('content')
<section class="articles">
    <h1>Mental Health Articles</h1>
    <p>Explore our collection of articles on mental health, self-care, and wellness.</p>

    <div class="article-list">
      <!-- Article Card 1 -->
      <div class="card">
        <div class="card-content">
          <span class="card-title">The Importance of Self-Care</span>
          <p>Learn how taking care of yourself can boost your mental well-being and help you manage stress effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">Read More</a>
        </div>
      </div>

      <!-- Article Card 2 -->
      <div class="card">
        <div class="card-content">
          <span class="card-title">Managing Anxiety in Daily Life</span>
          <p>Discover practical tips for coping with anxiety and staying grounded throughout your day.</p>
        </div>
        <div class="card-action">
          <a href="#">Read More</a>
        </div>
      </div>

      <!-- Article Card 3 -->
      <div class="card">
        <div class="card-content">
          <span class="card-title">Mindfulness for Mental Health</span>
          <p>Explore the power of mindfulness practices in maintaining emotional balance and mental clarity.</p>
        </div>
        <div class="card-action">
          <a href="#">Read More</a>
        </div>
      </div>

      <!-- Additional article cards can be added similarly -->
    </div>
  </section>
@endsection
