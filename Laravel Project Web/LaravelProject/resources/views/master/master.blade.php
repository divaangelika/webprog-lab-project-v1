<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <title>Showflix</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.css">
  <link rel="stylesheet" href="app.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@if(!Auth::check())
@include('partials.headerUnregister')
@elseif(Auth::user()->role == 'admin')
@include('partials.headerAdmin')
@else
@include('partials.headerRegistered')
@endif

</head>
<body>

      @yield('slider')

      @yield('register')

      @yield('login')

      @yield('content')

      <footer>
        <div class="text-center">
            <h1 class="display-3">ShowFlix</h1>
        </div>
        <div class="text-center">
        <button class="btn btn-danger" type="button">
          <i class="fa-brands fa-youtube"></i>
        </button>
        <button class="btn btn-info" type="button">
          <i class="fa-brands fa-twitter text-white"></i>
        </button>
        <button class="btn btn-primary" type="button">
          <i class="fa-brands fa-facebook"></i>
        </button>
        <button class="btn btn-danger" type="button">
          <i class="fa-brands fa-instagram"></i>
        </button>
        <button class="btn btn-success" type="button">
          <i class="fa-brands fa-whatsapp"></i>
        </button>
        <button class="btn btn-dark" type="button">
          <i class="fa-brands fa-github"></i>
        </button>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        </div>
        <div class="text-center">
            &copy; {{ date('Y') }} ShowFlix All Right Reserved
        </div>
    </footer>

</body>
</html>
