<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>register</title>

  {{-- @include('partials.styles') --}}
</head>
<body>

    {{-- @include('partials.headerUnregister') --}}

{{-- <main class="container mt-5">
    @yield('content')
</main> --}}
<form>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="username" class="form-control" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Enter Username">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleConfirmPassword1">Confirm Password</label>
        <input type="password" class="form-control" id="exampleConfirmPassword1" placeholder="Password">
      </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>




{{-- @yield('testfooter') --}}

{{-- @include('partials.script') --}}

</body>
</html>

