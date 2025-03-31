@extends('layouts.master')

@section('title', 'Home')

@section('content')
<section class="home">
  <video class="video-slide  active" src="https://videos.pexels.com/video-files/4101244/4101244-uhd_2732_1440_25fps.mp4" autoplay muted loop></video>
  <video class="video-slide" src="https://videos.pexels.com/video-files/7424128/7424128-uhd_2560_1440_30fps.mp4" autoplay muted loop></video>
  <video class="video-slide" src="https://videos.pexels.com/video-files/4098651/4098651-uhd_2732_1440_25fps.mp4" autoplay muted loop></video>
  <video class="video-slide" src="https://videos.pexels.com/video-files/4101227/4101227-uhd_2732_1440_25fps.mp4" autoplay muted loop></video>

  <div class="content  active">
    <h1>Life<br />Problems</h1>
    <p>
      You may be going through a new phase in your life, or having problems
      with a close relationship, or you just want to simply problem-solve a
      difficult situation. The idea of counseling is to have a third party
      who is outside of your circle of friends and family who can give you
      an objective.
    </p>
    <a href="#">Read More</a>
  </div>

  <div class="content">
    <h1>Family<br />Counseling</h1>
    <p>
      Family therapy (also referred to as family counseling, family systems
      therapy, marriage and family therapy, couple and family therapy) is a
      branch of psychotherapy focused on families and couples in intimate
      relationships to nurture change and development.
    </p>
    <a href="#">Read More</a>
  </div>

  <div class="content">
    <h1>Marriage<br/>Counseling</h1>
    <p>
      Marriage counseling focuses on relationships and marriages. It's also
      commonly referred to as couples therapy or marriage therapy. Marriage
      counselors are trained and certified to help couples diagnose
      relationship problems and develop practical solutions.
    </p>
    <a href="#">Read More</a>
  </div>

  <div class="content">
    <h1>Work<br />Stress</h1>
    <p>
      A counsellor can help you understand why you feel stressed and find
      strategies that can help you learn how to cope with stress. “Talking
      to a counsellor helps us go back to basics about how we are feeling
      when we're stressed, and why.
    </p>
    <a href="#">Read More</a>
  </div>

  <div class="media-icons">
    <a href="https://www.facebook.com/21stgenerationMw?_rdr"> <i class="fab fa-facebook"></i></a>
    <a href="https://www.instagram.com/21st_gen_/"> <i class="fab fa-instagram"></i></a>
    <a href="https://x.com/21st_Gen_"> <i class="fab fa-twitter"></i></a>
    <a href="https://www.linkedin.com/authwall?trk=gf&trkInfo=AQEAeskq1NjPmAAAAZXS9Glg94difudHILF9vv031FZmhlWF5dD_7o09hDdh4KDa2AuryvKWsKSfbOt8y8wnP3tvkpEEzgyRMwsgXrhiI1NfcHyVrZOI1Oibdyoj8nkkmZzyr8s=&original_referer=https://linktr.ee/&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Ftwenty-first-generation-00ab30305%3Futm_source%3Dshare%26utm_campaign%3Dshare_via%26utm_content%3Dprofile%26utm_medium%3Dandroid_app"> <i class="fab fa-linkedin"></i></a>
    <a href="https://www.tiktok.com/@21st_gen_"> <i class="fab fa-tiktok"></i></a>
  </div>
  <div class="slider-navigation">
    <div class="nav-btn active"></div>
    <div class="nav-btn"></div>
    <div class="nav-btn"></div>
    <div class="nav-btn"></div>
  </div>
</section>
@endsection
