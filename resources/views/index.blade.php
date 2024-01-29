<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="styleindex.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <header class="container">
        <div class="content">
            <span class="blur"></span>
            <span class="blur"></span>
            <h4 style="font-size: 2rem;">SENAT MAHASISWA FAKULTAS HUKUM UNDIP</h4>
            <h1 style="color: #D4AF37">ARYA WIRARAJA</h1>

            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus rem eos aliquid quo rerum
                temporibus ipsum distinctio numquam ut omnis placeat, nam sint atque quos dolorem laborum? Rerum, esse
                dolorem.
            </p>
            <a class="btn" href="http://127.0.0.1:8000/selayangpandang">Makna Logo</a>
        </div>
        <div class="img">
            <img src="/img/coba12.png">
        </div>
    </header>

    <section class="container">
        <h2 class="header">AKTIVITAS SM FH UNDIP</h2>
        <div id="slideshow-grid">
            <div id="slideshow">
                <div id="slidewindow">
                    <!-- Use Blade directives to loop through the data -->
                    @foreach ($aktivitasSenats as $aktivitasSenat)
                        <div data-title="{{ $aktivitasSenat->judul }}"
                            data-description="{{ $aktivitasSenat->isi_teks }}">
                            <img class="img-aktivitas-sm"
                                src="{{ asset('storage/app/public/aktivitasSenat/' . $aktivitasSenat->gambar) }}"
                                alt="Slideshow Image" />
                        </div>
                    @endforeach
                </div>
                <div id="controls">
                    <a id="next">
                        <div></div>
                    </a>
                    <ul id="dots"></ul>
                    <a id="prev">
                        <div></div>
                    </a>
                </div>
            </div>
            <div id="description">
                <h1 class="data-title"></h1>
                <p class="data-description"></p>
            </div>
        </div>
    </section>


    <section class="container">
        <h2 class="header">AKTIVITAS LEGISLASI</h2>
        <p class="sub-header">
            Aktivitas tahapan Legislasi yang dibentuk oleh SM FH Undip sebelum disahkan atau ditetapkan.
        </p>
        <div class="container7">
            <div class="calendar">
                <div class="header">
                    <div class="month"></div>
                    <div class="btns">
                        <div class="btn today-btn">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="btn prev-btn">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="btn next-btn">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
                <div class="weekdays">
                    <div class="day">Sun</div>
                    <div class="day">Mon</div>
                    <div class="day">Tue</div>
                    <div class="day">Wed</div>
                    <div class="day">Thu</div>
                    <div class="day">Fri</div>
                    <div class="day">Sat</div>
                </div>
                <div class="days">
                    <!-- lets add days using js -->
                </div>
            </div>
        </div>

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
            <a href="#">Template</a>
            <a href="#">Template</a>
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

    <script src="js-aktivitas-legislasi.js"></script>
    <script src="js-aktivitas-sm-fh.js"></script>
</body>

</html>
