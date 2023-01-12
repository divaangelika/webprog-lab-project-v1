@extends('master,master')

@section('Edit Actor')

@section('content')
    <div class="text-black m-5">
        <h4 class="fw-bold">Edit Actor</h4>
        <form action="{{ url('actors/' . $actor->id . '/editactor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control text-white" id="name" name="name"
                    value="{{ $actor->name }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Gender</label>
                <select class="form-select bg-blackdark border-0 text-white" aria-label="" name="gender"
                    value="{{ $actor->gender }}">
                    <option>-- Open this select menu --</option>
                    @if ($actor->gender == 'male')
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                    @else
                        <option value="male">Male</option>
                        <option value="female" selected>Female</option>
                    @endif

                </select>
                @error('gender')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea class="form-control  text-white" id="biography" name="biography"rows="5" value="">{{ $actor->biography }}</textarea>
                @error('biography')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of birth</label>
                <input type="date" class="form-control text-white" id="dob" name="dobActor"
                    value="{{ $actor->dobActor }}">
                @error('dob')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="pob" class="form-label">Place of Birth</label>
                <input type="text" class="form-control  text-white" id="pob" name="pobActor"
                    value="{{ $actor->pobActor }}">
                @error('pob')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Url</label>
                <input class="form-control text-white" type="file" id="image" name="actorimage">
                @error('actorimage')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="popularity" class="form-label">Popularity</label>
                <input type="text" class="form-control  text-white" id="popularity" name="popularity"
                    value="{{ $actor->popularity }}">
                @error('popularity')
                    {{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn btn-danger mt-3 px-10">Edit</button>
        </form>
    </div>
@endsection
