<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css"/>
    <link rel="stylesheet" href="{{ asset('stylejdih.css') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <title>JDIH</title>
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

@foreach($jdihByYear as $year => $jdihRecords)
<section class="container">
    <h2 class="headerJD">
        @if ($id == 1)
            JDIH - Peraturan Mahasiswa
        @elseif ($id == 2)
            JDIH - Standart Operating Procedure
        @elseif ($id == 3)
            JDIH - Peraturan Senat Mahasiswa
        @elseif ($id == 4)
            JDIH - Keputusan
        @elseif ($id == 5)
            JDIH - Rancangan Peraturan
        @endif
    </h2>
    <h2 class="headerJD">{{ $year }}</h2>
    <div class="makna-senat">
        <div class="features-JD">
            @foreach($jdihRecords as $jdih)
                <div class="card-JD">
                    <span class="blue"><img class="star-img" src="/img/stack.svg" alt=""/></span>
                    <div class="content">
                        <a href="{{ route('jdih.show', ['id' => $jdih->id]) }}" class=".features-JD .card-JD h4">{{ $jdih->nama_peraturan }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach


<!-- The following section is for the detailed view of a JDIH file by ID -->
@if(isset($jdihRecord))
<section class="container">
    <h2 class="headerJD">{{ $jdihRecord->nama_peraturan }}</h2>
    <div class="detailed-JD">
        <!-- Display other details based on your JDIH model -->
        <p>Tipe Dokumen: {{ $jdihRecord->jenis_peraturan }}</p>
        <p>Nomor Panggil: {{ $jdihRecord->file_inventarisasi }}</p>
        <!-- Add more details as needed -->
        <p>Download File: <a href="{{ url('/path/to/your/download/file') }}" download>
            <span class="blue">
                <img class="imageperma" src="/img/filetransparan.svg" alt="" />
            </span>
        </a></p>
    </div>
</section>
@endif

<footer class="container">
  <span class="blur"></span>
  <span class="blur"></span>
  <div class="column">
      <div class="logo">
          <img src="img/coba1.png">
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


    <div class="copyright">Copyright Â© 2023 SENAT FH UNDIP. All Rights Reserved.</div>
  </body>
</html>
