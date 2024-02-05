<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="style.css">
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

    <section class="container">
        <h1 class="j-header4">BADAN LEGISLASI</h1>
        <div class="container6">
            <div class="slide">
                
                <div class="item" style="background-image: url(https://images6.alphacoders.com/439/439546.jpg);">
                    <div class="content">
                        <div class="name">BADAN LEGISLASI</div>
                        <div class="des">Komisi 1 adalah komisi yang menaungi terkait dengan Bidang Pengembangan dan Keilmuan</div>
                        <a href="http://127.0.0.1:8000/komisi1" target="_blank">
                            <button>Selengkapnya</button>
                        </a>
                    </div>
                </div>
                <div class="item" style="background-image: url(https://images6.alphacoders.com/439/439546.jpg);">
                    <div class="content">
                        <div class="name">BADAN LEGISLASI</div>
                        <div class="des">Badan legislasi merupakan salah satu alat kelengkapan dari 4 badan yang berada dalam SM FH Undip 2022. Senator anggota badan legislasi mewakili masing-masing komisi terkait guna menciptakan tata kelola organisasi yang jelas dan mempermudah pembahasan produk hukum sesuai fokus komisi.</div>
                        
                    </div>
                </div>
                
            </div>
        
            
        
        </div>
    </section>

    <section class="container">
        <div class="section-header6">
            <h2 class="modern-header">Tugas Pokok dan Wewenang BADAN LEGISLASI</h2>
        </div>
        <div class="modern-wewenang">
            <div class="modern-card">
                <div class="content">
                    <h4>Bertanggungjawab terhadap seluruh produk legislasi SM FH Undip 2023</h4>
                </div>
            </div>
            <div class="modern-card">
                <div class="content">
                    <h4>Menyusun Program Legislasi bersama seluruh fungsionaris SM FH Undip</h4>
                </div>
            </div>
            <div class="modern-card">
                <div class="content">
                    <h4>Melakukan asistensi dalam penyusunan produk legislasi pada setiap komisi atau badan</h4>
                </div>
            </div>
            <div class="modern-card">
                <div class="content">
                    <h4>Menyusun, merumuskan, dan melakukan pembahasan mengenai produk legislasi SM FH Undip 2023</h4>
                </div>
            </div>
            <div class="modern-card">
                <div class="content">
                    <h4>Bertanggungjawab melakukan pengarsipan produk legislasi melalui Arsip Produk Hukum SM FH Undip 2023</h4>
                </div>
            </div>
        </div>
    </section>
</section>
<section class="container">
    <h2 class="header">Anggota Komisi 4</h2>
    <div class="anggota-4">
        <div class="card_wrapper">
            <div class="card_image">
                <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="gambar pengembangan dan keilmuan" class="card_img">
            </div>
            <div class="card_data">
                <h2 class="card_titleA">Ketua Komisi</h2>
                <h3 class="card_nameA">Fakhrunnisa Arvia Alderia</h3>
                <p class="card_des">FH UNDIP 2021</p>
            </div>
        </div>
        <div class="card_wrapper">
            <div class="card_image">
                <img src="https://cdn-icons-png.flaticon.com/512/6075/6075535.png" alt="gambar pengembangan dan keilmuan" class="card_img">
            </div>
            <div class="card_data">
                <h2 class="card_titleA">Senator Anggota</h2>
                <h3 class="card_nameA">Yolanda Sinaga</h3>
                <p class="card_des">FH UNDIP 2021</p>
            </div>
        </div>
    </div>
    <div class="anggota-4-1">
        <div class="card_wrapper">
            <div class="card_image">
                <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="gambar pengembangan dan keilmuan" class="card_img">
            </div>
            <div class="card_data">
                <h2 class="card_titleA">Senator Anggota</h2>
                <h3 class="card_nameA">Arjuna Rinaldi Hartono</h3>
                <p class="card_des">FH UNDIP 2021</p>
            </div>
        </div>
        <div class="card_wrapper">
            <div class="card_image">
                <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="gambar pengembangan dan keilmuan" class="card_img">
            </div>
            <div class="card_data">
                <h2 class="card_titleA">Senator Anggota</h2>
                <h3 class="card_nameA">Carmel Betaresh A.Foeh</h3>
                <p class="card_des">FH UNDIP 2021</p>
            </div>
        </div>
    </div>
    <div class="anggota-4-2">
        <div class="card_wrapper-4-2">
            <div class="card_image-4-2">
                <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="gambar pengembangan dan keilmuan" class="card_img">
            </div>
            <div class="card_data-4-2">
                <h2 class="card_titleA">Senator Anggota</h2>
                <h3 class="card_nameA">Dhiyaa Ulhaq Musyaffa Kartika</h3>
                <p class="card_des">FH UNDIP 2021</p>
            </div>
        </div>
    </div>
</section>
    
    

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

    <div class="copyright">
        Copyright Â© 2023 SENAT FH UNDIP. All Rights Reserved.
    </div>


    <script src="script2.js"></script>
</body>

</html>