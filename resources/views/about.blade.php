@extends('layouts.master')

@section('title', 'About')

@section('content')
 <!-- Hero Section -->
 <section class="home">
    <video autoplay muted loop id="video-slide">
      <source src="5.mp4" type="video/mp4" />
    </video>
    <div class="content active">
      <h1>Your Mental Health is Our Priority</h1>
      <p>We Provide Support and Solutions for Mental Wellness</p>
      <a href="#">Learn More</a>
    </div>
  </section>

  <!-- About Section -->
  <section class="about">
    <div class="about-container">
      <div class="about-content">
        <div class="about-text">
          <h2>We Support Mental Wellness with Care</h2>
          <p>
            At Mental Health Matters, we focus on providing holistic care for
            mental well-being. Our team of professionals offers personalized
            support, therapy, and wellness programs to help individuals lead a
            balanced life.
          </p>
          <ul class="services-list">
            <li>Mental Health Counseling</li>
            <li>Stress Management Programs</li>
            <li>Anxiety and Depression Support</li>
            <li>Workplace Mental Health Services</li>
          </ul>
        </div>
        <div class="about-image">
          <img src="{{ asset('assets/pexels-valeria-ushakova-603898-3094215.jpg') }}" alt="Mental Health Support" />
        </div>
      </div>
    </div>
  </section>
  <div class="wrapper">
    <h1>Our Team</h1>
    <div class="team">
      <div class="team_member">
        <div class="team_img">
          <img src="{{ asset('assets/team1.png') }}" alt="Team_image" />
        </div>
        <h3>Bill Gates John</h3>
        <p class="role">Project Manager</p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat
          tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum
          nemo distinctio quam blanditiis dignissimos.
        </p>
        <!-- Social Media Icons -->
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>

      <div class="team_member">
        <div class="team_img">
          <img src="{{ asset('assets/team2.png') }}" alt="Team_image" />
        </div>
        <h3>Stacey Tsokota</h3>
        <p class="role">Monitoring & Evaluation (M&E) Officer</p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat
          tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum
          nemo distinctio quam blanditiis dignissimos.
        </p>
        <!-- Social Media Icons -->
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>

      <div class="team_member">
        <div class="team_img">
          <img src="{{ asset('assets/team3.png') }}" alt="Team_image" />
        </div>
        <h3>Kondwani Mphaya</h3>
        <p class="role">Ul design & Developer</p>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat
          tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum
          nemo distinctio quam blanditiis dignissimos.
        </p>
        <!-- Social Media Icons -->
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </div>
@endsection
