@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="text-center fs-2 fw-bold text-primary mb-4">Book Detail</h1>
    <div class="card m-auto" style="max-width: 800px;">
        <div class="row g-0">
            <div class="col-lg-4 col-md-6">
                <img src="{{ (asset('storage/covers/'.$book->cover)) }}" class="img-fluid p-4" alt="...">
            </div>
            <div class="col-lg-8  col-md-6">
                <div class="card-body">
                    <h5 class="card-title fw-bold fs-2" style="color: darkslateblue">{{ $book->title }}</h5>
                    <i class="card-text fs-5">by {{ $book->author }}</i><br>
                    <b class="card-text text-danger">$ {{ $book->price }}</b>
                    <p class="card-text">{{ $book->summary }}</p>
                    <a href="{{ "/shop/add-cart/$book->id" }}" class="btn btn-success">Add to Cart</a>
                    <a href="{{ '/shop' }}" class="btn btn-secondary float-end">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
