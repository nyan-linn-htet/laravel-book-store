@extends('master')
@section('content')

<div class="container mt-4">
    <h1 class="text-center fs-2 fw-bold text-primary">Order List</h1>
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
    @if (session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif
    <ul class="list-group mt-3">
        @foreach ($orders as $order)
            <li class="list-group-item">
                <div class="row">
                    <div class="col @if ($order->status)
                        text-decoration-line-through text-danger
                    @endif">
                        <div class="mb-2">
                            <b>Name : </b><i>{{ $order->name }}</i>
                        </div>
                        <div class="mb-2">
                            <b>Email : </b><i>{{ $order->email }}</i>
                        </div>
                        <div class="mb-2">
                            <b>Phone : </b><i>{{ $order->phone }}</i>
                        </div>
                        <div class="mb-2">
                            <b>Address : </b><p class="d-inline">{{ $order->address }}</p>
                        </div>
                        <div class="mb-2">
                            @if ($order->status)
                                <a href="{{ "/admin/deliver/$order->id" }}?status=0" class="btn btn-primary btn-sm">Undo</a>
                            @else
                                <a href="{{ "/admin/deliver/$order->id"}}?status=1" class="btn btn-primary btn-sm">Delivered</a>
                            @endif
                        </div>
                    </div>
                    <?php
                        $items = DB::table('order_items')
                        ->select('*', 'books.title')
                        ->leftJoin('books', 'books.id', '=', 'order_items.book_id')
                        ->where('order_items.order_id', '=', $order->id)
                        ->get();
                    ?>
                    <div class="col">
                        @foreach ($items as $item)
                        <b>
                            <a href="{{ "/shop/book-detail/$item->book_id" }}">{{ $item->title }}</a>
                            ( {{ $item->quantity }} ) <br>
                        </b>
                        @endforeach
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection
