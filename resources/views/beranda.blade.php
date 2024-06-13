@extends('layouts.template')

@section('content')

    <h1 class="mb-4 text-center" style="font-family: Arial, sans-serif; color: #1b3648; font-weight: bold;">Sea Turtle - Global Environmental Conservation</h1>

<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" id="home">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active col-lg-3 col-md-5">
                <img class="w-100" src="https://pbs.twimg.com/media/DnsWS1hV4AAtzA-.jpg:large" alt="Image">
            </div>
        </div>
</div>
<!-- Carousel End -->

<!-- Top Feature Start -->
<div class="container-fluid top-feature py-5 pt-lg-0" id="condition">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square">
                            <i class="fa-solid fa-earth-americas text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="mb-4" style="font-family: Arial, sans-serif; color: #1b3648; font-weight: bold;">Spesies Langka, Terancam Punah, dan Dilindungi di Laut</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square">
                        <i class="fa-solid fa-map-location-dot text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="mb-4" style="font-family: Arial, sans-serif; color: #1b3648; font-weight: bold;">Pemetaan Potensi Ekowisata, Konservasi, dan Peteluran Penyu</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square">
                            <i class="fa-solid fa-magnifying-glass-chart text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="mb-4" style="font-family: Arial, sans-serif; color: #1b3648; font-weight: bold;">Sebaran Penjualan dan Export Penyu Ilegal</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Feature End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-end">
            <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid rounded" data-wow-delay="0.1s" src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2018/05/18/2911854059.jpg">
                <img class="img-fluid rounded" data-wow-delay="0.1s" src="https://asset-a.grid.id/crop/0x0:0x0/700x0/photo/2019/02/28/468236052.jpg">
            </div>
            <div class="col-lg-8 col-md-5 wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-4" style="font-family: Arial, sans-serif; color: #1b3648; font-weight: bold;">Mengapa Sea Turtle?</h1>
                <p class="mb-4">Sea Turtle atau Penyu merupakan satwa dilindungi berdasarkan Undang-Undang Nomor 5 Tahun 1990 tentang Konservasi Sumber Daya Alam Hayati dan Ekosistemnya. Sayangnya, masih banyak masyarakat yang memburu telur penyu untuk dijual maupun dikonsumsi. Beragam ancaman menghantui keberadaan penyu di Indonesia. Mulai dari pengambilan telur penyu, perburuan penyu dewasa untuk diambil dagingnya, dan kematian tidak sengaja karena terjerat alat pancing. Sampah di lautan juga menjadi penyebab kematian dari penyu-penyu ini. Phthalates, bahan kimia yang berasal dari plastik, kerap kali ditemukan di dalam kuning telur penyu. penyu sering mengira plastik adalah ubur-ubur, makanan favorit mereka. </p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

    <!-- About Start -->
    <div class="container-xxl py-5" id="gardener">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="https://is3.cloudhost.id/img-kbrt/2022/05/B72uyf2X-Jenis-jenis-penyu-yang-dilindungi-di-Indonesia.jpg">
                </div>
                <div class="col-lg-8 col-md-5 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="text-primary mb-0" style="font-family: Arial, sans-serif" >Terdapat</p>
                    <h1 class="text-primary mb-0" style="font-family: Arial, sans-serif; font-weight: bold">6 dari 7 Spesies Penyu</h1>
                    <p class="text-primary mb-4" style="font-family: Arial, sans-serif">Pernah Ada di Indonesia</p>
                    <p class="mb-4">Sebanyak enam dari tujuh spesies penyu di dunia berada di Indonesia. Mereka berkembang biak, mencari makan, maupun sekedar bermigrasi dari Samudera Pasifik ke Samudera Hindia dan sebaliknya. Enam spesies penyu tersebut adalah Penyu Hijau, Penyu Sisik, Penyu Pipih, Penyu Lekang, Penyu Tempayan, dan Penyu Belimbing.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

     <!-- Footer Start -->
     <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s" id="sumber">
        <div class="container py-1">
            <div class="row g-1">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Source</h4>
                    <p class="mb-2"><i class="fa-solid fa-book me-3"></i>Kementerian Kelautan dan Perikanan</p>
                    <p class="mb-2"><i class="fa-solid fa-book me-3"></i>Direktorat Jenderal Pengelolaan Ruang Laut</p>
                    <p class="mb-2"><i class="fa-solid fa-globe me-3"></i>National Geographic Indonesia</p>
                    <p class="mb-2"><i class="fa-solid fa-globe me-3"></i>World Wide Fund for Nature Indonesia</p>
                    <p class="mb-2"><i class="fa-solid fa-globe me-3"></i>Indonesia Geoportal</p>
                    <br>
                    <br>
                    <p class="mb-2">Oleh : Maureen Arsa Sanda Cantika</p>
                    <p class="mb-2">NIM  : 22/496535/SV/20972</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Location</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32654820.88251222!2d117.88879999999999!3d-2.4456499999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1718253711542!5m2!1sid!2sid" width="450" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->





@endsection
