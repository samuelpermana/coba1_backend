<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link href="stylekotakaspirasi.css" rel="stylesheet">
    <title>SENAT FH UNDIP</title>
  </head>

  <body>
    <header class="header">
      <div class="header__container">
          <div class="header__toggle">
              <i class='bx bx-menu' id="header-toggle"></i>

          </div>
      </div>
  </header>
  <div class="nav2" id="navbar">
    <nav class="nav2__container">
        <div>
            <a href="#" class="nav2__link nav2__logo">
              <img src="/img/coba1.png" alt="Logo">
                
            </a>

            <div class="nav2__list">
                <div class="nav2__items">
                    

                    <a href="{{ url('/') }}" class="nav2__link active">
                        <i class='bx bx-home nav2__icon' ></i>
                        <span class="nav2__name">Home</span>
                    </a>
                    
                    <div class="nav2__dropdown">
                        <a href="{{ url('/kotakaspirasi') }}" class="nav2__link">
                            <i class='bx bx-user nav2__icon' ></i>
                            <span class="nav2__name">Kotak Aspirasi</span>
                            
                        </a>

                        
                    </div>
                    <div class="nav2__items">
                    <a href="{{ url('/faq') }}" class="nav2__link">
                        <i class='bx bx-message-rounded nav2__icon' ></i>
                        <span class="nav2__name">FAQ</span>
                    </a>
                </div>

                
                   

                    <div class="nav2__dropdown">
                        <a href="{{ url('/bankaspirasi') }}" class="nav2__link">
                            <i class='bx bx-file nav2__icon' ></i>
                            <span class="nav2__name">Bank Aspirasi</span>
                            
                        </a>


                    </div>

                    <a href="{{ url('/selayangpandang') }}" class="nav2__link">
                        <i class='bx bx bx-user nav2__icon' ></i>
                        <span class="nav2__name">Selayang Pandang</span>
                    </a>
                    <a href="{{ url('/JDIH') }}" class="nav2__link">
                        <i class='bx bx-file nav2__icon' ></i>
                        <span class="nav2__name">JDIH</span>
                    </a>
                    <a href="{{ url('/peminjamanruangan') }}" class="nav2__link">
                      <i class='bx bx-time nav2__icon' ></i>
                      <span class="nav2__name">Peminjaman Ruangan</span>
                  </a>
                  <a href="{{ url('/transparansisurat3') }}" class="nav2__link">
                    <i class='bx bx-file nav2__icon' ></i>
                    <span class="nav2__name">Transparansi Surat</span>
                </a>
                </div>
            </div>
        </div>
    </nav>
</div>
    <nav>
      <div class="nav-logo">
        <a href="{{ url('/') }}">
          <img src="/img/coba23.png" alt="Logo">
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
    <script src="script7.js"></script>
  </body>

</html>
