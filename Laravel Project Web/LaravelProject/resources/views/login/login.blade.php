@extends('master.master')
@section('login')

  {{-- @include('partials.styles')
  @include('partials.headerUnregister') --}}


  <form method="POST" action={{ url('/login')}}>
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="remember" class="form-check-input" id="remember" value="{{ Cookie::get('password_cookie') != null ? Cookie::get('password_cookie') : '' }}">
        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>



@include('partials.script')

@endsection
