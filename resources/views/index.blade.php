
@extends("layouts.layout")

@section("content")
  <link href="styleindex.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="styleindex.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous"
      referrerpolicy="no-referrer" />
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
        <li class="link" id="link4"><a href="jdih.html">JDIH</a></li>
        <li class="link" id="link4"><a href="peminjamanruangan.html">Peminjaman Ruangan</a></li>
        <li class="link" id="link4"><a href="transparansisurat3.html">Transparansi surat</a></li>
      </ul>

      <a href="login.html"><button class="btn" type="button">Ajukan Surat</button></a>
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
        <a class="btn" href="http://127.0.0.1:8000/selayangpandang.html">Makna Logo</a>
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
            <div data-title="Puan Jelaskan Tiga Ajaran Bung Karno ke Generasi Muda, Apa Saja Itu?"
              data-description="PARLEMENTARIA, Jakarta - Saat meresmikan Taman Pemuda Soekarno di Ngawi, Jawa Timur, pada Jumat (19/1/2024). Ketua DPR RI Puan Maharani"><img class="img-aktivitas-sm"
                src="https://img.antaranews.com/cache/1200x800/2012/07/20120720GMNI.jpg.webp" alt="Slideshow Image I" /></div>
            <div data-title="Ketua DPR Resmikan Taman Pemuda Soekarno di Ngawi" data-description="PARLEMENTARIA, Jakarta - Ketua DPR RI Dr. (H.C) Puan Maharani meresmikan Taman Pemuda Soekarno di Ngawi, Jawa Timur. Dalam kesempatan"><img
                class="img-aktivitas-sm" src="https://static.republika.co.id/uploads/images/xlarge/_230516100857-108.jpg" alt="Slideshow Image II" />
            </div>
            <div data-title="Alokasi untuk IKN Bisa Dialihkan untuk Biayai Riset Daripada Korbankan Anggaran LPDP"
              data-description="PARLEMENTARIA, Jakarta - Anggota Komisi X DPR RI Fahmi Alaydroes mempertanyakan munculnya wacana dari pemerintah, melalui Kementerian Koordinator Bidang Pembangunan"><img class="img-aktivitas-sm"
                src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgsixk3choptC7ckWxaqpszHA50pKhEoMgYHmJDv3TckxngCd3xXeN9KdIkH4Ivet8w___ml3KWDB8XvPpT8BeaeRly87SPETtOKDw3mTr8fSj73sNQA7X6MKf6h2c1EpTrPfHfjB865J1I05pnvN_CL6d1foBTvKTlV1TN1eqxrU6Q-uRhmR1D78U7yg/s320/IMG-20230131-WA0056.jpg"
                alt="Slideshow Image III" /></div>
            <div data-title="Program Beasiswa LPDP Bisa Tetap Berjalan Tanpa Tambahan Anggaran Baru"
              data-description="PARLEMENTARIA, Jakarta - Anggota Komisi VII DPR RI Dyah Roro Esti mengungkapkan bahwa wacana penghentian program beasiswa dari Lembaga Pengelola"><img class="img-aktivitas-sm"
                src="https://media.istockphoto.com/id/500798563/id/foto/city-skyline-at-sunset-jakarta-indonesia.jpg?s=612x612&w=0&k=20&c=dICfiBlbElOeu0UceZMoFpBJ7xJF5bKyriTRZmGXHO4=" alt="Slideshow Image IV" /></div>
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
    <div class="container">
      <div class="row">
        <div class="col-12 mt-3">
          <div id='calendar'></div>
        </div>
      </div>
    </div>

    <div class="modal" id="modal-action" tabindex="-1">

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous"
      referrerpolicy="no-referrer"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.7/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous"
      referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
      const modal = $('#modal-action')
      const csrfToken = $('meta[name=csrf_token]').attr('content')

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          themeSystem: 'bootstrap5',
          events: "{{ route("legislasi.list") }}",
          editable: false,
          eventDidMount: function(info) {
            // Memeriksa kategori dari event
            var category = info.event.extendedProps.category;

            // Mengatur warna event berdasarkan kategori
            var backgroundColor;
            var borderColor;

            switch (category) {
              case 'success':
                backgroundColor = '#A13D3E';
                borderColor = '#A13D3E';
                break;
              case 'danger':
                backgroundColor = '#D4AF37';
                borderColor = '#D4AF37';
                break;
              case 'warning':
                backgroundColor = '#E1D2A2';
                borderColor = '#E1D2A2';
                break;
              case 'info':
                backgroundColor = '#A21B1B';
                borderColor = '#A21B1B';
                break;
              default:
                backgroundColor = '#CCCCCC';
                borderColor = '#CCCCCC';
            }

            // Atur warna background dan border
            info.el.style.backgroundColor = backgroundColor;
            info.el.style.borderColor = borderColor;
          }
        });

        calendar.render();
      });
    </script>

  </section>

    <script>
        const showMenu = (headerToggle, navbarId) =>{
    const toggleBtn = document.getElementById(headerToggle),
    nav = document.getElementById(navbarId)
    
    // Validate that variables exist
    if(headerToggle && navbarId){
        toggleBtn.addEventListener('click', ()=>{
            // We add the show-menu class to the div tag with the nav__menu class
            nav.classList.toggle('show-menu')
            // change icon
            toggleBtn.classList.toggle('bx-x')
        })
    }
}
showMenu('header-toggle','navbar')

/*==================== LINK ACTIVE ====================*/
const linkColor = document.querySelectorAll('.nav-links')

function colorLink(){
    linkColor.forEach(l => l.classList.remove('active'))
    this.classList.add('active')
}

linkColor.forEach(l => l.addEventListener('click', colorLink))
    </script>
    <script src="js-aktivitas-legislasi.js"></script>
    <script src="js-aktivitas-sm-fh.js"></script>

@endsection

