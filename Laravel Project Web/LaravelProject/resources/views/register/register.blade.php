@extends('master.master')
@section('register')
{{-- <h1>test123</h1> --}}

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
@endsection
