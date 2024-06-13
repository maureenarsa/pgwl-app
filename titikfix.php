<!DOCTYPE html>
<html lang="en">
<head>
<!-- Metadata -->
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="author" content="DIVSIG UGM">
<meta name="description" content="leaflet basic">

<!-- Judul pada tab browser -->
<title>LeafletJS - Covid-19 Map</title>

<!-- Leaflet CSS Library -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css">

<!-- Tab browser icon -->
<link rel="icon" type="image/x-icon" href="http://luk.staff.ugm.ac.id/logo/UGM/Resmi/Warna.gif">

<style>
/* Tampilan peta fullscreen */
html, body, #map {
    height: 100%;
    width: 100%;
    margin: 0px;
}
</style>
</head>

<body>
<h2>  Persebaran Kecamatan Sleman & Gedung SV UGM</h2>
<!-- Leaflet JavaScript Library -->
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
<div id="map"></div>

<script>
/* Initial Map */  
var map = L.map('map').setView([-7.774004863681996, 110.37412656192144],5); //lat, long, zoom
var iconURL = 'https://cdn-icons-png.flaticon.com/128/5193/5193743.png';

    var customIcon = L.icon({
        iconUrl: iconURL,
        iconSize: [43, 43],
        iconAnchor: [16, 25],
        popupAnchor: [0, -25],
        tooltipAnchor: [16, -20]
    });



/* Tile Basemap */ 
var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIG UGM" target="_blank">DIVSIG UGM</a>' //menambahkan nama//
});

var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
});
var basemap3 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri | <a href="Lathan WebGIS" target="_blank">DIVSIG UGM</a>'
});
var basemap4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
});

var basemap5 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Specialty/DeLorme_World_Base_Map/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Copyright: &copy;2012 DeLorme'
});

var basemap6 = L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.{ext}', {
	attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	ext: 'png'
});

var basemap7 = L.tileLayer('https://tiles.stadiamaps.com/tiles/stamen_terrain_background/{z}/{x}/{y}{r}.{ext}', {
	attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://www.stamen.com/" target="_blank">Stamen Design</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	ext: 'png'
});


/* Layer Marker */
var markers = [
        { coords: [-7.773609940175954, 110.37368438913612], popupText: "DTHV SV UGM" },
        { coords: [-7.774395436255745, 110.37338093181003], popupText: "DTS SV UGM" },
        { coords: [-7.774684829170679, 110.37448855102431], popupText: "DTK SV UGM" },
        { coords: [-7.77556804009193, 110.37412060902754], popupText: "DTEDI SV UGM" },
        { coords: [-7.773840120291548, 110.37434836204532], popupText: "B Inggris SV UGM" },
        { coords: [-7.773759557476038, 110.3737450572719], popupText: "Pengelolaan Hutan SV UGM" },
        { coords: [-7.77511599123686, 110.37312988405148], popupText: "DTM SV UGM" },
        { coords: [-7.773903624942889, 110.37393066549652], popupText: "DBSMB SV UGM" },
        { coords: [-7.774181395811767, 110.37470180528747], popupText: "DLIKES SV UGM" },
        { coords: [-7.774255766039311, 110.38024765291583], popupText: "DEB SV UGM" }
    ];

    var createdMarkers = [];

markers.forEach(function(markerData) {
    var marker = L.marker(markerData.coords, { icon: customIcon });
    marker.addTo(map);
    marker.bindPopup(markerData.popupText);
    createdMarkers.push(marker);
});


// Control Layer
var overlayMaps = {};
    createdMarkers.forEach(function(marker, index) {
        overlayMaps["Marker " + (index + 1)] = marker;
    });

    var baseMaps = {
        "OpenStreetMap": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap' }),
        "Esri World Street": L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', { attribution: 'Esri World Street' }),
        "Esri Imagery": L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', { attribution: 'Esri Imagery' }),
        "Stadia Dark Mode": L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', { attribution: 'Stadia Dark Mode' }),
        "EsriDeLorme": L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Specialty/DeLorme_World_Base_Map/MapServer/tile/{z}/{y}/{x}', { attribution: 'EsriDeLorme' }),
        "OSMBright": L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.{ext}', { attribution: 'OSMBright', ext: 'png' }),
        "StamenTerrainBackground": L.tileLayer('https://tiles.stadiamaps.com/tiles/stamen_terrain_background/{z}/{x}/{y}{r}.{ext}', { attribution: 'StamenTerrainBackground', ext: 'png' })
    };


L.control.layers(baseMaps, overlayMaps, {collapsed: false}).addTo(map);

/* Scale Bar */
L.control.scale({
    maxWidth: 150,
    position:'bottomright'
}).addTo(map);

<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pgweb-acara8";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM jumlahpenduduk";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $lat = $row["latitude"];
                $long = $row["longitude"];
                $info = $row["kecamatan"];
                echo "L.marker([$lat, $long]).addTo(map).bindPopup('$info');";
            } 
        }
        else {
            echo "0 results";
        }
            $conn->close();
    ?>


</script>
</body>
</html>
