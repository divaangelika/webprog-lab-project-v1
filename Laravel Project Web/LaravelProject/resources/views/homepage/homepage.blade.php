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
        @for($i = 0; $i < count($caro); $i++)
        <div class="carousel-item @if ($i == 0) active @endif" data-bs-interval="10000">
            <img src="{{$caro[$i]->imgBackground}}" class="d-block w-100" alt="..." width="650" height="650">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$caro[$i]->title}}</h5>
                <p>{{$caro[$i]->description}}</p>
            </div>
        </div>
        @endfor
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
