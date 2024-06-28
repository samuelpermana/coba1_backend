<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="{{ asset("stylelayout.css") }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link type="image/x-icon" href="{{ URL::asset("img/coba23.ico") }}" rel="icon">
    <link type="image/x-icon" href="{{ URL::asset("img/coba23.ico") }}" rel="shortcut icon">
    <title>SENAT FH UNDIP</title>
  </head>

  <body>

    <header class="header4">
      <div class="header__container">
        <div class="header__toggle">
          <i class='bx bx-menu' id="header-toggle"></i>

        </div>
      </div>
    </header>
    <div class="nav2" id="navbar">
      <nav class="nav2__container">
        <div>
          <a class="nav2__link nav2__logo" href="#">
            <img src="/img/coba1.png" alt="Logo">

          </a>

          <div class="nav2__list">
            <div class="nav2__items">

              <a class="nav2__link active" href="{{ url("/") }}">
                <i class='bx bx-home nav2__icon'></i>
                <span class="nav2__name">Home</span>
              </a>

              <div class="nav2__dropdown">
                <a class="nav2__link" href="{{ url("/kotakaspirasi") }}">
                  <i class='bx bx-user nav2__icon'></i>
                  <span class="nav2__name">Kotak Aspirasi</span>

                </a>

              </div>
              <div class="nav2__items">
                <a class="nav2__link" href="{{ url("/faq") }}">
                  <i class='bx bx-message-rounded nav2__icon'></i>
                  <span class="nav2__name">FAQ</span>
                </a>
              </div>

              <div class="nav2__dropdown">
                <a class="nav2__link" href="{{ url("/bankaspirasi") }}">
                  <i class='bx bx-file nav2__icon'></i>
                  <span class="nav2__name">Bank Aspirasi</span>

                </a>

              </div>

              <a class="nav2__link" href="{{ url("/selayangpandang") }}">
                <i class='bx bx bx-user nav2__icon'></i>
                <span class="nav2__name">Selayang Pandang</span>
              </a>
              <!-- <div class="nav2__dropdown"> -->
              <div class="nav2__dropdown-content">
                <a class="nav2__link" href="#">
                  <i class='bx bx-file nav2__icon'></i>
                  <span class="nav2__name">JDIH</span>
                </a>
                <a href="{{ route("jdih.jenis", ["id" => 1]) }}">Konstitusi</a>
                <a href="{{ route("jdih.jenis", ["id" => 2]) }}">Peraturan Mahasiswa</a>
                <a href="{{ route("jdih.jenis", ["id" => 4]) }}">Peraturan Senat Mahasiswa</a>
                <a href="{{ route("jdih.jenis", ["id" => 3]) }}">Standard Operating Procedure</a>
                <a href="{{ route("jdih.jenis", ["id" => 5]) }}">Keputusan</a>
                <a href="{{ route("jdih.jenis", ["id" => 6]) }}">Rancangan Peraturan</a>
              </div>
              <!-- </div> -->
              <a class="nav2__link" href="{{ url("/peminjamanruangan") }}">
                <i class='bx bx-time nav2__icon'></i>
                <span class="nav2__name">Peminjaman Ruangan</span>
              </a>
              <a class="nav2__link" href="{{ url("/login") }}">
                <i class='bx bx-time nav2__icon'></i>
                <span class="nav2__name">Ajukan Surat</span>
              </a>

            </div>
          </div>
        </div>
    </div>
    </nav>
    </div>

    <nav>
      <div class="nav-logo">
        <a href="{{ url("/") }}">
          <img src="/img/coba1.png" alt="Logo">
        </a>
      </div>

      <ul class="nav-links">
        <li class="link"><a href="{{ url("/") }}">Home</a></li>
        <li class="link" id="link1"><a href="{{ url("/kotakaspirasi") }}">Kotak Aspirasi</a></li>
        <li class="link" id="link2"><a href="{{ url("/faq") }}">FAQ</a></li>
        <li class="link" id="link3"><a href="{{ url("/bankaspirasi") }}">Bank Aspirasi</a></li>
        <li class="link" id="link4"><a href="{{ url("/selayangpandang") }}">Selayang Pandang</a></li>
        <li class="link" id="link4">
          <div class="dropdown">
            <button class="dropbtn">JDIH</button>
            <div class="dropdown-content">
              <a href="{{ route("jdih.jenis", ["id" => 1]) }}">Konstitusi</a>
              <a href="{{ route("jdih.jenis", ["id" => 2]) }}">Peraturan Mahasiswa</a>
              <a href="{{ route("jdih.jenis", ["id" => 4]) }}">Peraturan Senat Mahasiswa</a>
              <a href="{{ route("jdih.jenis", ["id" => 3]) }}">Standard Operating Procedure</a>
              <a href="{{ route("jdih.jenis", ["id" => 5]) }}">Keputusan</a>
              <a href="{{ route("jdih.jenis", ["id" => 6]) }}">Rancangan Peraturan</a>
            </div>
          </div>
        </li>
        <li class="link" id="link6"><a href="{{ url("/peminjamanruangan") }}">Peminjaman Ruangan</a></li>
      </ul>

      <a href="{{ url("/login") }}"><button class="btn btn-ajukansurat" type="button">Ajukan Surat</button></a>
    </nav>

    @yield("content")

    <footer class="container-f">
      <span class="blur"></span>
      <span class="blur"></span>
      <div class="column">
        <div class="logo">
          <img src="/img/coba1.png">
        </div>
        <p>SENAT MAHASISWA FAKULTAS HUKUM UNDIP</p>
        <p class="address">
          Jl. Prof. Soedarto, Tembalang, Kec. Tembalang, Kota Semarang, Jawa Tengah 50275
        </p>
        <div class="socials">
          <a href="https://www.youtube.com/@SenatMahasiswaFakultasHukumUnd"><i class="ri-youtube-line"></i></a>
          <a href="https://www.instagram.com/senatfhundip/"><i class="ri-instagram-line"></i></a>
          <a href="https://lin.ee/VJdJQ9z"><i class="ri-line-line"></i></a>
          <a href="https://www.tiktok.com/@senatfhundip?is_from_webapp=1&sender_device=pc"><i class="ri-tiktok-line"></i></a>
        </div>
      </div>

      <div class="column">
        <h4>Komisi</h4>
        <a href="{{ url("/tentang-komisi-i") }}">Komisi I</a>
        <a href="{{ url("/tentang-komisi-ii") }}">Komisi II</a>
        <a href="{{ url("/tentang-komisi-iii") }}">Komisi III</a>
        <a href="{{ url("/tentang-komisi-iv") }}">Komisi IV</a>
      </div>
      <div class="column">
        <h4>Badan</h4>
        <a href="{{ url("/tentang-badan-anggaran") }}">Badan Anggaran</a>
        <a href="{{ url("/tentang-badan-kehormatan") }}">Badan Kehormatan</a>
        <a href="{{ url("/tentang-badan-legislasi") }}">Badan Legislasi</a>
        <a href="{{ url("/tentang-burt") }}">BURT</a>
        <a href="{{ url("/tentang-bksap") }}">BKSAP</a>
      </div>
      <div class="column">
        <h4>JDIH</h4>
        <a href="{{ route("jdih.jenis", ["id" => 1]) }}">Konstitusi</a>
        <a href="{{ route("jdih.jenis", ["id" => 2]) }}">Peraturan Mahasiswa</a>
        <a href="{{ route("jdih.jenis", ["id" => 4]) }}">Peraturan Senat Mahasiswa</a>
        <a href="{{ route("jdih.jenis", ["id" => 3]) }}">Standard Operating Procedure</a>
        <a href="{{ route("jdih.jenis", ["id" => 5]) }}">Keputusan</a>
        <a href="{{ route("jdih.jenis", ["id" => 6]) }}">Rancangan Peraturan</a>
      </div>
    </footer>

    <div class="copyright">
      Copyright © 2023 SENAT FH UNDIP. All Rights Reserved.
    </div>
  </body>
  <script src="script7.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var currentLocation = window.location.href;
      var navLinks = document.querySelectorAll('.nav-links li');

      navLinks.forEach(function(li) {
        var link = li.querySelector('a');
        // Check if the link exists and its href attribute matches the current location
        if (link && link.href === currentLocation) {
          li.classList.add('activated');
        }
      });
    });
  </script>

</html>
