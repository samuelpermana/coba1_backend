@extends("layouts.layout")
@section("content")
  <link href="stylekotakaspirasi.css" rel="stylesheet">


  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="stylekotakaspirasi.css" rel="stylesheet">

    <title>SENAT FH UNDIP</title>
  </head>

  <body>

    <nav>
      <div class="nav-logo">
        <a href="#">
          <img src="/img/coba1.png" alt="Logo">
        </a>
      </div>

      <ul class="nav-links">
        <li class="link"><a href="index.html">Home</a></li>
        <li class="link" id="link1"><a href="kotakaspirasi.html">Kotak Aspirasi</a></li>
        <li class="link" id="link2"><a href="faq.html">FAQ</a></li>
        <li class="link" id="link3"><a href="bankaspirasi.html">Bank Aspirasi</a></li>
        <li class="link" id="link4"><a href="selayangpandang.html">Selayang Pandang</a></li>
        <li class="link" id="link5"><a href="jdih.html">JDIH</a></li>
        <li class="link" id="link6"><a href="peminjamanruangan.html">Peminjaman Ruangan</a></li>
        <li class="link" id="link7"><a href="transparansisurat3.html">Transparansi Surat</a></li>
      </ul>
      <button class="btn">Ajukan Surat</button>
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
@endsection
