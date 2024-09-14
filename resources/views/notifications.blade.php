@extends('layouts.master')

@section('title', 'Notifications')

@section('content')
<section class="notifications">
    <h1>Notifications & Alerts</h1>
    <p>Stay updated with personalized notifications for events and important updates.</p>
    <div class="notification-list">
      <div class="notification">
        <div class="notification-header">
          <h2>Event Reminder</h2>
          <span class="notification-date">September 8, 2024</span>
        </div>
        <p>Don't miss our upcoming workshop on mental health strategies. Check the calendar for details.</p>
      </div>

      <div class="notification">
        <div class="notification-header">
          <h2>New Resource Added</h2>
          <span class="notification-date">September 7, 2024</span>
        </div>
        <p>We've added a new article on coping with stress to our Resource Library. Read it now!</p>
      </div>

      <!-- Add more notifications as needed -->
    </div>
  </section>
@endsection
