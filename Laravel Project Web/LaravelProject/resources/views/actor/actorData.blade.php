@foreach ($actors as $actor)
    <a href="{{ url('actors/detail/' . $actor->id) }}" class="text-decoration-none">
        <div class="card m-2" style="width: 18rem;">
            <img class="card-img-top px-3 pt-3 bg-dark" src="{{ url($actor->imgActor) }}"
                alt="Card image cap" style="z-index:1;  height:30vh; object-fit: cover;">
            <div class="card-body bg-dark">
                <p class="card-text font-weight-bold text-white">{{ $actor->name }}</p>
                @foreach ($movieActors as $movieActor)
                    @if ($movieActor->actor_id == $actor->id)
                        <p class="card-text text-white">{{ $movieActor->movie->title }}</p>
                    @endif
                @endforeach
            </div>
        </div>
    </a>
@endforeach
