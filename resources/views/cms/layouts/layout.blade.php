<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset("cms/stylelayout.css") }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>CMS Senat FH Undip</title>
    <link type="image/x-icon" href="{{ URL::asset("img/coba23.ico") }}" rel="icon">
    <link type="image/x-icon" href="{{ URL::asset("img/coba23.ico") }}" rel="shortcut icon">
  </head>

  <body>
    <div class="wrapper">
      <div class="wrapper_inner">
        <div class="vertical_wrap">
          <div class="backdrop"></div>
          <div class="vertical_bar">
            <div class="profile_info">
              <div class="img_holder">
                <img src="/img/coba23.png" alt="Logo Senat" style="margin-bottom: 10px">
              </div>
              <p class="title">CMS SENAT FH</p>
              <p class="sub_title">senatfhundip@gmail.com</p>
            </div>
            <ul class="menu">
              <li>
                <a href="{{ url("/admin") }}">
                  <span class="icon"><i class="fas fa-home"></i></span>
                  <span class="text">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="{{ url("/admin/aktivitas") }}">
                  <span class="icon"><i class="fas fa-user"></i></span>
                  <span class="text">Aktivitas Senat</span>
                </a>
              </li>
              <li>
                <a href="{{ url("/admin/jdih") }}">
                  <span class="icon"><i class="fas fa-file-alt"></i></span>
                  <span class="text">JDIH</span>
                </a>
              </li>
              <li>
                <a href="{{ url("/admin/rooms") }}">
                  <span class="icon"><i class="fas fa-chart-pie"></i></span>
                  <span class="text">Ruangan</span>
                </a>
              </li>
              <li>
                <a href="{{ url("/admin/room-schedules") }}">
                  <span class="icon"><i class="fas fa-clock"></i></span>
                  <span class="text">Jadwal Ruangan</span>
                </a>
              </li>
              <li>
                <a href="{{ url("/admin/bankaspirasi") }}">
                  <span class="icon"><i class="fas fa-university"></i></span>
                  <span class="text">Bank Aspirasi</span>
                </a>
              </li>
              <li>
                <a href="{{ url("/admin/events") }}">
                  <span class="icon"><i class="far fa-calendar"></i></span>
                  <span class="text">Events</span>
                </a>
              </li>
              <li>
                <a href="{{ url("/admin/persetujuan-proposal") }}">
                  <span class="icon"><i class="fas fa-handshake"></i></span>
                  <span class="text">Persetujuan Proposal</span>
                </a>
              </li>
              <li>
                <a href="{{ url("/admin/faq") }}">
                  <span class="icon"><i class="fas fa-question"></i></span>
                  <span class="text">Faq</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="main_container">
          <div class="top_bar">
            <div class="hamburger">
              <i class="fas fa-bars"></i>
            </div>
            <div class="logo">Senat FH <span>UNDIP</span></div>
            <!-- Tombol Logout -->
            <div class="logout">
              <a href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" style="display: none;" action="{{ route("logout") }}" method="POST">
                @csrf
              </form>
            </div>
          </div>

          <div class="container">
            <div class="content"></div>
            {{-- Content goes here --}}
            @yield("content")
            {{-- Content ends here --}}
          </div>
        </div>
      </div>
    </div>

    <script>
      var hamburger = document.querySelector(".hamburger");
      var wrapper = document.querySelector(".wrapper");
      var backdrop = document.querySelector(".backdrop");

      hamburger.addEventListener("click", function() {
        wrapper.classList.add("active");
      });

      backdrop.addEventListener("click", function() {
        wrapper.classList.remove("active");
      });
    </script>
    <script>
      // Mendapatkan URL saat ini
      var currentUrl = window.location.href;

      // Mendapatkan semua tautan di dalam menu
      var menuLinks = document.querySelectorAll(".menu a");

      // Meloop melalui setiap tautan menu
      menuLinks.forEach(function(link) {
        // Memeriksa apakah URL saat ini cocok dengan URL tautan menu
        if (link.href === currentUrl) {
          // Menambahkan kelas active ke tautan menu
          link.classList.add("active");
        }
      });
    </script>

  </body>

</html>
