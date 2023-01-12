@extends('master.master')

@section('title', 'Create Actor')

@section('content')
    <div class="text-black m-5">
        <h4 class="fw-bold">Create Actor</h4>
        <form action="{{ url('actors/addactor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control text-black" id="name" name="name">
                @error('name')
                    {{ $message }}
                @enderror
            </div>

            <div class="text-black mb-3">
                <label for="">Gender</label>
                <select class="form-select bg-blackdark border-10 text-black" aria-label="" name="gender">
                    <option selected>-- Open this select menu --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea class="form-control text-black" id="biography" name="biography"rows="5"></textarea>
                @error('biography')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of birth</label>
                <input type="date" class="form-control text-black" id="dobActor" name="dobActor"></input>
                @error('dobActor')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="pob" class="form-label">Place of Birth</label>
                <input type="text" class="form-control text-black" id="pobActor" name="pobActor">
                @error('pobActor')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Url</label>
                <input class="form-control text-black" type="file" id="image" placeholder="No file choosen"
                    name="imgActor">
                @error('imgActor')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="popularity" class="form-label">Popularity</label>
                <input type="text" class="form-control text-black" id="popularity" name="popularity">
                @error('popularity')
                    {{ $message }}
                    <p class="text-white">Decimal with "."</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger mt-3 px-10">Create</button>
        </form>
    </div>
@endsection
