@extends('layouts.master')

@section('title', 'Professionals')

@section('content')
<div class="pro-container">

<div class="slide">

  <div class="item" style="background-image: url(../assets/pexels-cottonbro-4098157.jpg);">
    <div class="content">
      <div class="name">Mrs. Smitht</div>
      <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
      <button>Contact</button>
    </div>
  </div>
  <div class="item" style="background-image: url(../assets/pexels-cottonbro-4098259.jpg);">
    <div class="content">
      <div class="name">Miss. Carter</div>
      <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
      <button>Contact</button>
    </div>
  </div>
  <div class="item" style="background-image: url(../assets/pexels-cottonbro-4100482.jpg);">
    <div class="content">
      <div class="name">Adam</div>
      <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
      <button>Contact</button>
    </div>
  </div>
  <div class="item" style="background-image: url(../assets/pexels-cottonbro-4100672.jpg);">
    <div class="content">
      <div class="name">Mervin Palichina</div>
      <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
      <button>Contact</button>
    </div>
  </div>
  <div class="item" style="background-image: url(../assets/pexels-mart-production-7255383.jpg);">
    <div class="content">
      <div class="name">Gray Mafuta</div>
      <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
      <button>Contact</button>
    </div>
  </div>
  <div class="item" style="background-image: url(../assets/pexels-olly-3782218.jpg);">
    <div class="content">
      <div class="name">Ryan Sambila</div>
      <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
      <button>Contact</button>
    </div>
  </div>

</div>

<div class="button">
  <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
  <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
</div>

</div>
@endsection
