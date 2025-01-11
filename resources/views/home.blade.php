<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Style -->
  <link rel="stylesheet" href="{{asset('style/stylehome.css')}}">

  <!--Link Font -->
  <link href='https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap' rel='stylesheet'>
  <title>SIG | Projects</title>
</head>

<body>
  <!-- Navbar --> >
  <nav id='home' class="navbar navbar-expand-lg navbar-dark bg-transparent mt-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active me-3" aria-current="page" href="#home">HOME</a>
              <a class="nav-link me-3" href="#latihan">LATIHAN</a>
              <a class="nav-link me-3" href="#tugas">TUGAS</a>
              <a class="nav-link me-3" href="#contact">CONTACT</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Section Hero -->
  <section id="hero">
    <div class="container">
      <div class="row">
        <div class="col-5 offset-1 my-auto">
          <h2>Hello!</h2>
          <h1 class=fw-bold>I Kadek Agung Bagus Satria Bumi Kelana</h1>
          <br>
          <p>2105541137 | Teknik Elektro | Universitas Udayana <br>
            Sistem Informasi Geografis</p>
          <button class="btn btn-custom1 my-1" onclick="location.href=' #tugas'">Tugas
            <svg width=" 30" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <path d="M0 0H50V50H0V0Z" fill="url(#pattern0_78_2)" />
              <defs>
                <pattern id="pattern0_78_2" patternContentUnits="objectBoundingBox" width="1" height="1">
                  <use xlink:href="#image0_78_2" transform="scale(0.00195312)" />
                </pattern>
                <image id="image0_78_2" width="512" height="512"
                  xlink:href="data:image/png;base64,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" />
              </defs>
            </svg>
          </button>
          <div class="social-icon">
            <a href="https://linkedin.com/in/i-kadek-agung-bagus-satria-bumi-kelana" target="_blank" class="icon">
              <img src="{{asset('assets/icons/linkedin.png')}}" alt="LinkedIn Icon">
            </a>
            <a href="https://instagram.com/satriabumik" target="_blank" class="icon">
              <img src="{{asset('assets/icons/instagram.png')}}" alt="Instagram Icon">
            </a>
            <a href="https://github.com/satriabumi" target="_blank" class="icon">
              <img src="{{asset('assets/icons/github.png')}}" alt="GitHub Icon">
            </a>
          </div>
          <p class=" social-text">Find me at Social Media</p>
        </div>
        <div class="image-hero col-5">
          <img src="{{asset('assets/icons/location.png')}}" width="80%" class="float-end" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- End Section Hero -->

  <!-- Section Latihan -->
  <section id="latihan">
    <div class="container-fluid">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10">
            <h1 class="text-center fw-bold">Latihan</h1>
            <hr>
          </div>
        </div>
      </div>
      <div class="cards">
        <a href="map" class="card">
          <div class="icon">
            <img src="{{asset('assets/icons/notes.png')}}" alt="Document Icon">
          </div>
          <div class="label">Latihan Hands-On 1</div>
        </a>
        <a href="interactive" class="card">
          <div class="icon">
            <img src="{{asset('assets/icons/notes.png')}}" alt="Document Icon">
          </div>
          <div class="label">Latihan Hands-On 2</div>
        </a>
        <a href="handson3" class="card">
          <div class="icon">
            <img src="{{asset('assets/icons/notes.png')}}" alt="Document Icon">
          </div>
          <div class="label">Latihan Hands-On 3</div>
        </a>
      </div>
    </div>
  </section>
  <!-- End Section Latihan -->


  <!-- Section Tugas -->
  <section id="tugas">
    <div class="container-fluid">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10">
            <h1 class="text-center fw-bold">Tugas</h1>
            <hr>
          </div>
        </div>
      </div>
      <div class="cards">
        <a href="tugashandson1" class="card">
          <div class="icon">
            <img src="{{asset('assets/icons/work-from-home.png')}}" alt="Document Icon">
          </div>
          <div class="label">Tugas Hands On-1</div>
        </a>
        <a href="tugashandson234" class="card">
          <div class="icon">
            <img src="{{asset('assets/icons/work-from-home.png')}}" alt="Document Icon">
          </div>
          <div class="label">Tugas Hands On-2, 3, & 4</div>
        </a>
      </div>
    </div>
  </section>
  <!-- End Section Tugas -->


  <footer>
    <p>© 2024 Dukgeng. All Rights Reserved.</p>
  </footer>
</body>

</html>