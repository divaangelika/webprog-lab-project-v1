@extends('master.master')
@section('login')


<div class="mt-5" style="justify-content:center; align-items:center; display:flex;">
    <div class="card w-50" style="background-color:rgb(175, 148, 217)">
        <div class="card-body">
            <form method="POST" action={{ route('login-post') }}>
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
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember" value="{{ Cookie::get('password_cookie') != null ? Cookie::get('password_cookie') : '' }}">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>


@include('partials.script')

@endsection
