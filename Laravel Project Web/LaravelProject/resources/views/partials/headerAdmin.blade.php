<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="">ShowFlix</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/#showMovies') }}">Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/actors') }}">Actor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('movies/addmovie') }}">Add Movie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Log Out</a>
            </li>
          </ul>
      </div>
    </nav>
  </header>
