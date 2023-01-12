@extends('master.master')
@section('Edit Movie')

@section('content')
<div class="text-black m-5">
    @if (session('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <h4 class="fw-bold">@if($movie) Edit @else Create @endif Movie</h4>
    <form @if($movie) action="{{url('movies/editmovies/' . $movie->id) }}" @endif class="d-flex flex-column" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control text-black" id="title" name="title" @if($movie) value="{{$movie->title}}" @endif>
            @error('title')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control text-black" id="description" name="description" rows="5">@if($movie){{$movie->description}}@endif</textarea>
            @error('description')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            @if($movie)
            @foreach($genreMovies as $genreMovie)
            <div class="add-genre">
                <label for="">Genre</label>
                <select class="form-select bg-blackdark border-0 text-black" aria-label="" name="genre[]">
                    <option disabled>Select an option</option>
                    @foreach($genres as $genre)
                    @if($genreMovie->genre->name == $genre->name)
                    <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
                    @else
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            @endforeach
            @else
            <div class="add-genre">
                <label for="">Genre</label>
                <select class="form-select bg-blackdark border-0 text-black" aria-label="" name="genre[]">
                    <option selected disabled>Select an option</option>
                    @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            @error('genre')
            {{ $message }}
            @enderror
            <div class="d-flex justify-content-end">
                <button type="button" id="addGenre" class="btn btn-primary mt-4">Add more</button>
            </div>
        </div>
        <p>Actors</p>
        <div class="m-4">
            @if($movie)
            @foreach($characters as $character)
            <div class="row add-character">
                <div class="col">
                    <label for="mb-3">Actor</label>
                    <select class="mt-2 form-select text-black bg-blackdark border-0" aria-label="" name="actor[]">
                        <option selected disabled>-- Open this select menu --</option>
                        @foreach($actors as $actor)
                        @if($actor->name == $character->actor->name)
                        <option value="{{$actor->id}}" selected>{{$actor->name}}</option>
                        @else
                        <option value="{{$actor->id}}">{{$actor->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('actor')
                    {{ $message }}
                    @enderror
                </div>
                <div class="col">
                    <label for="charactername" class="form-label">Character Name</label>
                    <input type="text" class="form-control text-black" id="charactername" name="character_name[]" value="{{$character->name}}" >
                    @error('character_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            @endforeach
            @else
            <div class="row add-character">
                <div class="col">
                    <label for="mb-3">Actor</label>
                    <select class="mt-2 form-select text-black bg-blackdark border-0" aria-label="" name="actor[]">
                        <option selected disabled>-- Open this select menu --</option>
                        @foreach($actors as $actor)
                        <option value="{{$actor->id}}">{{$actor->name}}</option>
                        @endforeach
                    </select>
                    @error('actor')
                    {{ $message }}
                    @enderror
                </div>
                <div class="col">
                    <label for="charactername" class="form-label">Character Name</label>
                    <input type="text" class="form-control text-black" id="charactername" name="character_name[]">
                    @error('character_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            @endif
            <div class="d-flex justify-content-end">
                <button type="button" id="addCharacter" class="btn btn-primary mt-4">Add more</button>
            </div>
        </div>
        <div class="mb-3">
            <label for="director" class="form-label">Director</label>
            <input type="text" class="form-control text-black" id="director" name="director" @if($movie) value="{{$movie->director}}" @endif>
            @error('director')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Release Date</label>
            <input type="date" class="form-control text-black" id="date" name="release_date" @if($movie) value="{{$movie->release_date}}" @endif></input>
            @error('release_date')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image Url</label>
            <input class="form-control text-black" type="file" id="image" placeholder="No file choosen" name="img_thumbnail">
            @error('img_thumbnail')
            {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="background" class="form-label">Background Url</label>
            <input class="form-control text-black" type="file" id="background" placeholder="No file choosen" name="img_banner">
            @error('img_banner')
            {{ $message }}
            @enderror
        </div>

        <button type="submit" class="btn btn-danger mt-3">@if($movie) Edit @else Create @endif</button>
    </form>
</div>

<script>
    $(document).on('click', '#addGenre', function() {
        $('<div class="add-genre"><label for="">Genre</label><select class="form-select bg-blackdark border-0 text-black" aria-label="" name="genre[]"><option selected disabled>Select an option</option> @foreach($genres as $genre) <option value="{{$genre->id}}">{{$genre->name}}</option> @endforeach </select> </div>').insertAfter('.add-genre:last');
    })
    $(document).on('click', '#addCharacter', function() {
        $('<div class="row add-character"><div class="col"><label for="mb-3">Actor</label><select class="mt-2 form-select text-black bg-blackdark border-0" aria-label="" name="actor[]"><option selected disabled>-- Open this select menu --</option>@foreach($actors as $actor) <option value="{{$actor->id}}">{{$actor->name}}</option> @endforeach </select></div><div class="col"> <label for="charactername" class="form-label">Character Name</label><input type="text" class="form-control text-black" id="charactername" name="character_name[]"></div></div>').insertAfter('.add-character:last');
    })
</script>
@endsection



