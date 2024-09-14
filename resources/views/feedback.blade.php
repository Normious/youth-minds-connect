@extends('layouts.master')

@section('title', 'Feedback')

@section('content')
<section class="feedback">
    <h1>Feedback & Suggestions</h1>
    <p>We value your input! Share your feedback and suggestions for improving our platform.</p>
    <div class="feedback-form-container">
      <form action="/submit-feedback" method="post" class="feedback-form">
        <div class="input-field">
          <input type="text" id="name" name="name" required />
          <label for="name">Name</label>
        </div>
        <div class="input-field">
          <input type="email" id="email" name="email" required />
          <label for="email">Email</label>
        </div>
        <div class="input-field">
          <textarea id="message" name="message" class="materialize-textarea" required></textarea>
          <label for="message">Your Feedback</label>
        </div>
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </section>
@endsection
