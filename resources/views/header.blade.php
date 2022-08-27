{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-warning fs-3" href="#">Book Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item ms-2">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link">Disabled</a>
                </li>
                <form class="d-flex ms-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item ms-2">
                    <a href="" class="nav-link">Login</a>
                </li>
                <li class="nav-item ms-2">
                    <a href="" class="nav-link">Register</a>
                </li>
            </ul>
        </div>
    </div>
  </nav> --}}
  <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand text-warning" href="{{ '/shop' }}">
            {{ config('app.name', 'Laravel') }}
            <h6 class="d-inline text-light"><i>( Admin Dashboard )</i></h6>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                   <a class="nav-link" href="{{ '/logout' }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
