@extends('master.master')
      <div class="content-box d-flex justify-content-center align-items-center">
        <div class="box">
          <div
            class="search-add-product-box d-flex justify-content-between align-items-start"
          >
            <form action="{{route('manage-movie')}}" method="get">
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Product Name"
                  aria-label="Product Name"
                  aria-describedby="search"
                  name="search"
                />
                <button
                  type="submit"
                  class="input-group-text btn btn-secondary"
                  id="search"
                >
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </div>
            </form>

            <a href="{{route('add-movie')}}" class="btn btn-secondary"
              >Add Movie <i class="fa-solid fa-plus"></i
            ></a>
          </div>
            @foreach($movies as $movie)
                <div class="product-item bg-white d-flex">
                    <div class="product-image">
                        <img src="{{asset('storage/pictures/product/'.$product->image)}}" alt="{{$product->name}}" />
                    </div>

                    <div class="product-detail">
                        <p class="">{{$movie->name}}</p>
                    </div>

                    <div class="product-buttons d-flex flex-row gap-1">
                        <a href="{{route('update-product', $movie->id)}}" style="text-decoration: none">
                            <button class="btn btn-outline-warning">
                                <i class="fa-sharp fa-solid fa-pen"></i>
                            </button>
                        </a>

                        <form action="{{ route('delete-movie', $movie->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
      </div>
    </main>
@endsection
