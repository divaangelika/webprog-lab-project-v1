@extends('layout.main')
@section('header_unregs')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="">ShowFlix</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Movie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Actor</a>
            </li>
            <button type="button"
                class="btn btn-outline-primary">Register
            </button>
            <button type="button"
                class="btn btn-outline-primary">Login
            </button>
          </ul>
      </div>
    </nav>
  </header>
@endsection
