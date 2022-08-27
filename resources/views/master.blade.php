<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Shop</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <style>
        .wrap {
            width: 120px;
            height: 140px;
        }
        .photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .edit {
            display: block;
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
    @include('header')
    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
</body>
</html>
