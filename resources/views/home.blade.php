<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas & Project SIG</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <style>
    
    body {
      font-family: Poppins, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #D9D9D9;
      color: #000;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      text-align: center;
      padding: 20px;
      background: #003B95;
      background: linear-gradient(to left, #003B95, #006EFF);
      color: #FFFFFF;
      overflow: hidden;
    }

    header h1, header p {
        animation: slide-in 1s cubic-bezier(0.42, 0, 0.58, 1) forwards;
    }

    header h1 {
      font-size: 3rem;
      margin: 0;
    }

    header p {
      font-size: 1.5rem;
      margin: 5px 0 0;
    }

    @keyframes slide-in {
      0% {
        transform: translateX(-10%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    main {
      padding: 20px;
      flex: 1;
    }

    .features {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .feature {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 200px;
      padding: 25px;
      transition: all 0.3s ease-in-out;
      position: relative;
      overflow: hidden;
      cursor: pointer;
      text-decoration: none; /* Remove the default underline for links */
    }

    .feature:hover {
      transform: translateY(-10px) scale(1.05);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .feature .icon {
      font-size: 40px;
      color: #fff;
      margin-bottom: 15px;
      background-color: #003B95;
      border-radius: 50%;
      padding: 20px;
      transition: background-color 0.3s ease;
    }

    .feature:hover .icon {
      background-color: #006EFF;
    }

    .feature p {
      font-size: 1rem;
      margin: 0;
      color: #333;
    }

    /* Footer Styles */
    footer {
      text-align: center;
      padding: 10px;
      background: linear-gradient(to left, #003B95, #006EFF);
      color: #FFFFFF;
      font-size: 0.9rem;
      margin-top: auto;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .features {
        flex-direction: column;
        align-items: center;
      }

      .feature {
        width: 80%;
      }
    }

    @media (max-width: 480px) {
      header h1 {
        font-size: 2rem;
      }

      header p {
        font-size: 1.2rem;
      }

      .feature {
        padding: 15px;
      }

      .feature .icon {
        font-size: 35px;
        padding: 15px;
      }

      footer {
        font-size: 0.8rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>TUGAS & PROJECT SIG</h1>
    <p>I Kadek Agung Bagus Satria Bumi Kelana (2105541137)</p>
  </header>

  <main>
    <div class="features">
      <a href="map" class="feature">
        <p>Latihan Hands On 1</p>
      </a>

      <a href="tugashandson1" class="feature">
        <p>Tugas Hands On 1</p>
      </a>
    </div>
  </main>

  <footer>
    <p>© 2024 Sistem Informasi Geografis | Teknik Elektro | Universitas Udayana. All rights reserved.</p>
  </footer>
</body>
</html>
