<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ Request::path() == '/' ? 'Home' : ucfirst(strtolower(Request::path())) }} | {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/warehouse-solid.svg') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css" integrity="INTEGRITY_HASH" crossorigin="anonymous" />

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/92c1a07368.js" crossorigin="anonymous" defer></script>

</head>

<body>

    <div id="app">

        <nav id="nav">
            <div class="navbar-brand">
                <i class="fa-solid fa-warehouse"></i>
                <h4>Inventory Management</h4>
            </div>

            <div class="navbar-links">
                <a class="navbar-itemm" href="{{ url('/home') }}">
                    <i class="fa-solid fa-home"></i>
                    <p>Home</p>
                </a>
                <a class="navbar-itemm" href="{{ url('/user') }}">
                    <i class="fa-solid fa-user"></i>
                    <p>User</p>
                </a>
                <a class="navbar-itemm" href="{{ url('/item') }}">
                    <i class="fa-solid fa-box"></i>
                    <p>Item</p>
                </a>
                <a class="navbar-itemm" href="{{ url('/room') }}">
                    <i class="fa-solid fa-cubes"></i>
                    <p>Room</p>
                </a>
                <a class="navbar-itemm" href="{{ url('/category') }}">
                    <i class="fa-solid fa-tag"></i>
                    <p>Category</p>
                </a>
            </div>

            <div class="navbar-user dropdown-button">
                <p class="name-user">{{ Auth::user()->name, 18 }}</p>
                <div class="dropdown-container">
                    <div class="dropdown-itemm">
                        {{ Auth::user()->email }}
                    </div>
                    <div class="dropdown-itemm">
                        Authority : {{ ucfirst(strtolower(Auth::user()->authority)) }}
                    </div>
                    <a class="dropdown-actionn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="navbar-collapse">
                <div id="button-collapse-nav">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
            </div>
        </nav>

        <main>
            <header>
                <div id="button-reveal-nav">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <h2 class="header-title">
                    {{ ucfirst(strtolower(Request::path())) }}
                </h2>
                <div class="date" style="margin-left: auto;">
                    {{ now()->format('F j, Y') }}
                </div>
            </header>

            <div class="container pt-4 px-0">
                @yield('content')
            </div>

        </main>

    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
    @yield('script')

</body>

</html>