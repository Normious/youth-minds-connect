@extends('layouts.master')

@section('title', 'Resources')

@section('content')
  <!-- Hero Section for Resources Page -->
  <section class="hero resources-hero">
    <div class="hero-content">
      <h1>Mental Health Resources</h1>
      <p>Explore insightful videos on mental well-being, stress management, and mental health awareness.</p>
    </div>
  </section>

  <!-- Resources Section -->
  <section class="resources">
    <div class="resources-container">
      <h2>Featured Mental Health Videos</h2>
      <div class="resources-grid">
        <!-- Resource 1 -->
        <div class="resource-item">
          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/WWloIAQpMcQ?si=TX_70HGiHvJ2Yl-e" frameborder="0"
              allowfullscreen></iframe>
          </div>
          <div class="resource-info">
            <h3>Understanding Anxiety and How to Cope</h3>
            <p>Learn the signs of anxiety and discover practical strategies for managing and reducing anxious thoughts.
            </p>
          </div>
        </div>
        <!-- Resource 2 -->
        <div class="resource-item">
          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/gy1iH_Gxn0Q?si=StXDZueGmvG70Xej" frameborder="0"
              allowfullscreen></iframe>
          </div>
          <div class="resource-info">
            <h3>The Importance of Mental Health Awareness</h3>
            <p>This video dives into the importance of spreading mental health awareness and reducing stigma around
              mental health issues.</p>
          </div>
        </div>
        <!-- Resource 3 -->
        <div class="resource-item">
          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/7EX1Xnvvk5c?si=e7Ri5xBgsfaiS2Aw" frameborder="0"
              allowfullscreen></iframe>
          </div>
          <div class="resource-info">
            <h3>Stress Management Techniques</h3>
            <p>Explore different techniques that can help you manage stress effectively, including mindfulness and
              relaxation practices.</p>
          </div>
        </div>
        <!-- Resource 4 -->
        <div class="resource-item">
          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/AOHT-YiOeQA?si=Kout5B9DMxDEsr9j" frameborder="0"
              allowfullscreen></iframe>
          </div>
          <div class="resource-info">
            <h3>Self-Care: How to Take Care of Your Mental Health</h3>
            <p>A guide on self-care strategies, with an emphasis on prioritizing mental well-being as part of daily
              life.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
