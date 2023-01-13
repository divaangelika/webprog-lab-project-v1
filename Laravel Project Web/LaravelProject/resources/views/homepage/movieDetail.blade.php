@extends('master.master')

@section('Movie Detail')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="px-5 py-3"
        style='background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)),url("{{ asset($movie->img_background) }}"); background-position:center; background-repeat:no-repeat; background-size:cover;'>
        <div class="d-flex ">
            <div class="col-4">
                <img src="{{ $movie->img_thumbnail }}" alt="" class="w-100 rounded"
                    style="z-index:1;">
            </div>
            <div class="col-6 ">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>{{ $movie->title }}</h1>
                    @if (Auth::user() && Auth::user()->role == 'admin')
                        <div class="d-flex">
                            <a href="{{ url('movies/editmovies/' . $movie->id) }}"><i
                                    class="fa-solid fa-pen-to-square fa-xl mx-2 text-white"></i></a>
                            <form action="{{url('movies/deletemovie/' . $movie->id)}}" method="post">
                                @csrf
                                <button type="submit" class="bg-transparent border-0"><i class="fa-solid fa-trash fa-xl text-white"></i></button>
                            </form>
                        </div>
                    @elseif(Auth::user() && Auth::user()->type == 2)
                        <button
                            class="border-0 bg-transparent text-white watchlist fa-solid fa-2xl
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
                <div class="d-flex">
                    @foreach ($genres as $genre)
                        <p class="btn btn-dark m-2" style="border-radius: 25px; width:12%; pointer-events:none;">
                            {{ $genre->genre->name }}</p>
                    @endforeach
                </div>
                <p>Release Year</p>
                <p class="fs-5 fw-bold">{{ $movie->release_date }}</p>
                <h4>Storyline</h4>
                <p>{{ $movie->description }}</p>
                <h4>Director Name</h4>
                <p>{{ $movie->director }}</p>
            </div>
        </div>
    </div>

    <!-- actor -->
    <div class="px-5 py-3">
        <h3>Cast</h3>
        <div class="d-flex flex-wrap">
            @foreach ($actors as $actor)
                <a href="{{ url('actors/detail/' . $actor->actor->id) }}" class="text-decoration-none text-reset">
                    <div class="card m-2 border-0" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $actor->actor->img_url }}"
                            alt="Card image cap" style="z-index:1; height:30vh; object-fit: cover;">
                        <div class="card-body bg-danger">
                            <p class="card-text font-weight-bold">{{ $actor->actor->name }}</p>
                            <p class="card-text">{{ $actor->name }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- more -->
    <div class="py-3">
        <h3 class="px-5">More</h3>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($movies as $movie)
                <div class="card m-2 border-0 bg-transparent" style="width: 18rem;">
                    <a href="{{ url('movies/detail/' . $movie->id) }}" class="text-decoration-none">
                        <img class="card-img-top bg-dark h-100 border-top border-0"
                            src="{{ $movie->img_thumbnail }}" alt="Card image cap"
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
