@extends("layouts.layout")

@section("content")
  <link href="styleindex.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
  <link href="styleindex.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    /* CSS untuk mengubah warna teks dan border kalender menjadi putih */
    .fc th,
    .fc td {
      color: white;
      /* Mengubah warna teks menjadi putih */
      border-color: white;
      /* Mengubah warna border menjadi putih */
    }
  </style>
  <div class="container-bg">
    <div class="blob-bg">
    </div>
  </div>
  <header class="container">
    <div class="content">
      <span class="blur"></span>
      <span class="blur"></span>
      <h4 style="font-size: 2rem;">SENAT MAHASISWA FAKULTAS HUKUM UNIVERSITAS DIPONEGORO</h4>
      <h1 style="color: #D4AF37">ARYA WIRARAJA</h1>
      <p>
        Selamat datang di portal resmi Senat Fakultas Hukum Universitas Diponegoro! Kami bangga menjadi wadah bagi mahasiswa-mahasiswa FH Undip untuk berpartisipasi aktif dalam proses pembelajaran, pengembangan diri, serta pengabdian kepada mahasiswa Fakultas Hukum Universitas Diponegoro.
        Sebagai lembaga yang mewakili suara mahasiswa, Senat FH Undip berkomitmen untuk menjaga dan memajukan kualitas kinerja di lingkungan fakultas. Kami mengedepankan nilai-nilai humanis, profesional, dan berwibawa dalam setiap langkah yang kami ambil.
        Melalui situs web ini, Anda akan menemukan informasi terkini mengenai kegiatan, program, dan berbagai kegiatan yang kami selenggarakan. Kami juga mengundang Anda untuk terlibat secara aktif dalam berbagai kegiatan yang kami adakan, serta menyampaikan aspirasi dan gagasan Anda untuk kemajuan bersama.
        Terima kasih telah mengunjungi situs web Senat FH Undip. Mari bersama-sama menciptakan lingkungan belajar yang inspiratif dan berdaya saing tinggi bagi mahasiswa FH Undip.Viva Legislativa!
      </p>
      <a class="btn" href="{{ url("/selayangpandang") }}">Makna Logo</a>
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
            <div data-title="{{ $aktivitasSenat->judul }}" data-description="{{ $aktivitasSenat->isi_teks }}">
              <!-- <p>Image URL: {{ asset("storage/images/" . $aktivitasSenat->gambar) }}</p> -->
              <img class="img-aktivitas-sm" src="{{ Storage::url($aktivitasSenat->gambar) }}" alt="Slideshow Image" />

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
    <h2 class="header">AKTIVITAS LEGISLATIF</h2>
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
                    backgroundColor = '#2B6172';
                    borderColor = '#2B6172';
                    break;
                case 'danger':
                    backgroundColor = '#FDF4E6';
                    borderColor = '#FDF4E6';
                    break;
                case 'warning':
                    backgroundColor = '#FEFEFE';
                    borderColor = '#FEFEFE';
                    break;
                case 'info':
                    backgroundColor = '#AEAAAA';
                    borderColor = '#AEAAAA';
                    break;
                case 'primary':
                    backgroundColor = '#A13D3E';
                    borderColor = '#A13D3E';
                    break;
                case 'secondary':
                    backgroundColor = '#94e51a';
                    borderColor = '#94e51a';
                    break;
                case 'dark':
                    backgroundColor = '#8e7e71';
                    borderColor = '#8e7e71';
                    break;
                case 'light':
                    backgroundColor = '#96a659';
                    borderColor = '#96a659';
                    break;
                case 'link':
                    backgroundColor = '#84629d';
                    borderColor = '#84629d';
                    break;
                default:
                    backgroundColor = '#CCCCCC';
                    borderColor = '#CCCCCC';
            }

            // Atur warna background dan border
            info.el.style.backgroundColor = backgroundColor;
            info.el.style.borderColor = borderColor;
            const title = info.event.title;
            info.el.setAttribute('title', title);
        },
        eventClick: function(arg) {
            var title = arg.event.title; 
            const eventDetailHTML = `
                <div>
                    <h2>${title}</h2>
                </div>
            `;
            modal.html(eventDetailHTML).modal('show');
        }
    });
    calendar.render();
});
    </script>

  </section>

  <script>
    const showMenu = (headerToggle, navbarId) => {
      const toggleBtn = document.getElementById(headerToggle),
        nav = document.getElementById(navbarId)

      // Validate that variables exist
      if (headerToggle && navbarId) {
        toggleBtn.addEventListener('click', () => {
          // We add the show-menu class to the div tag with the nav__menu class
          nav.classList.toggle('show-menu')
          // change icon
          toggleBtn.classList.toggle('bx-x')
        })
      }
    }
    showMenu('header-toggle', 'navbar')

    /*==================== LINK ACTIVE ====================*/
    const linkColor = document.querySelectorAll('.nav-links')

    function colorLink() {
      linkColor.forEach(l => l.classList.remove('active'))
      this.classList.add('active')
    }

    linkColor.forEach(l => l.addEventListener('click', colorLink))
  </script>
  <script src="js-aktivitas-legislasi.js"></script>
  <script src="js-aktivitas-sm-fh.js"></script>
@endsection
