<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>SIG | Tugas Hands-On 1</title>

    <!-- Font Poppins -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"> -->

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
<h1>Tugas Hands-On 1</h1> 
 
 <div id="leaflet-map"></div> 
 <div id="google-map"></div>

 <script>
    // lokasi marker untuk Leaflet.js
    const mapsObj1 = [
      {
        lat: -8.655851071991883, 
        lng: 115.21626035149703,
        caption: "<b>Kantor Walikota Denpasar</b><br>Dauh Puri, Denpasar, Bali",
        title: "Kantor Walikota Denpasar",
      },
    ];
    // lokasi marker untuk Google Maps API
    const mapsObj2 = [
      {
        lat: -8.7984047,
        lng: 115.1698715,
        caption: "<b>Kantor: Rektorat Universitas Udayana</b><br>Jimbaran, Badung, Bali",
        title: "Kantor: Rektorat Universitas Udayana",
      }
    ];

    // global var (center map Leaflet.js)
    let zoomLeaflet = 12;
    const INITPOSLJS = {
      lat: -8.655851071991883,
      lng: 115.21626035149703
    };

    // global var (center map Google Maps API)
    let zoomGmaps = 12;
    const INITPOSGMAPS = {
      lat: -8.7984047,
      lng: 115.1698715
    };

    // inisiasi Leaflet.js Map
    const leafletMap = L.map('leaflet-map').setView([INITPOSLJS.lat, INITPOSLJS.lng], zoomLeaflet);

    // inisiasi Google Maps API
    const googleMapDiv = document.getElementById('google-map');
    const googleMap = new google.maps.Map(googleMapDiv, {
      center: {
        lat: INITPOSGMAPS.lat,
        lng: INITPOSGMAPS.lng,
      },
      zoom: zoomGmaps,
    });

    //mengubah tile layer pada Leaflet.js menjadi OpenStreetMap
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(leafletMap);

    //
    const infoWindow = new google.maps.InfoWindow();

    // gmaps Marker
    const gmapsMarker = mapsObj2.map((x) => {
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

        //zoom marker google maps
        //zoom in
        zoomGmaps = 17;
        googleMap.setZoom(zoomGmaps);
        googleMap.panTo(marker.position);
      });
        //zoom out
        infoWindow.addListener('closeclick', () => {
        zoomGmaps = 12;
        googleMap.setZoom(zoomGmaps);
        googleMap.panTo(INITPOSGMAPS);
      });
    });

    //  leaflet Marker
    const leafletMarker = mapsObj1.map((x) => {
      const leafletMarker = L.marker([x.lat, x.lng]).bindPopup(x.caption).addTo(leafletMap);

        //zoom marker leaflet
        //zoom in
        leafletMarker.on('click', () => {
        zoomLeaflet = 17;
        leafletMap.flyTo(leafletMarker.getLatLng(), zoomLeaflet);
        leafletMarker.openPopup();
      });
        //zoom out
        leafletMarker.getPopup().on('remove', () => {
        zoomLeaflet = 12;
        leafletMap.flyTo(INITPOSLJS, zoomLeaflet);
      });

    });
 </script>
</body> 
</html>