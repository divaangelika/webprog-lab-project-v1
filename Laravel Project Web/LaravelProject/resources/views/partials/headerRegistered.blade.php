@include("partials.script")
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="">ShowFlix</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Movie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Actor</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Member</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('logout')}}">Log Out</a></li>
                  <li><a class="dropdown-item" href="#">Watch List</a></li>
                </ul>
            </li>
          </ul>
      </div>
    </nav>
  </header>
