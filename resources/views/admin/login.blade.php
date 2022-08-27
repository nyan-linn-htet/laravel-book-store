@extends('master')
@section('content')

<div class="container mt-3">
    @if (session('login'))
        <div class="alert alert-warning text-center">
            {{ session('login') }}
        </div>
    @endif
    <h1 class="text-center fs-2 fw-bold text-primary">Login To BookShop Admin</h1>
    <form method="post">
        @csrf
        <div class="m-auto mt-4 w-50">
            <div class="mb-3">
                <label for="name" class="form-label">Admin Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button class="btn btn-success">Admin Login</button>
        </div>
    </form>
</div>

@endsection
