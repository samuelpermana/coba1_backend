<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="styleajukansurat.css">
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
            <li id="link1" class="link"><a href="kotakaspirasi.html">Kotak Aspirasi</a></li>
            <li id="link2" class="link"><a href="faq.html">FAQ</a></li>
            <li id="link3" class="link"><a href="bankaspirasi.html">Bank Aspirasi</a></li>
            <li id="link3" class="link"><a href="selayangpandang.html">Selayang Pandang</a></li>
            <li id="link4" class="link"><a href="jdih.html">JDIH</a></li>
            <li id="link4" class="link"><a href="peminjamanruangan.html">Peminjaman Ruangan</a></li>
        </ul>
        <button class="btn">Ajukan Surat</button>
    </nav>

    <div class="container-AJ">
        <h1 class="form-title">Ajukan Surat</h1>
        <form action="#">
          <div class="main-user-info">
            <div class="user-input-box">
              <label for="fullName">Nama Panjang</label>
              <input type="text"
                      id="fullName"
                      name="fullName"
                      placeholder="Nama"/>
            </div>
            <div class="user-input-box">
              <label for="username">Ormawa</label>
              <input type="text"
                      id="username"
                      name="username"
                      placeholder="Ormawa"/>    
            </div>
            <div class="user-input-box">
              <label for="email">Email</label>
              <input type="email"
                      id="email"
                      name="email"
                      placeholder=" Email"/>
            </div>
            <div class="user-input-box">
              <label for="phoneNumber">id line</label>
              <input type="text"
                      id="phoneNumber"
                      name="phoneNumber"
                      placeholder="id ine"/>
            </div>
            <div class="user-input-box">
                <label for="username">Angkatan</label>
                <input type="text"
                        id="username"
                        name="username"
                        placeholder="Angkatan"/>
              </div>
              <div class="user-input-box">
                <label for="username">Alamat</label>
                <input type="text"
                        id="username"
                        name="username"
                        placeholder="Alamat"/>
              </div>
          </div>
          <div class="gender-details-box">
            <span class="gender-title">File</span>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple>
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


    <script src="script.js"></script>
</body>

</html>