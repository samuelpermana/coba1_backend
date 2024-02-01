<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset("cms/stylelayout.css") }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>CMS Senat FH Undip</title>
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

                <a href="http://127.0.0.1:8000/admin">

                  <span class="icon"><i class="fas fa-home"></i></span>
                  <span class="text">Dashboard</span>
                </a>
              </li>
              <li>

                <a href="http://127.0.0.1:8000/admin/aktivitas">

                  <span class="icon"><i class="fas fa-user"></i></span>
                  <span class="text">Aktivitas Senat</span>
                </a>
              </li>
              <li>
                <a href="http://127.0.0.1:8000/admin/jdih">
                  <span class="icon"><i class="fas fa-file-alt"></i></span>
                  <span class="text">JDIH</span>
                </a>
              </li>
              <li>

                <a href="http://127.0.0.1:8000/admin/rooms">

                  <span class="icon"><i class="fas fa-chart-pie"></i></span>
                  <span class="text">Ruangan</span>
                </a>
              </li>
              <li>

                <a href="http://127.0.0.1:8000/admin/room-schedules">

                  <span class="icon"><i class="fas fa-clock"></i></span>
                  <span class="text">Jadwal Ruangan</span>
                </a>
              </li>
            </ul>

            <ul class="social">
              <li>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-instagram"></i></a>
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
  </body>

</html>
