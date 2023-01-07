<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Showflix</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.css">
  <link rel="stylesheet" href="app.css">

</head>
<body>

      @yield('slider')

      @yield('register')

      @yield('login')

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
