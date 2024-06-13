@extends('layouts.template')

@section('style')
    {{-- sebagai pembuka untuk membuat section dengan nama style --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0%;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0%;
        }
    </style>
@endsection

@section('content')
    <div id="map"></div>

    <!-- Modal Create Point-->
    <div class="modal fade" id="PointModal" tabindex="-1" aria-labelledby="PointModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Location</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-point') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- untuk security laravel-->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill point name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_point" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById
                    ('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="Preview" id="preview-image-point" class="img-thumbnail"
                                width="400">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa-solid fa-xmark"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Create Polyline-->
    <div class="modal fade" id="PolylineModal" tabindex="-1" aria-labelledby="PolylineModalLabel" aria-hidden="true">
        <!-- id="exampleModal" berfungsi untuk memanggil modal supaya tertampil -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PolylineModalLabel"><i class="fa-solid fa-lines-leaning"></i> Track</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-polyline') }}" method="POST" enctype="multipart/form-data">
                        <!-- csrf sebagai security -->
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Location</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Tambahkan Nama Garis">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geometry" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polyline" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_polyline" name="image"
                                onchange="document.getElementById
                    ('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="Preview" id="preview-image-polyline" class="img-thumbnail"
                                width="400">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Create Polygon-->
    <div class="modal fade" id="PolygonModal" tabindex="-1" aria-labelledby="PolygonModalLabel" aria-hidden="true">
        <!-- id="exampleModal" berfungsi untuk memanggil modal supaya tertampil -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PolygonModalLabel"><i class="fa-solid fa-draw-polygon"></i> Buat
                        Area</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-polygon') }}" method="POST" enctype="multipart/form-data">
                        <!-- csrf sebagai security -->
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Location</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Tambahkan Nama Titik Lokasi">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geometry" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polygon" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_polygon" name="image"
                                onchange="document.getElementById
                    ('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="Preview" id="preview-image-polygon" class="img-thumbnail"
                                width="400">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
    <script>
        // Map
        var map = L.map('map').setView([-5.238616562347336, 111.99556480716974], 6);

        // Basemaps
        var openCycleMap = L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Tiles &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

//Layer Control
var baseMaps = {
    "OpenCycleMap": openCycleMap,
};

        var layerControl = L.control.layers(null, baseMaps, {
            collapsed: false
        }).addTo(map);

        // Array untuk menyimpan marker
var markers = [];

// Custom icon
var customIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/128/2739/2739328.png', // Menggunakan URL 'potensi.png'
    iconSize: [35, 40],
    iconAnchor: [5, 5],
    popupAnchor: [0, -4]
});

// Koordinat titik yang ingin ditambahkan
var coordinates = [
    [-7.139721937921764, 105.36290758921393],
    [-8.564192806588654, 112.69067882372504],
    [-8.886693550386523, 114.21330627923444],
    [-10.17376166411333, 115.16883271986859],
    [-8.341249962313247, 116.61658805333387],
    [-4.842481545544558, 133.1439502660333],
    [-2.1563536447314475, 134.00624154985235],
    [-0.4061468159709243, 132.62134948796114],
    [0.01193041805333866, 130.81837680361227],
    [1.5795327462622828, 125.17428799397761],
    [1.814599787652567, 124.0245662822189],
    [-3.930618800256537, 124.33812674906217],
    [-6.402691853529852, 120.7060513110097],
    [-8.640720819546864, 118.01560843634098],
    [-5.696154546845601, 110.85724818719376],
    [-5.638240949553969, 105.13056026553345],
    [-4.571660103167036, 104.36234595059534],
    [4.640347180225509, 118.65610536568306],
    [2.365230862544966, 109.22938907495572],
    [0.9553933604224853, 95.74286014111891],
    [-1.2908978191725506, 98.76915858581636],
    [-0.9068620585135458, 100.08443444831947],
    [-2.372812208608833, 101.08544085695016]

];

// Iterasi melalui koordinat untuk membuat marker, menambahkan popup, dan menambahkannya ke array markers
coordinates.forEach(function(coord) {
    var marker = L.marker(coord, { icon: customIcon }).addTo(map);
    marker.bindPopup("Potensi Ekowisata"); // Menambahkan popup pada marker
    markers.push(marker);
});


// Array untuk menyimpan marker
var markers = [];

// Custom icon
var customIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/128/7591/7591718.png', // Menggunakan URL 'potensi.png'
    iconSize: [35, 40],
    iconAnchor: [5, 5],
    popupAnchor: [0, -4]
});
// Koordinat titik yang ingin ditambahkan
var coordinates = [
    [-7.1008940682566015, 105.0258485254635],
    [-5.747175506362941, 104.67428604327651],
    [-8.146244200957188, 107.99215696891635],
    [-8.472373651351253, 112.1889341000237],
    [-9.058703511287455, 111.41989117023965],
    [-8.754796064368088, 114.64987147533272],
    [-9.01530368932289, 114.45211757910253],
    [-9.16718011191878, 116.51754718199084],
    [-9.795678947041184, 116.2099300100772],
    [-4.3683219073008015, 102.58688382533082],
    [-1.2084079911118546, 99.66452053072106],
    [1.1205325204266674, 98.2802431168324],
    [2.877206418983343, 96.76412989236132],
    [3.8204065701807033, 95.46774307007328],
    [-0.8349328288036812, 104.74020364463347],
    [-3.6450012370506903, 106.41012558977214],
    [-6.096861269780406, 112.7382504327951],
    [-7.275293785889064, 114.62789891037434],
    [-3.666929209875346, 113.94674679151348],
    [-1.362177863046413, 109.85983293608956],
    [-4.653081474788519, 135.23825026134503],
    [-3.9957820503750057, 121.06588769706813],
    [-4.609279608662258, 119.33004794126981],
    [-1.7355759283565242, 131.5907896956914],
    [1.493969757028148, 129.15182498553884]


];

// Iterasi melalui koordinat untuk membuat marker, menambahkan popup, dan menambahkannya ke array markers
coordinates.forEach(function(coord) {
    var marker = L.marker(coord, { icon: customIcon }).addTo(map);
    marker.bindPopup("Lokasi Perteluran Penyu"); // Menambahkan popup pada marker
    markers.push(marker);
});


 // Custom icon
 var customIcon = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/128/4955/4955794.png', // Menggunakan URL 'potensi.png'
        iconSize: [40, 40],
        iconAnchor: [5, 5],
        popupAnchor: [0, -4]
    });

    // Array untuk menyimpan koordinat dan konten popup
    var locations = [
        { coords: [4.930323608496563, 96.6522279052684], popupContent: "<strong>PULAU BANYAK ACEH</strong> <br> Pada tahun 1994, Anders de Vos dikenal dengan nama Mahmud Bengkaru seorang warga Swedia, memelopori kegiatan konservasi di kawasan ini dengan mendirikan Yayasan Pulau Banyak. Lembaga ini menghentikan kegiatannya akibat instabilitas politik, tahun 2001. Hal ini menyebabkan kembali maraknya perdagangan telur penyu di area ini, hingga 10 ribu butir/bulan." },
        { coords: [-6.381762472588881, 106.76449283140371], popupContent: "<strong>JAKARTA</strong> <br> Pada Expo Flora Fauna 2008 di Lapangan Banteng, terdapat pedagang yang menjual bebas tukik penyu hijau." },
        { coords: [-4.274787028017785, 122.75640619126537], popupContent: "<strong>WAKATOBI SULAWESI TENGGARA</strong> <br> ProFauna mencatat bahwa pemasok penyu terbanyak ke Bali adalah Wanci (Kabupaten Wakatobi), rata-rata 600 ekor/tahun yang ditangkap di perairan Taman Nasional Wakatobi. Menurut hasil investigasi ProFauna (2007), meski perdagangan penyu di daerah ini dilakukan dengan cara sembunyi-sembunyi, diperkirakan dalam 1 tahun ada 1.115 ekor penyu yang diperdagangkan. Walau begitu, perdagangan penyu di Sulawesi Tenggara telah menurun drastis dibanding sebelum 2006. Pada tahun 2008, Pemkab Wakatobi membangun stasiun pemantau di seluruh pulau di wilayah itu untuk melindungi penyu dari aktivitas pencurian. Setiap stasiun dilengkapi kapal untuk memantau pelaku pencurian." },
        { coords: [-8.293442866047702, 115.22317328284143], popupContent: "<strong>BALI</strong> <br> Merupakan pusat perdagangan ilegal penyu di Indonesia. Tingginya permintaan untuk perdagangan penyu di Bali telah mendorong para penangkap penyu berlayar hingga ke Jawa, Sulawesi, Kalimantan, Flores & Irian Jaya untuk mencari penyu. Tahun 1991, Tanjung Benoa dijadikan satu-satunya pintu masuk perdagangan penyu. Berdasarkan data Kelompok Pelestari Penyu Tanjung Benoa perdagangan penyu telah semakin berkurang, dari 1.500 ekor pada tahun 2000 menjadi 569 pada tahun 2003 (Adnyana, 2004)" },

    ];

    // Array untuk menyimpan marker
    var markers = [];

    // Iterasi melalui setiap lokasi untuk membuat marker, menambahkan popup, dan menambahkannya ke array markers
    locations.forEach(function(location) {
        var marker = L.marker(location.coords, { icon: customIcon }).addTo(map);
        marker.bindPopup(location.popupContent); // Menambahkan popup pada marker
        markers.push(marker);
    });


 // Custom icon
 var customIcon = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/128/14163/14163392.png', // Menggunakan URL 'potensi.png'
        iconSize: [40, 40],
        iconAnchor: [5, 5],
        popupAnchor: [0, -4]
    });

    // Array untuk menyimpan koordinat dan konten popup
    var locations = [
        { coords: [7.299647445592703, 104.42545483714714], popupContent: "Sebagian penyu di Indonesia diselundupkan ke Cina yang merupakan pasar terbesar perdagangan penyu untuk makanan maupun obat tradisional. Padahal sejak 2001, Cina sudah mengeluarkan kebijakan melarang impor semua jenis penyu dari Kamboja, Thailand, dan Indonesia." },

    ];

    // Array untuk menyimpan marker
    var markers = [];

    // Iterasi melalui setiap lokasi untuk membuat marker, menambahkan popup, dan menambahkannya ke array markers
    locations.forEach(function(location) {
        var marker = L.marker(location.coords, { icon: customIcon }).addTo(map);
        marker.bindPopup(location.popupContent); // Menambahkan popup pada marker
        markers.push(marker);
    });



        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: true,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON(); //membuat gambaran json objek dari geojson
            var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry);
            //objek geometry dikonvert menggunakan terraformer menjadi format WKT

            console.log(drawnJSONObject);
            console.log(objectGeometry);

            if (type === 'polyline') {
                console.log("Create " + type);
                // Set value geometry to input geom
                $("#geom_polyline").val(objectGeometry);

                // Show modal polyline
                $("#PolylineModal").modal('show');

            } else if (type === 'polygon' || type === 'rectangle') {
                console.log("Create " + type);
                // Set value geometry to input geom
                $("#geom_polygon").val(objectGeometry);

                // Show modal polygon
                $("#PolygonModal").modal('show');

            } else if (type === 'marker') {
                // Set value geometry to input geom
                $("#geom_point").val(objectGeometry);

                // Show modal point
                $("#PointModal").modal('show');
            } else {
                console.log('__undefined__');
            }

            drawnItems.addLayer(layer);
        });


        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "<strong>Nama:</strong> " + "<br>" + feature.properties.name + "<br>" +
                    "<strong>Deskripsi:</strong> " + "<br>"
                    + feature.properties.description + "<br>" +
                    "<img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='' width='200'>";

                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

        /* GeoJSON Polyline */
        var polyline = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "<strong>Nama:</strong> " + "<br>" + feature.properties.name + "<br>" +
                    "<strong>Deskripsi:</strong> " + "<br>"
                    + feature.properties.description + "<br>" +
                    "<img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='' width='200'>";
                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });




        //Layer Control
        var overlayMaps = {
            "Konservasi": point,
            // "Jalur Migrasi": polyline,
        //    "Area Tangkapan": polygon,
        };

        var layerControl = L.control.layers(null, overlayMaps, {
            collapsed: false
        }).addTo(map);

        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "<strong>Nama:</strong> " + "<br>" + feature.properties.name + "<br>" +
                    "<strong>Deskripsi:</strong> " + "<br>"
                    + feature.properties.description + "<br>" +
                    "<img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='' width='200'>";

                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        /* Function to generate a random color */
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

            /* Load GeoJSON */
fetch('storage/geojson/batimetri.geojson')
    .then(response => response.json())
    .then(data => {
        L.geoJSON(data, {
            style: function(feature) {
                return {
                    opacity: 1,
                    color: "grey",
                    weight: 0.5,
                    fillOpacity: 1,
                    fillColor: getRandomColor(),
                };
            },
            onEachFeature: function(feature, layer) {
                var content = "Kedalaman: " + feature.properties.Kedalaman;
                layer.on({
                    click: function(e) {
                        // Fungsi ketika objek diklik
                        layer.bindPopup(content).openPopup();
                    },
                });
            }

        }).addTo(map);
    })
    .catch(error => {
        console.error('Error loading the GeoJSON file:', error);
    });


    </script>
@endsection
</body>

</html>
