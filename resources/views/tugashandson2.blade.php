<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SIG | Tugas Hands-On 2
  </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0/dist/css/adminlte.min.css')}}">
  <!-- Google Maps API -->
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyC4lKVb0eLSNyhEO-C_8JoHhAvba6aZc3U">
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
          <a href="https://agungsatriasigproject.site/" class="nav-link">Home</a>
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
    <<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="https://ee.unud.ac.id/" class="brand-link">
        <img src="{{asset('assets/location.png')}}" alt="SIG Icon" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">SIG | Elektro Udayana</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('assets/profile.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">I Kadek Agung Bagus<br>
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
              <a href="tugashandson2" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Tugas Hands-On 2
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
                <h1 class="m-0">Tugas Hands-On 2</h1>
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
                  <!-- Tambahkan Marker -->
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row g-4 mb-4">
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
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                  <button type="button" class="btn btn-danger">Reset</button>
                                </form>
                              </div>
                            </div>
                          </div>
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
                                    <label for="nama_lokasi" class="form-label">Kordinat Polygon</label>
                                    <textarea class="form-control" placeholder="Type here..." id="kordinatpolygon"
                                      rows="8"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                  <button type="button" class="btn btn-danger">Reset</button>
                                </form>
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
                                  <button type="button" class="btn btn-info"
                                    onclick="viewMarker('{{$marker->latitude}}','{{$marker->longitude}}' )">View</button>
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
                                  <button type="button" class="btn btn-info"
                                    onclick="viewPolygon('{{$polygon->coordinates}}')">View</button>
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
  <script src="{{asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE -->
  <script src="{{asset('AdminLTE-3.2.0/dist/js/adminlte.min.js')}}"></script>

  <!-- OPTIONAL SCRIPTS -->
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('AdminLTE-3.2.0/dist/js/demo.js')}}"></script>

</body>

<script>
// Global variables
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

// Function to load markers from backend and display them
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
        const mapMarker = new google.maps.Marker({
          position: {
            lat: parseFloat(marker.latitude),
            lng: parseFloat(marker.longitude),
          },
          map: googleMap,
          title: marker.name,
        });
      });
    })
    .catch((error) => {
      console.error(error);
    });
}

// Function to load polygons from backend and display them on demand
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
window.addEventListener("load", loadMarkers);

// Event listener for adding new marker
document.getElementById("markerForm").addEventListener("submit", function(e) {
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

// Event listener for adding new polygon
document.getElementById("polygonForm").addEventListener("submit", function(e) {
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

// Function to reset the Marker form
document.querySelector("#markerForm .btn-danger").addEventListener("click", function() {
  document.getElementById("markerForm").reset();
});

// Function to reset the Polygon form
document.querySelector("#polygonForm .btn-danger").addEventListener("click", function() {
  document.getElementById("polygonForm").reset();
});

// Function View Marker
function viewMarker(lat, long) {
  googleMap.setCenter({
    lat: parseFloat(lat),
    lng: parseFloat(long)
  });
  googleMap.setZoom(17);
}

// Delete Marker
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
            console.error("Error menghapus marker:", err);
            alert("Gagal menghapus marker.");
          });
      }
    });
}

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
            window.location.reload(true); // Menyegarkan halaman setelah penghapusan
          })
          .catch((err) => {
            console.error("Error menghapus polygon:", err);
            alert("Gagal menghapus polygon.");
          });
      }
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
            window.location.reload(true); // Menyegarkan halaman setelah penghapusan
          })
          .catch((err) => {
            console.error("Error menghapus polygon:", err);
            alert("Gagal menghapus polygon.");
          });
      }
    });
}
</script>
</body>

</html>