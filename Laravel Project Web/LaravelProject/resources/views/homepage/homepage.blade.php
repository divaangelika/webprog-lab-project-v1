{{-- @extends('master.master')

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

<div class="test">
    <h2>Popular</h2>
</div>

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


@endsection --}}



@extends('master.master')

@section('Movie List')

@section('content')
    <!-- hero -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="pickgradient w-100" style="height:80vh; overflow: hidden;">
                    <a href="{{ url('movies/detail/' . $moviesRandom[0]->id) }}">
                        <img class="d-block w-100 image1"
                            src="{{ asset('storage/banner/' . $moviesRandom[0]->img_background) }}" alt="First slide">
                    </a>
                </div>
                <div class="carousel-caption d-none d-md-block text-left">
                    <p>
                        @foreach ($movieGenres as $movieGenre)
                            @if ($movieGenres->movie_id == $moviesRandom[0]->id)
                                {{ $movieGenres->genre->name }} |
                            @endif
                        @endforeach {{ $moviesRandom[0]->release_date }}
                    </p>
                    <h2>{{ $moviesRandom[0]->title }}</h2>
                    <p>{{ $moviesRandom[0]->description }}</p>
                    @if (Auth::user() && Auth::user()->type == 2)
                        <button
                            class="border-0 btn py-3 bg-danger text-white watchlist fa-solid
                            @php $check=false @endphp
                            @foreach ($moviesRandom[0]->watchlist as $watchlist)
                            @if ($watchlist->user_id == Auth::user()->id)
                            fa-check
                            @php $check=true @endphp
                            @endif @endforeach
                            @if (!$check) fa-plus @endif"
                            value="{{ $moviesRandom[0]->id }}"> Add to Wathclist
                        </button>
                    @endif
                </div>
            </div>
            <div class="carousel-item">
                <div class="pickgradient w-100" style="height:80vh; overflow: hidden;">
                    <a href="{{ url('movies/detail/' . $moviesRandom[1]->id) }}">
                        <img class="d-block w-100 image1"
                            src="{{ asset('storage/banner/' . $moviesRandom[1]->img_background) }}" alt="First slide">
                    </a>
                </div>
                <div class="carousel-caption d-none d-md-block text-left">
                    <p>
                        @foreach ($movieGenres as $movieGenre)
                            @if ($movieGenre->movie_id == $moviesRandom[1]->id)
                                {{ $movieGenre->genre->name }} |
                            @endif
                        @endforeach {{ $moviesRandom[1]->release_date }}
                    </p>
                    <h2>{{ $moviesRandom[1]->title }}</h2>
                    <p>{{ $moviesRandom[1]->description }}</p>
                    @if (Auth::user() && Auth::user()->type == 2)
                        <button
                            class="border-0 btn py-3 bg-danger text-white watchlist fa-solid
                            @php $check=false @endphp
                            @foreach ($moviesRandom[1]->watchlist as $watchlist)
                            @if ($watchlist->user_id == Auth::user()->id)
                            fa-check
                            @php $check=true @endphp
                            @endif @endforeach
                            @if (!$check) fa-plus @endif"
                            value="{{ $moviesRandom[1]->id }}"> Add to Wathclist
                        </button>
                    @endif
                </div>
            </div>
            <div class="carousel-item">
                <div class="pickgradient w-100" style="height:80vh; overflow: hidden;">
                    <a href="{{ url('movies/detail/' . $moviesRandom[2]->id) }}">
                        <img class="d-block w-100 image1"
                            src="{{ asset('storage/banner/' . $moviesRandom[2]->img_background) }}" alt="First slide">
                    </a>
                </div>
                <div class="carousel-caption d-none d-md-block text-left">
                    <p>
                        @foreach ($genreMovies as $genreMovie)
                            @if ($genreMovie->movie_id == $moviesRandom[2]->id)
                                {{ $genreMovie->genre->name }} |
                            @endif
                        @endforeach {{ $moviesRandom[2]->release_date }}
                    </p>
                    <h2>{{ $moviesRandom[2]->title }}</h2>
                    <p>{{ $moviesRandom[2]->description }}</p>
                    @if (Auth::user() && Auth::user()->type == 2)
                        <button
                            class="border-0 btn py-3 bg-danger text-white watchlist fa-solid
                            @php $check=false @endphp
                            @foreach ($moviesRandom[2]->watchlist as $watchlist)
                            @if ($watchlist->user_id == Auth::user()->id)
                            fa-check
                            @php $check=true @endphp
                            @endif @endforeach
                            @if (!$check) fa-plus @endif"
                            value="{{ $moviesRandom[2]->id }}"> Add to Wathclist
                        </button>
                    @endif
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- popular -->
    <div class="d-flex align-items-center">
        <i class="fa-solid fa-fire fa-xl m-4"></i>
        <p class="h3">Popular</p>
    </div>


    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($popularMovies as $movie)
            <div class="card m-2 border-0 bg-transparent" style="width: 18rem;">
                <a href="{{ url('movies/detail/' . $movie->id) }}" class="text-decoration-none">
                    <img class="card-img-top bg-dark h-100 border-top border-0"
                        src="{{ url('storage/poster/' . $movie->img_thumbnail) }}" alt="Card image cap"
                        style="z-index:1; object-fit: cover;">
                </a>
                <div class="card-body bg-dark rounded-bottom">
                    <a href="{{ url('movies/detail/' . $movie->id) }}" class="text-decoration-none">
                        <p class="card-text text-white mb-2">{{ $movie->title }}</p>
                    </a>
                    <p class="card-text text-white">{{ $movie->release_date }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- show -->
    <div class="m-4" id="showMovies">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-film fa-xl mr-4"></i>
                <p class="h3">Show</p>
            </div>
            <form action="{{ url('/search') }}">
                <input type="search" class="form-control w-75" id="" name="title" placeholder="Search Movie">
            </form>
        </div>
        <div class="mt-4">
            <form action="{{ url('/search') }}">
                @foreach ($genres as $genre)
                    <button type="submit" class="btn btn-dark m-2" style="border-radius: 25px; width:12%;"
                        value="{{ $genre->id }}" name="genre">{{ $genre->name }}</button>
                @endforeach
            </form>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
            <div class="d-flex align-items-center">
                <p class="h5">Sort By:</p>
                <form action="{{ url('/search') }}">
                    <button type="submit" name="sort" value="latest" class="btn btn-dark ml-3"
                        style="border-radius: 25px;">Latest</button>
                    <button type="submit" name="sort" value="ascending" class="btn btn-dark ml-3"
                        style="border-radius: 25px;">A-Z</button>
                    <button type="submit" name="sort" value="descending" class="btn btn-dark ml-3"
                        style="border-radius: 25px;">Z-A</button>
                </form>
            </div>
            @if (Auth::check() && Auth()->user()->type == 1)
                <a href="{{ url('movies/addmovie') }}"><button type="button" class="btn btn-danger">Add
                        Movie</button></a>
            @endif
        </div>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($movies as $movie)
                <div class="card m-2 border-0 bg-transparent" style="width: 18rem;">
                    <a href="{{ url('movies/detail/' . $movie->id) }}" class="text-decoration-none">
                        <img class="card-img-top bg-dark h-100 border-top border-0"
                            src="{{ url('storage/poster/' . $movie->img_thumbnail) }}" alt="Card image cap"
                            style="z-index:1; object-fit: cover;">
                    </a>
                    <div class="card-body bg-dark rounded-bottom">
                        <a href="{{ url('movies/detail/' . $movie->id) }}" class=" text-decoration-none">
                            <p class="card-text text-white mb-2">{{ $movie->title }}</p>
                        </a>
                        <div class="d-flex justify-content-between align-items-start">
                            <p class="card-text text-white">{{ $movie->release_date }}</p>
                            @if (Auth::user() && Auth::user()->type == 2)
                                <button
                                    class="border-0 bg-transparent text-white watchlist fa-solid
            @php $check=false @endphp
            @foreach ($movie->watchlist as $watchlist)
            @if ($watchlist->user_id == Auth::user()->id)
            fa-check
            @php $check=true @endphp
            @endif @endforeach
            @if (!$check) fa-plus @endif"
                                    value="{{ $movie->id }}">
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        const watchlisted = $('.watchlist');
        watchlisted.each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if ($(this).hasClass('fa-check')) {
                    $.ajax({
                        url: "/watchlist/remove/" + $(this).val(),
                        type: "DELETE",
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $(this).removeClass('fa-check');
                            $(this).addClass('fa-plus');
                        },
                    });
                    console.log("ini delete")
                } else {
                    $.ajax({
                        url: "/watchlist/add/" + $(this).val(),
                        type: "POST",
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            console.log('sucess');
                            $(this).removeClass('fa-plus');
                            $(this).addClass('fa-check');
                        },
                    });
                    console.log("ini nambah")
                }
            })
        });
    </script>


@endsection
