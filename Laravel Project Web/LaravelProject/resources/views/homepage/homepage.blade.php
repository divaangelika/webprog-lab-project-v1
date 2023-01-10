@extends('master.master')

@if(!Auth::check())
@include('partials.headerUnregister')
@elseif(Auth::user()->role == 'admin')
@include('partials.headerAdmin')
@else
@include('partials.headerRegistered')
@endif

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @for($i = 0; $i < count($hp); $i++)
        <div class="carousel-item @if ($i == 0) active @endif">
            <div class="card-wrapper container-sm d-flex  justify-content-around">
                <div class="card  " style="width: 18rem;">
                    <img src="{{$hp[$i]->imgThumbnail}}"" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
        @endfor
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<h2>Show</h2>


@endsection
