
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css"/>
    <link rel="stylesheet" href="{{ asset('stylejdih.css') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="styleindex.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>JDIH</title>
</head>

@extends("layouts.layout")
@section("content")
  <link href="{{ asset("stylejdih.css") }}" rel="stylesheet" />


  @foreach ($jdihByYear as $year => $jdihRecords)
    <section class="container">
      <h2 class="headerJD">
        @if ($id == 1)
          JDIH - Peraturan Mahasiswa
        @elseif ($id == 2)
          JDIH - Procedure Peraturan Senat Mahasiswa
        @elseif ($id == 3)
          JDIH - Keputusan
        @elseif ($id == 4)
          JDIH - Standart Operating 
        @elseif ($id == 5)
          JDIH - Rancangan Peraturan
        @endif
      </h2>
      <h2 class="headerJD">{{ $year }}</h2>
      <div class="makna-senat">
        <div class="features-JD">
          @foreach ($jdihRecords as $jdih)
            <div class="card-JD">
              <span class="blue"><img class="star-img" src="/img/stack.svg" alt="" /></span>
              <div class="content">
                <a class=".features-JD .card-JD h4" href="{{ route("jdih.show", ["id" => $jdih->id]) }}">{{ $jdih->nama_peraturan }}</a>
              </div>
            </div>
          @endforeach
        </div>
    </div>
</section>
@endforeach

<!-- The following section is for the detailed view of a JDIH file by ID -->
@if(isset($jdihRecord))
<section class="container">
    <h2 class="headerJD">{{ $jdihRecord->nama_peraturan }}</h2>
    <div class="detailed-JD">
        <!-- Display other details based on your JDIH model -->
        <p>Tipe Dokumen: {{ $jdihRecord->jenis_peraturan }}</p>
        <p>Nomor Panggil: {{ $jdihRecord->file_inventarisasi }}</p>
        <!-- Add more details as needed -->
        <p>Download File: <a href="{{ url('/path/to/your/download/file') }}" download>
            <span class="blue">
                <img class="imageperma" src="/img/filetransparan.svg" alt="" />
            </span>
        </a></p>
    </div>
</section>
@endif

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


    <div class="copyright">Copyright Â© 2023 SENAT FH UNDIP. All Rights Reserved.</div>
  </body>
</html>
