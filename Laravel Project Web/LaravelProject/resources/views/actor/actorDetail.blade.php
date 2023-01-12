@extends('master.master')

@section('actor detail')

@section('content')
    <div class="px-5 py-3">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="col-4">
                <img src="{{ url('storage/actor/' . $actor->imgActor) }}" alt=""
                    class="w-100 rounded border-white position-relative">
                @if (Auth::user() && Auth::user()->type == 1)
                    <a href="{{ url('actors/' . $actor->id . '/editactor') }}"><button
                            class="rounded-circle bg-danger text-white py-4 px-4 position-absolute top-0" style="right:2%"><i
                                class="fa-solid fa-xl fa-pencil"></i></button></a>
                    <form action="{{ url('actors/delete/' . $actor->id) }}" method="POST">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button class="rounded-circle bg-danger text-white py-4 px-4 position-absolute"
                            style="top:9%;right:2%"><i class="fa-solid fa-xl fa-trash"></i></button>
                    </form>
                @endif
                <h2>Personal Info</h2>
                <div class="my-3">
                    <h5>Popularity</h5>
                    <p class="text-dark">{{ $actor->popularity }}</p>
                </div>
                <div class="my-3">
                    <h5>Gender</h5>
                    <p class="text-dark">{{ $actor->gender }}</p>
                </div>
                <div class="my-3">
                    <h5>Birthday</h5>
                    <p class="text-dark">{{ $actor->dobActor }}</p>
                </div>
                <div class="my-3">
                    <h5>Place of Birth</h5>
                    <p class="text-dark">{{ $actor->pobActor }}</p>
                </div>
            </div>
            <div class="col-8">
                <h1>{{ $actor->name }}</h1>
                <h3>Biography</h3>
                <span>{{ $actor->biography }}</span>

                <h3>Known For</h3>

                <div class="d-flex flex-wrap">
                    @foreach ($movieActors as $movieActor)
                        @if ($movieActor->actor_id == $actor->id)
                            <a href="{{ url('movies/detail/' . $movieActor->movie->id) }}" class="text-decoration-none">
                                <div class="card m-2" style="width: 18rem;">
                                    <img class="card-img-top px-3 pt-3 bg-dark h-100"
                                        src="{{ url('storage/poster/' . $movieActor->movie->img_thumbnail) }}"
                                        alt="Card image cap" style="z-index:1;  height:30vh; object-fit: cover;">
                                    <div class="card-body bg-dark">
                                        <p class="card-text text-white">{{ $movieActor->movie->title }}</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection
