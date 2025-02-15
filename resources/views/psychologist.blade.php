@extends('layouts.master')

@section('title', 'Professionals')

@section('content')
<html>
<head>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <style>
    .card {
      width: 18rem;
      margin: 50px;
    }
    .card img {
      border-radius: 50%;
      width: 100px;
      height: 100px;
      margin: 20px auto;
    }
    .card-title {
      font-weight: bold;
    }
    .btn-chat {
      margin: 20px auto;
      display: block;
      width: 100px;
    }
  </style>
</head>
<body>
  <br>
  <br>
  <br>
  <br>
  <div class="container">
    <div class="text-center my-5">
      <h1>Meet Our Licensed Psychologists</h1>
      <p>Our team of professionals is here to provide you with the support and guidance you need. Feel free to explore their profiles and initiate a conversation to start your journey toward better mental health.</p>
    </div>
    
    <div class="row">
      <!-- Example Psychologist 1 -->
      <div class="col-md-4">
        <div class="card text-center">
          <img src="https://storage.googleapis.com/a1aa/image/YJLgtq1v65prENtomU4xryEWgCrukpzH5q2sm5MWfdWNcy2JA.jpg" alt="Profile picture placeholder" class="card-img-top" height="100" width="100"/>
          <div class="card-body">
            <h5 class="card-title">Dr. Sarah Adams</h5>
            <p class="card-text">Specializes in anxiety, depression, and trauma therapy. Over 10 years of experience in mental health support.</p>
            <a href="#" class="btn btn-outline-secondary btn-chat">Chat</a>
          </div>
        </div>
      </div>
      
      <!-- Example Psychologist 2 -->
      <div class="col-md-4">
        <div class="card text-center">
          <img src="https://storage.googleapis.com/a1aa/image/YJLgtq1v65prENtomU4xryEWgCrukpzH5q2sm5MWfdWNcy2JA.jpg" alt="Profile picture placeholder" class="card-img-top" height="100" width="100"/>
          <div class="card-body">
            <h5 class="card-title">Dr. Michael Lee</h5>
            <p class="card-text">Expert in cognitive behavioral therapy (CBT) for stress and anger management.</p>
            <a href="#" class="btn btn-outline-secondary btn-chat">Chat</a>
          </div>
        </div>
      </div>
      
      <!-- Example Psychologist 3 -->
      <div class="col-md-4">
        <div class="card text-center">
          <img src="https://storage.googleapis.com/a1aa/image/YJLgtq1v65prENtomU4xryEWgCrukpzH5q2sm5MWfdWNcy2JA.jpg" alt="Profile picture placeholder" class="card-img-top" height="100" width="100"/>
          <div class="card-body">
            <h5 class="card-title">Dr. Emily Johnson</h5>
            <p class="card-text">Focuses on family and relationship counseling, helping clients build healthy, positive connections.</p>
            <a href="#" class="btn btn-outline-secondary btn-chat">Chat</a>
          </div>
        </div>
      </div>

      <!-- Add more psychologist cards as needed -->
    </div>
  </div>
</body>
</html>
@endsection
