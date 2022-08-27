@extends('layouts.app')
@section('content')

<?php
    use App\Models\Book;
    $num = 1;
    $total = 0;
?>

<div class="container">
    <h1 class="fw-bold text-center text-primary">My Cart</h1>
    @if (session('cart'))
        <table class="table table-dark table-striped table-bordered">
            <tr>
                <th>NO</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Remove</th>
                <th>Total</th>
            </tr>
            @foreach (session('cart') as $id => $qty)
            <?php
                $book = Book::find($id);
                $total += $book->price * $qty;
            ?>
                <tr>
                    <td>{{ $num++ }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->price }} Ks</td>
                    <td>
                        {{ $qty }}
                        <div class="btn-group btn-group-sm float-end">
                            <a href="{{ "/cart/add/$book->id" }}" class="btn btn-success">+</a>
                            <a href="{{ "/cart/remove/$book->id" }}" class="btn btn-danger">-</a>
                        </div>
                    </td>
                    <td>
                        <a href="{{ "/cart/delete/$book->id" }}" class="btn btn-sm btn-danger">&times</a>
                    </td>
                    <td>{{ $book->price * $qty }} Ks</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5" align="right">Total :</td>
                    <td>{{ $total }} Ks</td>
                </tr>
        </table>
        <div style="width: 500px" class="me-auto mt-5">
            <h2 class="text-primary fw-bold mb-3">Order Now</h2>
            <form method="post" action="{{ '/order' }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" rows="7" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary">Submit Order</button>
                <a href="{{ '/shop' }}" class="ms-3">Continue Shopping</a>
            </form>
        </div>
    @else
        <div class="alert alert-danger">
            Your Cart is currently empty.
        </div>
        <a href="{{ '/shop' }}">Continue Shopping</a>
    @endif
</div>

@endsection
