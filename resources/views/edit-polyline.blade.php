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

    <!-- Modal Create Polyline-->
    <div class="modal fade" id="PolylineModal" tabindex="-1" aria-labelledby="PolylineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Polyline</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update-polyline', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill polyline name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polyline" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_polyline" name="image"
                                onchange="document.getElementById
                    ('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">

                    <input type="hidden" class="from-control" id="image_old" name="image_old">

                        </div>
                        <div class="mb-3">
                            <img src="" alt="Preview" id="preview-image-polyline" class="img-thumbnail"
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
@endsection

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/@terraformer/wkt"></script>
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

        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: false,
                polygon: false,
                rectangle: false,
                circle: false,
                marker: false,
                circlemarker: false
            },
            edit: {
                featureGroup: drawnItems,
                edit: true,
                remove: false
            }
        });

        map.addControl(drawControl);

        map.on('draw:edited', function(e) {
            var layer = e.layers;

            layer.eachLayer(function(layer) {
                var geojson = layer.toGeoJSON();

                var wkt = Terraformer.geojsonToWKT(geojson.geometry);

                $('#name').val(layer.feature.properties.name);
                $('#description').val(layer.feature.properties.description);
                $('#geom_polyline').val(wkt);
                $('#image_old').val(layer.feature.properties.image);
                $('#preview-image-polyline').attr('src', '{{ asset('storage/images') }}/' + layer.feature
                    .properties.image);
                $('#PolylineModal').modal('show');
            });
        });


        /* GeoJSON Polyline */
        var polyline = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                drawnItems.addLayer(layer);

                var popupContent = "<h4>" + feature.properties.name + "</h4>" +
                    "" + feature.properties.description + "<br>" +
                    "<hr><img src='{{ asset('storage/images') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='' width='200'>";



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
        $.getJSON("{{ route('api.polyline', $id) }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
            map.fitBounds(polyline.getBounds());
        });
    </script>
@endsection
</body>

</html>
