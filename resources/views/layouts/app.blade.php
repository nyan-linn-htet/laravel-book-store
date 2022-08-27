<?php
    use App\Models\Category;

    $categories = Category::all();

    $cart = 0;
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .wrap {
            height: 120px;
            border-bottom: 1px solid rgb(104, 104, 104, 0.3);
        }
        .photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .detail {
            width: 250px;
            height: 200px;
            margin: 25px auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand text-warning">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ms-4">
                        <li class="nav-item">
                            <a href="{{ '/shop' }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item ms-3 dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ '/shop' }}" class="dropdown-item">All Categories</a></li>
                                @foreach ($categories as $category)
                                    <li><a href="{{ "/shop/$category->id" }}" class="dropdown-item">
                                        {{ $category->name }}
                                    </a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item ms-3">
                            @if (session('cart'))
                                @foreach (session('cart') as $qty)
                                    <?php $cart += $qty; ?>
                                @endforeach
                            @endif
                            <a href="{{ '/cart' }}" class="nav-link">
                                Cart [ <span class="text-danger">{{ $cart }}</span> ]
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
