<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="styleajukansurat.css" rel="stylesheet">
    <title>SENAT FH UNDIP</title>
  </head>

  <body>

    <nav>
      <div class="nav-logo">
        <a href="{{ url('/') }}">
          <img src="/img/coba1.png" alt="Logo">
        </a>
      </div>

      <ul class="nav-links">
            <li class="link"><a href="{{ url('/') }}">Home</a></li>
            <li id="link1" class="link"><a href="{{ url('/kotakaspirasi') }}">Kotak Aspirasi</a></li>
            <li id="link2" class="link"><a href="{{ url('/faq') }}">FAQ</a></li>
            <li id="link3" class="link"><a href="{{ url('/bankaspirasi') }}">Bank Aspirasi</a></li>
            <li id="link4" class="link"><a href="{{ url('/selayangpandang') }}">Selayang Pandang</a></li>
            <li id="link4" class="link">
                <div class="dropdown">
                    <button class="dropbtn">JDIH</button>
                    <div class="dropdown-content">
                        <a href="{{ route('jdih.jenis', ['id' => 1]) }}">Peraturan Mahasiswa</a>
                        <a href="{{ route('jdih.jenis', ['id' => 2]) }}">Standart Operating Procedure</a>
                        <a href="{{ route('jdih.jenis', ['id' => 3]) }}">Peraturan Senat Mahasiswa</a>
                        <a href="{{ route('jdih.jenis', ['id' => 4]) }}">Keputusan</a>
                        <a href="{{ route('jdih.jenis', ['id' => 5]) }}">Rancangan Peraturan</a>
                    </div>
                </div>
            </li>
            <li id="link6" class="link"><a href="{{ url('/peminjamanruangan') }}">Peminjaman Ruangan</a></li>
            <li id="link4" class="link"><a href="{{ url('/transparansisurat3') }}">Transparansi surat</a></li>
</ul>

      <a href="login"><button class="btn" type="button">Ajukan Surat</button></a>
    </nav>

    <div class="container-AJ">
      <h1 class="form-title">Ajukan Surat</h1>
      <form action="#">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Nama Panjang</label>
            <input id="fullName" name="fullName" type="text" placeholder="Nama" />
          </div>
          <div class="user-input-box">
            <label for="username">Ormawa</label>
            <input id="username" name="username" type="text" placeholder="Ormawa" />
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="Email" />
          </div>
          <div class="user-input-box">
            <label for="phoneNumber">id line</label>
            <input id="phoneNumber" name="phoneNumber" type="text" placeholder="id ine" />
          </div>
          <div class="user-input-box">
            <label for="username">Angkatan</label>
            <input id="username" name="username" type="text" placeholder="Angkatan" />
          </div>
          <div class="user-input-box">
            <label for="username">Alamat</label>
            <input id="username" name="username" type="text" placeholder="Alamat" />
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">File</span>
          <div class="mb-3">
            <label class="form-label" for="formFileMultiple">Multiple files input example</label>
            <input class="form-control" id="formFileMultiple" type="file" multiple>
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>

  </body>
  <footer class="container">
    <span class="blur"></span>
    <span class="blur"></span>
    <div class="column">
      <div class="logo">
        <img src="/img/coba1.png">
      </div>
      <p>
        SENAT MAHASISWA FAKULTAS HUKUM UNDIP
      </p>
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

  <div class="copyright">
    Copyright © 2023 SENAT FH UNDIP. All Rights Reserved.
  </div>

  {{-- <script src="script.js"></script> --}}
  </body>

</html>
