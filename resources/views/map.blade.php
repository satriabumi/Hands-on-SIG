<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Dasar Peta Interaktif</title> 
     
    <!-- Leaflet.js CDN --> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" /> 
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script> 
 
    <!-- Google Maps API --> 
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_maps_api_key')}}"></script> 
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
        } 
        h1 { 
            text-align: center; 
            padding: 10px; 
        } 
        #leaflet-map, #google-map { 
            height: 400px; 
            margin: 20px auto; 
            max-width: 90%; 
        } 
    </style> 
</head> 
<body>
<h1>Peta Interaktif dengan Laravel</h1> 
 
 <div id="leaflet-map"></div> 
 <div id="google-map"></div> 

 <script>
    // marker untuk leaflet dan gmaps
    const mapsObj = [
      {
        lat: -8.6509,
        lng: 115.2194,
        caption: "<b>Universitas Udayana</b><br>Denpasar, Bali",
        title: "Universitas Udayana",
      },
      {
        lat: -8.572630418357104, 
        lng: 115.23350011286597,
        caption: "<b>Rumah Satria Bumi Kelana</b><br>Badung, Bali",
        title: "Rumah Satria Bumi Kelana",
      },
      {
        lat: -8.686363335556855,
        lng: 115.2628117542978,
        caption: "<b>Icon Bali</b><br>Denpasar, Bali",
        title: "Icon Bali",
      },
      {
        lat: -8.373753459221685, 
        lng: 115.45248159477012,
        caption: "<b>Pura Agung Besakih</b><br>Karangasem, Bali",
        title: "Pura Agung Besakih",
      },
      {
        lat: -8.671554486137639, 
        lng: 115.23385908128104,
        caption: "<b>Monumen Bajra Sandhi</b><br>Denpasar, Bali",
        title: "Monumen Bajra Sandhi",
      },
      {
        lat: -8.810300111629076,
        lng: 115.16760910543631,
        caption: "<b>Taman Budaya Garuda Wisnu Kencana</b><br>Badung, Bali",
        title: "Taman Budaya Garuda Wisnu Kencana",
      },
    ];

    // global var (titik awal maps dibuka)
    let zoomGmaps = 10;
    let zoomLeaflet = 10;
    const INITPOS = {
      lat: -8.6509,
      lng: 115.2194
    };

    // inisiasi Leaflet.js Map
    const leafletMap = L.map('leaflet-map').setView([INITPOS.lat, INITPOS.lng], zoomLeaflet);

    // inisiasi Google Maps API
    const googleMapDiv = document.getElementById('google-map');
    const googleMap = new google.maps.Map(googleMapDiv, {
      center: {
        lat: INITPOS.lat,
        lng: INITPOS.lng,
      },
      zoom: zoomGmaps,
    });

    //mengubah tile layer pada Leaflet.js menjadi Esri World Imagery
    const Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    }).addTo(leafletMap);

    //
    const infoWindow = new google.maps.InfoWindow();

    // gmaps Marker
    const gmapsMarker = mapsObj.map((x) => {
      const marker = new google.maps.Marker({
        position: {
          lat: x.lat,
          lng: x.lng,
        },
        map: googleMap,
        title: x.title,
      });

      marker.addListener('click', () => {
        infoWindow.close();

        infoWindow.setContent(x.caption);

        infoWindow.open({
          anchor: marker,
          googleMap,
        });

        zoomGmaps = 13;
        googleMap.setZoom(zoomGmaps);
        googleMap.panTo(marker.position);
      });

      infoWindow.addListener('closeclick', () => {
        zoomGmaps = 10;
        googleMap.setZoom(zoomGmaps);
        googleMap.panTo(INITPOS);
      });
    });

    //  leaflet Marker
    const leafletMarker = mapsObj.map((x) => {
      const leafletMarker = L.marker([x.lat, x.lng]).bindPopup(x.caption).addTo(leafletMap);

      leafletMarker.on('click', () => {
        zoomLeaflet = 15;
        leafletMap.flyTo(leafletMarker.getLatLng(), zoomLeaflet);
        leafletMarker.openPopup();
      });

      leafletMarker.getPopup().on('remove', () => {
        zoomLeaflet = 10;
        leafletMap.flyTo(INITPOS, zoomLeaflet);
      });

    });
 </script> 
</body> 
</html>