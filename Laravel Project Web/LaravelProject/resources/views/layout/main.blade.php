<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Showflix</title>

  @include('partials.styles')

</head>
<body>

    @include('partials.headerUnregister')
    {{-- @include('partials.carousel') --}}

    {{-- @yield('testfooter') --}}

    @include('partials.script')
    @yield('testfooter')

</body>
</html>
