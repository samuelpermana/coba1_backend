
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" />
    <link rel="stylesheet" href="stylebankaspirasi.css" />
    <title>Bank Aspirasi</title>
  </head>

  <body>
    <nav>
      <div class="nav-logo">
        <a href="#">
          <img src="/img/coba1.png" alt="Logo" />
        </a>
      </div>

      <ul class="nav-links">
        <li class="link"><a href="index.html">Home</a></li>
        <li id="link1" class="link"><a href="kotakaspirasi.html">Kotak Aspirasi</a></li>
        <li id="link2" class="link"><a href="faq.html">FAQ</a></li>
        <li id="link3" class="link"><a href="bankaspirasi.html">Bank Aspirasi</a></li>
        <li id="link4" class="link"><a href="selayangpandang.html">Selayang Pandang</a></li>
        <li id="link4" class="link"><a href="jdih.html">JDIH</a></li>
        <li id="link4" class="link"><a href="peminjamanruangan.html">Peminjaman Ruangan</a></li>
        <li id="link6" class="link"><a href="transparansisurat3.html">Transparansi Surat</a></li>
      </ul>
      <button class="btn">Ajukan Surat</button>
    </nav>

    <section class="container">
      <h2 class="header">Bank Aspirasi</h2>
      <p class="sub-header">Berisikan tentang keseluruhan Aspirasi beserta jawabannya dari mahasiswa.</p>
      
      <!-- Sarpras Section -->
      <h2 class="header-BA">SARPRAS</h2>
      <div class="pricing">
        @foreach($sarpras as $aspirasi)
        <div class="card">
          <div class="content">
            <h4>{{ $aspirasi->message }}</h4>
          </div>
          <button class="btn3">Selengkapnya</button>
          <div class="panel">
            <p>{{ $aspirasi->answer }}</p>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Birokrasi Section -->
      <h2 class="header-BA">BIROKRASI</h2>
      <div class="pricing">
        @foreach($birokrasi as $aspirasi)
        <div class="card">
          <div class="content">
            <h4>{{ $aspirasi->message }}</h4>
          </div>
          <button class="btn3">Selengkapnya</button>
          <div class="panel">
            <p>{{ $aspirasi->answer }}</p>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Akademik Section -->
      <h2 class="header-BA">AKADEMIK</h2>
      <div class="pricing">
        @foreach($akademik as $aspirasi)
        <div class="card">
          <div class="content">
            <h4>{{ $aspirasi->message }}</h4>
          </div>
          <button class="btn3">Selengkapnya</button>
          <div class="panel">
            <p>{{ $aspirasi->answer }}</p>
          </div>
        </div>
        @endforeach
      </div>
      
    </section>


    <footer class="container">
      <span class="blur"></span>
      <span class="blur"></span>
      <div class="column">
        <div class="logo">
          <img src="/img/coba1.png" />
        </div>
        <p>SENAT MAHASISWA FAKULTAS HUKUM UNDIP</p>
        <div class="socials">
          <a href="#"><i class="ri-youtube-line"></i></a>
          <a href="#"><i class="ri-instagram-line"></i></a>
          <a href="#"><i class="ri-twitter-line"></i></a>
        </div>
      </div>
      <div class="column">
        <h4>CONTOH</h4>
        <a href="#">Template</a>
        <a href="#">Template</a>
        <a href="#">Template</a>
      </div>
      <div class="column">
        <h4>About Us</h4>
        <a href="#">Blogs</a>
        <a href="#">Channels</a>
        <a href="#">Sponsors</a>
      </div>
      <div class="column">
        <h4>Contact</h4>
        <a href="#">Contact Us</a>
        <a href="#">Privicy Policy</a>
        <a href="#">Terms & Conditions</a>
      </div>
    </footer>

    <div class="copyright">Copyright Â© 2023 SENAT FH UNDIP. All Rights Reserved.</div>

    <script src="js-bankaspirasi.js"></script>
  </body>
</html>
