<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"/>
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
            <a href="http://127.0.0.1:8000/selayangpandang" class="btn">Makna Logo</a>
        </div>
        <div class="img">
            <img src="/img/coba12.png">
        </div>
    </header>

    <section class="container">
        <h2 class="header">AKTIVITAS SM FH UNDIP</h2>
        
        

    <section class="container">
        <h2 class="header">AKTIVITAS LEGISLASI</h2>
        <div class="container-cal">
            <div class="left">
              <div class="calendar">
                <div class="month">
                  <i class="fas fa-angle-left prev"></i>
                  <div class="date">december 2015</div>
                  <i class="fas fa-angle-right next"></i>
                </div>
                <div class="weekdays">
                  <div>Sun</div>
                  <div>Mon</div>
                  <div>Tue</div>
                  <div>Wed</div>
                  <div>Thu</div>
                  <div>Fri</div>
                  <div>Sat</div>
                </div>
                <div class="days"></div>
                <div class="goto-today">
                  <div class="goto">
                    <input type="text" placeholder="mm/yyyy" class="date-input" />
                    <button class="goto-btn">Go</button>
                  </div>
                  <button class="today-btn">Today</button>
                </div>
              </div>
            </div>
            <div class="right">
              <div class="today-date">
                <div class="event-day">wed</div>
                <div class="event-date">12th december 2022</div>
              </div>
              <div class="events"></div>
              <div class="add-event-wrapper">
                <div class="add-event-header">
                  <div class="title">Add Event</div>
                  <i class="fas fa-times close"></i>
                </div>
                <div class="add-event-body">
                  <div class="add-event-input">
                    <input type="text" placeholder="Event Name" class="event-name" />
                  </div>
                  <div class="add-event-input">
                    <input
                      type="text"
                      placeholder="Event Time From"
                      class="event-time-from"
                    />
                  </div>
                  <div class="add-event-input">
                    <input
                      type="text"
                      placeholder="Event Time To"
                      class="event-time-to"
                    />
                  </div>
                </div>
                <div class="add-event-footer">
                    <input type="color" class="event-color" value="#ff0000" />
                  <button class="add-event-btn">Add Event</button>
                </div>
              </div>
            </div>
            <button class="add-event">
              <i class="fas fa-plus"></i>
            </button>
          </div>
      
          <div class="credits">
            
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


    <script src="script3.js"></script>
</body>

</html>