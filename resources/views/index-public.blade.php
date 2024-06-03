@extends('layouts.template')

@section('style')
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
@endsection

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


@section('script')

    <script>
        // Map
        var map = L.map('map').setView([-0.26558618585409494, 114.75766250602108], 6);

        // Basemap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Custom icon
        var customIcon = L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/128/8996/8996840.png',
            iconSize: [50, 50],
            iconAnchor: [15, 30],
            popupAnchor: [0, -30]
        });

        // Array to store markers
        var markers = [];

        // Add markers to the array with custom icons
        markers.push(L.marker([-1.8867159029658327, 116.17649747008426], {
            icon: customIcon
        }).bindPopup('Cagar Alam TELUK ADANG').openPopup());
        markers.push(L.marker([-1.9529201801685374, 115.88446724876997], {
            icon: customIcon
        }).bindPopup('Cagar Alam GUNUNG AMBANG').openPopup());
        markers.push(L.marker([-0.11239099218155506, 116.71101750375163], {
            icon: customIcon
        }).bindPopup('Cagar Alam MUARA KAMAN SEDULANG').openPopup());
        markers.push(L.marker([-0.3004906689327444, 115.71859364801911], {
            icon: customIcon
        }).bindPopup('Cagar Alam PADANG LUWAI').openPopup());
        markers.push(L.marker([-3.229295899869643, 116.20289273760316], {
            icon: customIcon
        }).bindPopup('Cagar Alam SELAT SEBUKU LAUT KELUMPANG').openPopup());
        markers.push(L.marker([-2.751595777202152, 115.44858539754459], {
            icon: customIcon
        }).bindPopup('Cagar Alam GUNUNG KENTAWAN').openPopup());
        markers.push(L.marker([-1.7413376120786528, 116.08521099831401], {
            icon: customIcon
        }).bindPopup('Cagar Alam SUNGAI LULAN-BULAN').openPopup());
        markers.push(L.marker([-2.6248245106162797, 116.29290710754951], {
            icon: customIcon
        }).bindPopup('Cagar Alam TELUK PAMUKAN').openPopup());
        markers.push(L.marker([-3.6563876059357443, 116.24125908460391], {
            icon: customIcon
        }).bindPopup('Cagar Alam GUNUNG SEBATUNG').openPopup());
        markers.push(L.marker([-1.9903448575590303, 113.75644692883478], {
            icon: customIcon
        }).bindPopup('Cagar Alam Bukit TANGKILING').openPopup());

        // Add markers to the map
        for (var i = 0; i < markers.length; i++) {
            markers[i].addTo(map);
        }




        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='' width='200'>";

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
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
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

        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='' width='200'>";

                ;
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


        //Layer Control
        var overlayMaps = {
            "Point": point,
            "Polyline": polyline,
            "Polygon": polygon
        };

        var layerControl = L.control.layers(null, overlayMaps, {
            collapsed: false
        }).addTo(map);
    </script>
@endsection
</body>

</html>
