<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SIG | Tugas Hands-On 2, 3, & 4
  </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <!-- Google Maps API -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4lKVb0eLSNyhEO-C_8JoHhAvba6aZc3U&libraries=places,geometry">
    </script>
  <!-- Style -->
  <link rel="stylesheet" href="{{asset('style/style.css')}}">

  <!-- Swal Fire -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('/') }}" class="nav-link">Home</a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="https://ee.unud.ac.id/" class="brand-link">
        <img src="{{asset('assets/icons/location.png')}}" alt="SIG Icon" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">SIG | Teknik Elektro</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('assets/icons/profile.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a class="d-block">I Kadek Agung Bagus<br>
              Satria Bumi Kelana
            </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="tugashandson2_3" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Tugas Hands-On 2, 3, & 4
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Tugas Hands-On 2, 3, & 4</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <!-- Main content -->
      <!-- Google Maps API -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header bg-info text-white">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Google Maps API</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div id="google-map"></div>
                </div>
              </div>
              <div id="directions-panel" class="mt-3 p-2"
                style="background-color: #f9f9f9; border-radius: 10px; font-size: 14px;">
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header bg-info text-white">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Leaflet Maps</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="leaflet-map"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="row g-4 mb-4">
                    <!-- Tambahkan Marker -->
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header bg-info text-white">
                          <div class="d-flex justify-content-between">
                            <h3 class="card-title">Tambahkan Marker</h3>
                          </div>
                        </div>
                        <div class="card-body">
                          <form id="markerForm" method="POST" action="{{ url('api/markers') }}">
                            @csrf
                            <div class="mb-3">
                              <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                              <input type="text" class="form-control" id="nama_lokasi">
                            </div>
                            <div class="mb-3 ">
                              <label for="latitude" class="form-label">Latitude</label>
                              <input type="number" class="form-control" id="latitude" step="any">
                            </div>
                            <div class="mb-3">
                              <label for="longitude" class="form-label">Longitude</label>
                              <input type="number" class="form-control" id="longitude" step="any">
                            </div>
                            <button id="addMarker" type=" submit" class="btn btn-primary">Submit</button>
                            <button id="resetMarker" type="reset" class="btn btn-danger">Reset</button>
                          </form>
                          <button id="saveMarkerBtn" class="btn btn-primary" onclick="updateMarker()">Save</button>
                          <button id="batalBtn" class="btn btn-secondary" onClick="batalInput()">Cancel</button>
                        </div>
                      </div>
                    </div>
                    <!-- Tambahkan Polygon -->
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header bg-info text-white">
                          <div class="d-flex justify-content-between">
                            <h3 class="card-title">Tambahkan Polygon</h3>
                          </div>
                        </div>
                        <div class="card-body">
                          <form id="polygonForm" method="POST" action="{{ url('api/polygons') }}">
                            <div class="mb-3">
                              <label for="kordinatpolygon" class="form-label">Kordinat Polygon</label>
                              <textarea class="form-control" placeholder="Type here..." id="kordinatpolygon"
                                rows="8"></textarea>
                            </div>
                            <button id="addPolygon" type="submit" class="btn btn-primary">Submit</button>
                            <button id="resetPolygon" type="button" class="btn btn-danger">Reset</button>
                          </form>
                          <button id="savePolygonBtn" class="btn btn-primary" onclick="updatePolygon()">Save</button>
                          <button id="batalPolygonBtn" class="btn btn-secondary"
                            onClick="batalInputPolygon()">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header bg-info text-white">
                      <div class="d-flex justify-content-between">
                        <h3 class="card-title">Tabel Marker</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Lokasi</th>
                            <th scope="col">Lat</th>
                            <th scope="col">Long</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        @foreach ($markers as $marker)
              <tbody>
                <td>{{$marker->id}}</td>
                <td>{{$marker->name}}</td>
                <td>{{$marker->latitude}}</td>
                <td>{{$marker->longitude}}</td>
                <td>
                <button type="button" class="btn btn-success"
                  onclick="viewMarker('{{$marker->latitude}}','{{$marker->longitude}}' )">View</button>
                <button type="button" class="btn btn-warning"
                  onclick="editMarker('{{$marker->id}}')">Edit</button>
                <button type="button" class="btn btn-danger"
                  onclick="deleteMarker('{{$marker->id}}')">Hapus</button>
                </td>
              @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header bg-info text-white">
                      <div class="d-flex justify-content-between">
                        <h3 class="card-title">Tabel Polygons</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Koordinat</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        @foreach ($polygons as $polygon)
              <tbody>
                <td>{{$polygon->id}}</td>
                <td>{{$polygon->coordinates}}</td>
                <td>
                <button type="button" class="btn btn-success"
                  onclick="viewPolygon('{{$polygon->coordinates}}')">View</button>
                <button type="button" class="btn btn-warning"
                  onclick="editPolygon('{{$polygon->id}}')">Edit</button>
                <button type="button" class="btn btn-danger"
                  onclick="deletePolygon('{{$polygon->id}}')">Hapus</button>
                </td>
              </tbody>
            @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      <!-- REQUIRED SCRIPTS -->

      <!-- jQuery -->
      <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap -->
      <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- AdminLTE -->
      <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>

      <!-- OPTIONAL SCRIPTS -->
      <!-- AdminLTE for demo purposes -->
      <!-- <script src="{{asset('assets/dist/js/demo.js')}}"></script> -->
    </div>
</body>

<script>
  document.getElementById("batalBtn").style.display = "none";
  document.getElementById("batalPolygonBtn").style.display = "none";
  document.getElementById("saveMarkerBtn").style.display = "none";
  document.getElementById("savePolygonBtn").style.display = "none";

  // Gmaps
  let zoomGmaps = 10;
  const INITPOSGMAPS = {
    lat: -8.413221884202141,
    lng: 115.1855030374216
  };

  const googleMapDiv = document.getElementById('google-map');
  const googleMap = new google.maps.Map(googleMapDiv, {
    center: INITPOSGMAPS,
    zoom: zoomGmaps,
  });

  let leafletMap

  // Leaflet
  function initializeLeafletMap() {
    leafletMap = L.map("leaflet-map").setView([-8.413221884202141, 115.1855030374216], 10);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(leafletMap);
  }

  // Load markers & display gmaps
  function loadMarkers() {
    fetch("{{ url('api/markers') }}", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
    })
      .then((res) => {
        if (!res.ok) {
          throw new Error("Gagal mengambil data marker");
        }
        return res.json();
      })
      .then((data) => {
        data.forEach(marker => {
          const lat = parseFloat(marker.latitude);
          const lng = parseFloat(marker.longitude);
          const name = marker.name; // Nama marker

          // Membuat marker di Google Maps
          const mapMarker = new google.maps.Marker({
            position: {
              lat,
              lng
            },
            map: googleMap,
            title: name,
          });

          // Membuat info window
          const infoWindow = new google.maps.InfoWindow({
            content: `<b>${name}</b>` // Menampilkan nama lokasi
          });

          // Menampilkan info window saat marker diklik
          mapMarker.addListener("click", () => {
            infoWindow.open(googleMap, mapMarker);
          });

          // Menambahkan event listener untuk menutup info window
          google.maps.event.addListener(infoWindow, 'closeclick', function () {
            // Mengatur ulang zoom dan pusat peta
            googleMap.setZoom(10); // Ganti 10 dengan zoom level semula
            googleMap.setCenter(INITPOSGMAPS); // Ganti dengan koordinat semula
          });
        });
      })
      .catch((error) => {
        console.error(error);
      });
  }

  // Load markers & display leaflet
  async function loadMarkersleaflet() {
    const res = await fetch(`/api/markers/`, {
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
    });
    const data = await res.json();
    data.forEach(marker => {
      const lat = parseFloat(marker.latitude);
      const lng = parseFloat(marker.longitude);
      const name = marker.name;

      // Menambahkan marker ke peta Leaflet
      const leafletMarker = L.marker([lat, lng])
        .addTo(leafletMap)
        .bindPopup(`<b>${name}</b>`); // Hanya mengikat popup tanpa membukanya otomatis

      // Tidak membuka popup secara otomatis
      // leafletMarker.openPopup(); // Pastikan ini tidak ada

      // Menambahkan event listener jika ingin popup muncul saat marker diklik
      leafletMarker.on('click', function () {
        // Popup akan muncul saat marker diklik
        this.openPopup();
      });

      // Menambahkan event listener untuk menangani saat popup ditutup
      leafletMarker.on('popupclose', function () {
        // Mengatur ulang zoom dan posisi peta ke posisi semula
        leafletMap.setZoom(10); // Ganti dengan zoom level semula
        leafletMap.setView([INITPOSGMAPS.lat, INITPOSGMAPS.lng], 10); // Ganti dengan koordinat semula
      });
    });
  }

  // Load polygons & display
  function loadPolygons() {
    fetch("{{ url('api/polygons') }}", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
    })
      .then((res) => {
        if (!res.ok) {
          throw new Error("Gagal mengambil data polygon");
        }
        return res.json();
      })
      .then((data) => {
        data.forEach(polygonData => {
          const coordinates = JSON.parse(polygonData.coordinates).map(coord => ({
            lat: parseFloat(coord.lat),
            lng: parseFloat(coord.lng)
          }));

          const polygon = new google.maps.Polygon({
            paths: coordinates,
            map: googleMap,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
          });
        });
        alert("Polygon berhasil ditampilkan!");
      })
      .catch((error) => {
        console.error(error);
        alert("Gagal memuat polygon!");
      });
  }

  // Load markers when the page is loaded
  window.addEventListener("load", loadMarkers, loadMarkersleaflet);

  // Tambah marker
  document.getElementById("markerForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const name = document.getElementById("nama_lokasi").value;
    const lat = parseFloat(document.getElementById("latitude").value);
    const lng = parseFloat(document.getElementById("longitude").value);

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
          throw new Error("Gagal menambahkan marker");
        }
        return res.json();
      })
      .then((data) => {
        alert("Marker berhasil ditambahkan");
        window.location.reload(true);
        const marker = new google.maps.Marker({
          position: {
            lat: lat,
            lng: lng
          },
          map: googleMap,
          title: name,
        });
      })
      .catch((error) => {
        alert(error.message);
      });
  });

  // Tambah Polygon
  document.getElementById("polygonForm").addEventListener("submit", function (e) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    e.preventDefault();
    try {
      const coords = JSON.parse(document.getElementById("kordinatpolygon").value);

      fetch("{{ url('api/polygons') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrfToken
        },
        body: JSON.stringify({
          coordinates: coords
        }),
      })
        .then((res) => {
          if (!res.ok) {
            throw new Error("Gagal menambahkan polygon");
          }
          return res.json();
        })
        .then((data) => {
          alert("Polygon berhasil ditambahkan!");
          window.location.reload(true);
          const polygon = new google.maps.Polygon({
            paths: coords,
            map: googleMap,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
          });
        })
        .catch((error) => {
          alert(error.message);
        });
    } catch (error) {
      alert("Koordinat polygon tidak valid!");
    }
  });

  // Reset form marker
  document.querySelector("#markerForm .btn-danger").addEventListener("click", function () {
    document.getElementById("markerForm").reset();
  });

  // reset form polygon
  document.querySelector("#polygonForm .btn-danger").addEventListener("click", function () {
    document.getElementById("polygonForm").reset();
  });

  let map, directionsService, directionsRenderer;


  // Inisialisasi directions service dan renderer untuk Google Maps
  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(googleMap);

  // View marker
  // Fungsi untuk view marker dan menampilkan directions
  function viewMarker(lat, long) {
    // Ambil lokasi pengguna (live location)
    navigator.geolocation.getCurrentPosition(function (position) {
      const userLat = position.coords.latitude;
      const userLng = position.coords.longitude;

      // Buat DirectionService dan DirectionRenderer
      const directionsService = new google.maps.DirectionsService();
      const directionsRenderer = new google.maps.DirectionsRenderer();

      // Tampilkan rute di peta Google Maps
      directionsRenderer.setMap(googleMap);

      const request = {
        origin: {
          lat: userLat,
          lng: userLng
        }, // Titik awal (live location)
        destination: {
          lat: parseFloat(lat),
          lng: parseFloat(long)
        }, // Titik tujuan (marker)
        travelMode: 'DRIVING', // Mode perjalanan (bisa juga 'WALKING', 'BICYCLING', 'TRANSIT')
      };

      directionsService.route(request, function (result, status) {
        if (status === 'OK') {
          directionsRenderer.setDirections(result);
        } else {
          console.error("Error mendapatkan rute:", status);
        }
      });
    }, function (error) {
      console.error("Error mendapatkan lokasi pengguna:", error.message);
    });

    // Pusatkan peta Leaflet ke marker
    leafletMap.setView([parseFloat(lat), parseFloat(long)], 17);

    // Ambil lokasi pengguna (live location)
    navigator.geolocation.getCurrentPosition(function (position) {
      const userLat = position.coords.latitude;
      const userLng = position.coords.longitude;

      // Buat rute menggunakan Leaflet Routing Machine
      L.Routing.control({
        waypoints: [
          L.latLng(userLat, userLng), // Titik awal (live location)
          L.latLng(parseFloat(lat), parseFloat(long)) // Titik tujuan (marker)
        ],
        routeWhileDragging: true,
      }).addTo(leafletMap);
    }, function (error) {
      console.error("Error mendapatkan lokasi pengguna:", error.message);
    });

  }


  // Edit marker
  async function editMarker(id) {
    const res = await fetch(`/api/markers/${id}`, {
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
    });

    if (!res.ok) {
      console.error("Gagal mengambil data marker: ", res.status);
      alert("Gagal mengambil data marker.");
      return;
    }

    const data = await res.json();
    document.getElementById('nama_lokasi').value = data.name;
    document.getElementById('latitude').value = data.latitude;
    document.getElementById('longitude').value = data.longitude;

    // Ubah tombol
    document.getElementById("addMarker").style.display = "none";
    document.getElementById("saveMarkerBtn").style.display = "inline";
    document.getElementById("batalBtn").style.display = "inline";
    document.getElementById("saveMarkerBtn").setAttribute("onclick", `updateMarker(${id})`);
    document.getElementById("resetMarker").style.display = "none";
  }

  function batalInput() {
    document.getElementById("nama_lokasi").value = "";
    document.getElementById("latitude").value = "";
    document.getElementById("longitude").value = "";
    document.getElementById("addMarker").style.display = "inline";
    document.getElementById("saveMarkerBtn").style.display = "none";
    document.getElementById("batalBtn").style.display = "none";
    document.getElementById("resetMarker").style.display = "inline";
  }

  function batalInputPolygon() {
    document.getElementById("kordinatpolygon").value = "";
    document.getElementById("addPolygon").style.display = "inline";
    document.getElementById("savePolygonBtn").style.display = "none";
    document.getElementById("batalBtnPolygon").style.display = "none";
  }

  // Update Marker
  function updateMarker(id) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const data = {
      name: document.getElementById("nama_lokasi").value,
      latitude: document.getElementById("latitude").value,
      longitude: document.getElementById("longitude").value,
    };

    fetch("/api/markers/" + id, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrfToken,
      },
      body: JSON.stringify(data),
    })
      .then((res) => {
        if (!res.ok) {
          throw new Error(`HTTP error! status: ${res.status}`);
        }
        return res.json();
      })
      .then((response) => {
        alert("Marker berhasil diperbarui!");
        location.reload();
      })
      .catch((err) => {
        console.error("Error memperbarui marker:", err);
        alert("Gagal memperbarui marker.");
      });
  }

  // Delete marker
  function deleteMarker(id) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log(id)

    // Menampilkan konfirmasi sebelum menghapus marker
    Swal.fire({
      showCancelButton: true,
      title: 'Hapus Marker',
      text: 'Apakah anda ingin menghapus marker?',
      icon: 'warning',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak',
    })
      .then((result) => {
        if (result.isConfirmed) {
          // Melakukan request DELETE untuk menghapus marker
          fetch("/api/markers/" + id, {
            method: "DELETE",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": csrfToken,
            },
          })
            .then((res) => {
              if (!res.ok) {
                throw new Error(`HTTP error! Status: ${res.status}`); // Memperbaiki penggunaan backticks
              }
              return res.json(); // Memastikan data dari response diolah
            })
            .then((data) => {
              alert("Marker dihapus!");
              window.location.reload(true); // Menyegarkan halaman setelah penghapusan
            })
            .catch((err) => {
              console.error("Error menghapus marker: ", err);
              alert("Gagal menghapus marker.");
            });
        }
      });
  }

  // View polygon
  function viewPolygon(coordinates) {
    const parsedCoordinates = JSON.parse(coordinates).map(coord => ({
      lat: parseFloat(coord.lat),
      lng: parseFloat(coord.lng)
    }));

    // Reset map and zoom to polygon
    const bounds = new google.maps.LatLngBounds();
    parsedCoordinates.forEach(coord => bounds.extend(coord));
    googleMap.fitBounds(bounds);

    // Add polygon to the map
    new google.maps.Polygon({
      paths: parsedCoordinates,
      map: googleMap,
      strokeColor: "#0000FF",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#0000FF",
      fillOpacity: 0.35,
    });
  }

  // Edit polygon
  async function editPolygon(id) {
    const res = await fetch(`/api/polygons/${id}`, {
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
    });

    if (!res.ok) {
      console.error("Gagal mengambil data polygon: ", res.status);
      alert("Gagal mengambil data polygon");
      return;
    }

    const data = await res.json();
    document.getElementById('kordinatpolygon').value = data.coordinates;

    // Ubah tombol
    document.getElementById("addPolygon").style.display = "none";
    document.getElementById("savePolygonBtn").style.display = "inline";
    document.getElementById("batalPolygonBtn").style.display = "inline";
    document.getElementById("savePolygonBtn").setAttribute("onclick", `updatePolygon(${id})`);
    document.getElementById("resetPolygon").style.display = "none";
  }

  function batalInputPolygon() {
    document.getElementById("kordinatpolygon").value = "";
    document.getElementById("addPolygon").style.display = "inline";
    document.getElementById("savePolygonBtn").style.display = "none";
    document.getElementById("batalPolygonBtn").style.display = "none";
    document.getElementById("resetPolygon").style.display = "inline";
  }

  // Update polygon
  function updatePolygon(id) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const data = {
      coordinates: document.getElementById("kordinatpolygon").value,
    };

    fetch("/api/polygons/" + id, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": csrfToken,
      },
      body: JSON.stringify(data),
    })
      .then((res) => {
        if (!res.ok) {
          throw new Error(`HTTP error! status: ${res.status}`);
        }
        return res.json();
      })
      .then((response) => {
        alert("Polygon berhasil diperbarui!");
        location.reload();
      })
      .catch((err) => {
        console.error("Error memperbarui Polygon: ", err);
        alert("Gagal memperbarui Polygon.");
      });

  }

  // Delete Polygon
  function deletePolygon(id) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Menampilkan konfirmasi sebelum menghapus polygon
    Swal.fire({
      showCancelButton: true,
      title: 'Hapus Polygon',
      text: 'Apakah anda ingin menghapus polygon?',
      icon: 'warning',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak',
    })
      .then((result) => {
        if (result.isConfirmed) {
          // Melakukan request DELETE untuk menghapus polygon
          fetch("/api/polygons/" + id, {
            method: "DELETE",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": csrfToken,
            },
          })
            .then((res) => {
              if (!res.ok) {
                throw new Error(`HTTP error! Status: ${res.status}`);
              }
              return res.json();
            })
            .then((data) => {
              alert("Polygon dihapus!");
              window.location.reload(true);
            })
            .catch((err) => {
              console.error("Error menghapus polygon:", err);
              alert("Gagal menghapus polygon.");
            });
        }
      });
  }

  // Menampilkan lokasi live pada Google Maps
  function trackLiveLocationGoogle() {
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(function (position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;

        // Menampilkan posisi di peta Google
        const userLocation = new google.maps.LatLng(lat, lng);

        // Membuat marker atau memperbarui posisi marker yang ada
        if (!window.userMarker) {
          window.userMarker = new google.maps.Marker({
            position: userLocation,
            map: googleMap,
            title: "Your Location",
          });
        } else {
          window.userMarker.setPosition(userLocation); // Memperbarui posisi marker
        }

        // Mengatur peta agar selalu mengarah ke lokasi pengguna
        googleMap.setCenter(userLocation);
        googleMap.setZoom(15);
      }, function (error) {
        console.error("Error getting location: ", error);
      }, {
        enableHighAccuracy: true, // Mengaktifkan akurasi tinggi
        timeout: 5000, // Timeout jika tidak mendapatkan lokasi dalam 5 detik
        maximumAge: 0 // Tidak menggunakan lokasi cache
      });
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  function showUserLocation() {
    // Mengecek apakah geolocation tersedia di browser
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position) => {
        const userLat = position.coords.latitude;
        const userLng = position.coords.longitude;

        // Menambahkan marker di lokasi pengguna
        const userMarker = new google.maps.Marker({
          position: {
            lat: userLat,
            lng: userLng
          },
          map: googleMap,
          title: "Your Location"
        });

        // Membuat info window
        const userInfoWindow = new google.maps.InfoWindow({
          content: "<b>Your Location</b>" // Isi info window
        });

        // Menampilkan info window secara otomatis saat marker ditambahkan
        userInfoWindow.open(googleMap, userMarker);

        // Mengatur zoom dan center peta ke lokasi pengguna
        googleMap.setCenter({
          lat: userLat,
          lng: userLng
        });
        googleMap.setZoom(15); // Atur zoom level sesuai kebutuhan
      }, (error) => {
        console.error("Error getting user location: ", error);
        alert("Unable to retrieve your location.");
      });
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  // Memanggil fungsi showUserLocation ketika peta dimuat
  google.maps.event.addListenerOnce(googleMap, 'idle', showUserLocation);

  // Menampilkan lokasi live pada Leaflet
  function trackLiveLocationLeaflet() {
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(function (position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;

        // Menampilkan posisi di peta Leaflet
        const userLocation = L.latLng(lat, lng);

        // Membuat marker atau memperbarui posisi marker yang ada
        if (!window.userMarkerLeaflet) {
          window.userMarkerLeaflet = L.marker(userLocation)
            .addTo(leafletMap)
            .bindPopup("Your Location")
            .openPopup();
        } else {
          window.userMarkerLeaflet.setLatLng(userLocation); // Memperbarui posisi marker
        }

        // Mengatur peta agar selalu mengarah ke lokasi pengguna
        leafletMap.setView(userLocation, 15);
      }, function (error) {
        console.error("Error getting location: ", error);
      }, {
        enableHighAccuracy: true, // Mengaktifkan akurasi tinggi
        timeout: 5000, // Timeout jika tidak mendapatkan lokasi dalam 5 detik
        maximumAge: 0 // Tidak menggunakan lokasi cache
      });
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }
  // Memulai fitur live location pada peta Google Maps
  trackLiveLocationGoogle();
  // Memulai fitur live location pada peta Leaflet
  trackLiveLocationLeaflet();

  document.addEventListener("DOMContentLoaded", () => {
    initializeLeafletMap();
    loadMarkersleaflet();
  })
</script>
</body>

</html>