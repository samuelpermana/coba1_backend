<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" />
    <link rel="stylesheet" href="{{ asset('styledetailjdih.css') }} " />
    <title>JDIH</title>
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
    <div class="pricing-JD">
        <div class="card-JD1">
            <div class="content">
                <table class="content-table">
                    <thead>
                        <!-- Add any table header if needed -->
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tipe Dokumen</td>
                            <td>{{ $jdihRecord->jenis_peraturan }}</td>
                        </tr>
                        <tr class="active-row">
                            <td>Judul</td>
                            <td>{{ $jdihRecord->nama_peraturan }}</td>
                        </tr>
                        <tr>
                            <td>T.E.U.</td>
                            <td>{{ $jdihRecord->file_naskah }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Panggil</td>
                            <td>{{ $jdihRecord->file_inventarisasi }}</td>
                        </tr>
                        <!-- Add more rows as needed based on your JDIH model attributes -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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

</body>
</html>
