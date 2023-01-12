@extends('master.master')

@section('actors')

@section('content')
    <div class="px-5 py-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ url('/actors') }}" class="text-decoration-none">
                <h1 class="text-danger">Actors</h1>
            </a>
            <div class="d-flex align-items-center">
                <form action="{{ url('/actors/search') }}" class="mx-3">
                    <input type="search" class="form-control" id="" name="search"
                        placeholder="Search Actor Address">
                </form>
                {{-- if admin --}}
                @if (Auth::user() && Auth::user()->type == 1)
                    <a href="{{ url('actors/addactor') }}"><button type="button" class="btn btn-danger">Add
                            Actor</button></a>
                @endif
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-center" id="postData">
            @include('actor.actorData')
        </div>
        <div class="ajax-load text-center" style="display:none">
            <img width="30" src="{{url('storage/refresh.gif')}}">
        </div>
    </div>

    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function() {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data) {
                    if (data.html == " ") {
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#postData").append(data.html);
                })
        }
    </script>
@endsection
