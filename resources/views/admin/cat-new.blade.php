@extends('master')
@section('content')

<div class="container mt-3">
    <h1 class="text-center fs-2 fw-bold text-primary">New Category</h1>
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
    <form method="post">
        @csrf
        <div class="m-auto mt-3 w-50">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <textarea name="status" id="status" rows="7" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary">Add Category</button>
        </div>
    </form>
</div>

@endsection
