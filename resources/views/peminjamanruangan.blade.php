<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="stylepeminjamanruangan.css" rel="stylesheet">
    <title>SENAT FH UNDIP</title>
  </head>

  <body>

    <<nav>
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

    <section class="container">
      <h2 class="header">PEMINJAMAN RUANGAN</h2>
      <p class="sub-header">Berisikan tentang data ruangan yang meminjam tempat di FH</p>

      <main class="table" id="customers_table">
        <section class="table__header">
          <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="img/search.png" alt="">
          </div>
          <div class="export__file">
            <label class="export__file-btn" for="export-file" title="Export File"></label>
            <input id="export-file" type="checkbox">
            <div class="export__file-options">
              <label>Export As &nbsp; &#10140;</label>
              <label id="toPDF" for="export-file">PDF <img src="img/pdf.png" alt=""></label>
              <label id="toEXCEL" for="export-file">EXCEL <img src="img/excel.png" alt=""></label>
            </div>
          </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Digunakan Oleh <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Ruangan <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tanggal <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Jam <span class="icon-arrow">&UpArrow;</span></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($roomSchedule as $index => $schedule)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $schedule->booked_by }}</td>
                        <td>{{ $schedule->room->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d M, Y') }}</td>
                        <td>
                            <p class="status delivered">{{ $schedule->time }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </section>
      </main>


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

      <script src="js-peminjamanruangan.js"></script>
  </body>

</html>
