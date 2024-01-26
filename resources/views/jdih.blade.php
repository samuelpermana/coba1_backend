<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css"/>
    <link rel="stylesheet" href="stylejdih.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <title>JDIH</title>
</head>

<body>
<nav>
    <div class="nav-logo">
        <a href="index.html">
            <img src="/img/coba23.png" alt="Logo">
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
        <li id="link4" class="link"><a href="transparansisurat3.html">Transparansi surat</a></li>
    </ul>
    
    <a href="login.html"><button type="button" class="btn">Ajukan Surat</button></a>

</nav>

@foreach($jdihByYear as $year => $jdihRecords)
<section class="container">
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

<script src="script4.js"></script>
</body>
</html>
