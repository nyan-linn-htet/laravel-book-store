@extends('layouts.app')
@section('content')

<div class="container text-center mt-3">
    <div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-3">
        @foreach ($books as $book)
            <div class="col">
                <a href="{{ "/shop/book-detail/$book->id" }}" class="text-decoration-none">
                    <div class="card" style="height: 280px">
                        <div class="wrap">
                            @if ($book->cover)
                                <img src="{{ (asset('storage/covers/'. $book->cover)) }}" class="card-img-top photo">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="cart-title" style="color: darkslateblue">{{ $book->title }}</h5>
                            <i class="cart-text text-danger">$ {{ $book->price }}</i><br>
                            <a href="{{ "/cart/add/$book->id" }}" class="btn btn-success mt-2">Add to Cart</a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection
