@extends('master.master')

@if(!Auth::check())
    @include('partials.headerUnregister')
@elseif(Auth::user()->role == 'admin')
    @include('partials.headerAdmin')
@else
    @include('partials.headerRegistered')
@endif

@section('slider')
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="https://w0.peakpx.com/wallpaper/965/851/HD-wallpaper-avatar-2-2018-poster-fantasy-movie-avatar-2-navi-blue.jpg" class="d-block w-100" alt="..." width="500" height="600">
        <div class="carousel-caption d-none d-md-block">
            <h5>Avatar: The Way of Water</h5>
            <p>Jake Sully and Ney'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="https://wallpapercrafter.com/desktop/30567-Mission-Impossible-Fallout-poster-Tom-Cruise-4K-12K.jpg" class="d-block w-100" alt="..." width="500" height="600">
        <div class="carousel-caption d-none d-md-block">
            <h5>Mission: Impossible Fallout</h5>
            <p>A group of terrorists plans to detonate three plutonium cores for a simultaneous nuclear attack on different cities. Ethan Hunt, along with his IMF team, sets out to stop the carnage.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://static1.moviewebimages.com/wordpress/wp-content/uploads/2022/09/wednesday-netflix-poster.jpeg" class="d-block w-100" alt="..." width="500" height="600">
        <div class="carousel-caption d-none d-md-block">
            <h5>Wednesday</h5>
            <p>While attending Nevermore Academy, Wednesday Addams attempts to master her emerging psychic ability, thwart a killing spree and solve the mystery that embroiled her parents 25 years ago.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <h2>Popular</h2>

  @foreach ($hp as $hp)
    <img src="{{$hp->imgThumbnail}}" alt="">
  @endforeach
  {{-- <h2>test</h2> --}}

@endsection
