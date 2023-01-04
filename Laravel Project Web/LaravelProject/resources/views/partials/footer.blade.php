@extends('layout.main')
@section('testfooter')

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

@endsection
