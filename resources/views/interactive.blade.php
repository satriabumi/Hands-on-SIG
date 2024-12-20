<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasar Peta Interaktif</title>

    <!-- Leaflet.js CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4lKVb0eLSNyhEO-C_8JoHhAvba6aZc3U"></script>

    <style>
        .form-container {
            margin: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input,
        textarea {
            display: block;
            margin: 10px 0;
        }
    </style>

</head>

<body>

    <div class="form-container">
        <h3>Tambahkan Marker</h3>
        <form id="markerForm">
            <input type="text" id="markerName" name="name" placeholder="Nama Lokasi" required />
            <input type="text" id="markerLat" name="latitude" placeholder="Latitude" required />
            <input type="text" id="markerLng" name="longitude" placeholder="Longitude" required />
            <button type="submit">Tambah Marker</button>
        </form>

        <h3>Tambahkan Poligon</h3>
        <form id="polygonForm">
            <textarea id="polygonCoords" placeholder="Koordinat Poligon (JSON)" required></textarea>
            <button type="submit">Tambah Poligon</button>
        </form>
    </div>

    <script type="text/javascript">
        // Tambahkan event listener untuk marker
        document.getElementById("markerForm").addEventListener("submit", function (e) {
            e.preventDefault();
            const name = document.getElementById("markerName").value;
            const lat = parseFloat(document.getElementById("markerLat").value);
            const lng = parseFloat(document.getElementById("markerLng").value);

            fetch("{{ url('api/markers') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    name: name,
                    latitude: lat,
                    longitude: lng
                }),
            })
                .then((res) => {
                    if (!res.ok) {
                        throw new Error("Gagal menambahkan marker!");
                    }
                    return res.json();
                })
                .then((data) => {
                    alert("Marker berhasil ditambahkan!");
                })
                .catch((error) => {
                    alert(error.message);
                });
        });

        // Tambahkan event listener untuk poligon
        document.getElementById("polygonForm").addEventListener("submit", function (e) {
            e.preventDefault();
            try {
                const coords = JSON.parse(document.getElementById("polygonCoords").value);

                fetch("{{ url('api/polygons') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        coordinates: coords
                    }),
                })
                    .then((res) => {
                        if (!res.ok) {
                            throw new Error("Gagal menambahkan poligon!");
                        }
                        return res.json();
                    })
                    .then((data) => {
                        alert("Poligon berhasil ditambahkan!");
                    })
                    .catch((error) => {
                        alert(error.message);
                    });
            } catch (error) {
                alert("Koordinat poligon tidak valid!");
            }
        });
    </script>

</body>

</html>