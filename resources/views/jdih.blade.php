@extends("layouts.layout")
@section("content")
  <link href="{{ asset("stylejdih.css") }}" rel="stylesheet" />

  @foreach ($jdihByYear as $year => $jdihRecords)
    <section class="container">
      <h2 class="headerJD">
        @if ($id == 1)
          JDIH - Peraturan Mahasiswa
        @elseif ($id == 2)
          JDIH - Standart Operating Procedure
        @elseif ($id == 3)
          JDIH - Peraturan Senat Mahasiswa
        @elseif ($id == 4)
          JDIH - Keputusan
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
  @if (isset($jdihRecord))
    <section class="container">
      <h2 class="headerJD">{{ $jdihRecord->nama_peraturan }}</h2>
      <div class="detailed-JD">
        <!-- Display other details based on your JDIH model -->
        <p>Tipe Dokumen: {{ $jdihRecord->jenis_peraturan }}</p>
        <p>Nomor Panggil: {{ $jdihRecord->file_inventarisasi }}</p>
        <!-- Add more details as needed -->
        <p>Download File: <a href="{{ url("/path/to/your/download/file") }}" download>
            <span class="blue">
              <img class="imageperma" src="/img/filetransparan.svg" alt="" />
            </span>
          </a></p>
      </div>
    </section>
  @endif
@endsection
