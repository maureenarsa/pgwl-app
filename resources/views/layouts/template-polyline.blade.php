<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>
        {{-- Memanggil tittle dari map controller menggunakan variable $title  --}}

        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>

        <!-- Bootstrap CSS -->
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        {{--Fontawesome--}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @yield('style')
        {{-- untuk menampilkan section style di dalam template--}}
    </head>


    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-earth-asia"></i> {{ $title}}</a>
            {{-- Memanggil tittle dari map controller menggunakan variable $title  --}}

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    {{-- menambahkan ms-auto untuk mengubah letak tab menu menjadi disebelah kanan --}}
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('table-polyline') }}"><i class="fa-solid fa-table"></i> Table Polylines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('info') }}"><i class="fa-solid fa-circle-info"></i> Info</a>
                </li>

                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i
                            class="fa-brands fa-dashcube"></i> Dashboard</a>
                    </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="nav-item"></li>
                            <button class="nav-link text-danger" type="submit"><i class="fa-solid fa-right-from-bracket"></i>
                                Logout</button>
                            </li>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i>
                                Login</a>
                        </li>
                    @endif
                </ul>
            </div>
            </div>
        </nav>

        @yield('content')
        {{-- untuk menampilkan section content di dalam template--}}

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        {{-- Bootstrap JS --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        {{-- jQUERY --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        @include('components.toast')

        @yield('script')
        {{-- untuk menampilkan section script di dalam template--}}
    </body>
</html>
