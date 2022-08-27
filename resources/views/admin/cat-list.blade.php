@extends('master')
@section('content')

<div class="container mt-3">
    @if (session('info'))
        <div class="alert alert-info text-center">
            {{ session('info') }}
        </div>
    @endif
    <h1 class="text-center fs-2 fw-bold text-primary">Category List</h1>
    <div class="d-flex justify-content-center mt-4">
        <div class="btn btn-group btn-group-lg">
            <a class="btn btn-outline-primary @if (request()->is('admin*'))
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
    <ol class="list-group list-group-numbered mt-5">
        @foreach ($categories as $category)
            <li class="list-group-item">
                <span class="fw-bold">{{ $category->name }}</span>
                <span class="ms-2 text-decoration-underline">{{ $category->status }}</span>
                <div class="btn-group float-end">
                    <a href="{{ "/admin/cat-edit/$category->id" }}" class="btn btn-outline-secondary">Edit</a>
                    <a href="{{ "/admin/cat-delete/$category->id" }}" class="btn btn-outline-danger">Delete</a>
                </div>
            </li>
        @endforeach
    </ol>
    <a href="{{ '/admin/cat-new' }}" class="btn btn-primary mt-4 mb-3">New Category</a>
</div>

@endsection
