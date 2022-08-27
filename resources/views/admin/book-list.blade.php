@extends('master')
@section('content')

<div class="container mt-3">
    @if (session('info'))
        <div class="alert alert-info text-center">
            {{ session('info') }}
        </div>
    @endif
    <h1 class="text-center fs-2 fw-bold text-primary">Book List</h1>
    <div class="d-flex justify-content-center mt-4">
        <div class="btn btn-group btn-group-lg">
            <a class="btn btn-outline-primary @if (request()->is('admin'))
                active
            @endif" href="{{ '/admin' }}">Manage Categories</a>

            <a class="btn btn-outline-primary @if (request()->is('admin/book*'))
                active
            @endif" href="{{'/admin/book-list'}}">Manage Books</a>

            <a class="btn btn-outline-primary @if (request()->is('admin/order*'))
                active
            @endif" href="{{'/admin/order-list'}}">Manage Orders</a>
        </div>
    </div>
    <div class="row g-3 mt-4 mb-3">
        @foreach ($books as $book)
            <div class="col-9 border-bottom border-secondary">
                <h1 class="fs-3 fw-bold" style="color: #0f5ba3">{{ $book->title }}</h1>
                <i>by {{ $book->author }}</i>
                <small>( in {{ $book->category->name }} )</small><br>
                <i class="fs-5" style="color: #3f039e">{{ $book->price }} Ks</i>
                <p>{{ $book->summary }}</p>
                <div class="btn-group btn-group-sm mb-3">
                    <a href="{{ "/admin/book-edit/$book->id" }}" class="btn btn-outline-secondary">Edit</a>
                    <a href="{{ "/admin/book-delete/$book->id" }}" class="btn btn-outline-danger">Delete</a>
                </div>
            </div>
            <div class="col-3 border-bottom border-secondary">
                <div class="wrap mb-3">
                    @if ($book->cover)
                        <img src="{{ asset('storage/covers/'.$book->cover) }}" alt="" class="photo border">
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ '/admin/book-new' }}" class="btn btn-primary mb-3">New Book</a>
</div>

@endsection
