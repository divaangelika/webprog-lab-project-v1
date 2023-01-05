@extends('master.master')
@section('login')

  {{-- @include('partials.styles')
  @include('partials.headerUnregister') --}}


<form method="POST" action={{ url('/login')}}>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="remember" class="form-check-input" id="remember" value="{{ Cookie::get('password_cookie') != null ? Cookie::get('password_cookie') : '' }}">
        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>


@include('partials.script')

@endsection