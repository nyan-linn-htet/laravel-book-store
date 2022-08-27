@extends('master')
@section('content')

<div class="container mt-3">
    <h1 class="text-center fs-2 fw-bold text-primary">Edit Book</h1>
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
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="m-auto mt-3 w-50">
            <div class="mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}">
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea name="summary" id="summary" rows="7" class="form-control">{{ $book->summary }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" id="price" name="price" class="form-control" value="{{ $book->price }}">
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Book Cover</label>
                @if ($book->cover)
                    <img src="{{ asset('storage/covers/'.$book->cover) }}" alt="" class="edit mb-3">
                @endif
                <input type="file" id="cover" name="cover" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" id="category" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id === $book->category_id)
                            {{ 'selected' }}
                        @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mb-3">Update Book</button>
        </div>
    </form>
</div>

@endsection
