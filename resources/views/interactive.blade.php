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
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            color: #333;
        }

        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 25px;
            background: linear-gradient(145deg, #ffffff, #e6e8eb);
            border-radius: 12px;
            box-shadow: 5px 5px 7px rgba(0, 0, 0, 0.1), -5px -5px 7px rgba(255, 255, 255, 0.7);

        }



        .form-container h3 {
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #4a4e69;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 12px 15px;
            margin: 12px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.1), inset -2px -2px 4px rgba(255, 255, 255, 0.7);
            transition: all 0.2s ease;
            width: calc(100% - 20px);
            max-width: 100%;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #6c63ff;
            box-shadow: 0 0 10px rgba(108, 99, 255, 0.5);
        }

        button {
            background-color: #6c63ff;
            color: #fff;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            text-align: center;
            padding: 12px;
            max-width: max-content;
            ;
        }

        button:hover {
            background-color: #4e4ac7;
        }

        textarea {
            resize: vertical;
            height: 120px;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            button {
                font-size: 0.9rem;
            }

            h3 {
                font-size: 1.5rem;
            }
        }

        .form-container h3:after {
            content: '';
            display: block;
            width: 50px;
            margin: 10px auto;
            height: 4px;
            background: #6c63ff;
            border-radius: 2px;
        }

        form button {
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2), -2px -2px 6px rgba(255, 255, 255, 0.5);
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