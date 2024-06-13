<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Leaflet Measure CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-measure/dist/leaflet-measure.css" />

    <!-- Memanggil section style di dalam template -->


    @yield('style')

</head>

<body>
    <!-- Bootstrap JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-map-location-dot"></i>  <strong>{{$title}}</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- Tambahkan ms-auto untuk mengatur navbar di sebelah kanan -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}"><i
                            class="fa-solid fa-house"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}"><i class="fa-solid fa-earth-americas"></i> Peta Konservasi</a>
                    </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fas fa-exclamation-triangle"></i>
                        Selamatkan Penyu
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('table-point') }}">Konservasi Penyu</a></li>
                        <li><a class="dropdown-item" href="{{ route('table-polyline') }}">Jalur Migrasi Penyu</a></li>
                        <li><a class="dropdown-item" href="{{ route('table-polygon') }}">Area Potensi Tangkapan Penyu</a></li>
                    </ul>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('info') }}"><i class="fas fa-search"></i></i>
                            Jenis-Jenis Penyu</a>
                    </li>



                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i
                            class="fa-brands fa-dashcube"></i> Data</a>
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
