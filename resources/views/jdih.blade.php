
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css"/>
    <link rel="stylesheet" href="{{ asset('stylejdih.css') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
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

@endsection

