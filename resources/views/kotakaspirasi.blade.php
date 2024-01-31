<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="styleka.css">
=======
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="stylekotakaspirasi.css" rel="stylesheet">
>>>>>>> 981d35df0dee56e8ebe93c2bf51a409e61dd5be1
    <title>SENAT FH UNDIP</title>
  </head>

  <body>

    <nav>
      <div class="nav-logo">
        <a href="index">
          <img src="/img/coba1.png" alt="Logo">
        </a>
      </div>

      <ul class="nav-links">
        <li class="link"><a href="index">Home</a></li>
        <li class="link" id="link1"><a href="kotakaspirasi">Kotak Aspirasi</a></li>
        <li class="link" id="link2"><a href="faq">FAQ</a></li>
        <li class="link" id="link3"><a href="bankaspirasi">Bank Aspirasi</a></li>
        <li class="link" id="link4"><a href="selayangpandang">Selayang Pandang</a></li>
        <li class="link" id="link4"><a href="jdih">JDIH</a></li>
        <li class="link" id="link4"><a href="peminjamanruangan">Peminjaman Ruangan</a></li>
        <li class="link" id="link4"><a href="transparansisurat3">Transparansi surat</a></li>
      </ul>

      <a href="login"><button class="btn" type="button">Ajukan Surat</button></a>
    </nav>

    <section id="contact">
      <h2>KOTAK ASPIRASI</h2>
      <form action="{{ route("aspirasi.store") }}" method="POST">

        <label for="name">Nama:</label>
        <input id="name" name="name" type="text" required>

        <label for="email">Email:</label>
        <input id="email" name="email" type="email" required>

        <label for="angkatan">Angkatan:</label>
        <input id="angkatan" name="angkatan" type="text" required>

        <label for="id_line">ID Line:</label>
        <input id="id_line" name="id_line" type="text" required>

        <div class="message-container">
          <label for="message">Pesan:</label>
          <textarea id="message" name="message" required></textarea>
          @csrf <button type="submit">Kirim</button>
        </div>
      </form>
    </section>

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

  </body>

</html>
