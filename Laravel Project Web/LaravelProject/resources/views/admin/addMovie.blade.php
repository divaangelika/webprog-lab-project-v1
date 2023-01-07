

<div class="mt-5" style="justify-content:center; align-items:center; display:flex;">
    <div class="card w-50" style="background-color:rgb(175, 148, 217)">
        <div class="card-body">
            <form method="POST" action={{ url('/add')}}>
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
                    <label for="title">Title</label>
                    <input type="title" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="description" class="form-control" id="description" name="title" aria-describedby="description" placeholder="Enter description">
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="genre" class="form-control" id="genre" name="genre" aria-describedby="genre" placeholder="Enter genre">
                </div>
                <div class="form-group">
                    <label for="actor">Actor</label>
                    <input type="actor" class="form-control" id="actor" name="actor" aria-describedby="actor" placeholder="Enter actor">
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <input type="director" class="form-control" id="director" name="director" aria-describedby="director" placeholder="Enter director">
                </div>


                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
