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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SENAT FH UNDIP</title>

    <style>
        /* CSS untuk mengubah warna teks dan border kalender menjadi putih */
        .fc th, .fc td {
            color: white; /* Mengubah warna teks menjadi putih */
            border-color: white; /* Mengubah warna border menjadi putih */
        }
    </style>
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
                            <!-- <p>Image URL: {{ asset('storage/images/' . $aktivitasSenat->gambar) }}</p> -->
                            <img class="img-aktivitas-sm"
                                src="{{Storage::url($aktivitasSenat->gambar)}}"
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
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    <div id="modal-action" class="modal" tabindex="-1">
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.7/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const modal = $('#modal-action')
        const csrfToken = $('meta[name=csrf_token]').attr('content')

        document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap5',
        events: "{{ route('admin.events.list') }}",
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
