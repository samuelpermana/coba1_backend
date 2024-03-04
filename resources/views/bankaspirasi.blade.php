@extends("layouts.layout")
@section("content")
  <link href="stylebankaspirasi.css" rel="stylesheet" />

  <section class="container">
    <h2 class="header">Bank Aspirasi</h2>
    <p class="sub-header">Berisikan tentang kumpulan aspirasi dari mahasiswa beserta jawaban.</p>

    <!-- Sarpras Section -->
    <h2 class="header-BA">Sarana dan Prasarana</h2>
    <div class="pricing">
      @foreach ($sarpras as $aspirasi)
        <div class="card">
          <div class="content">
            <h4>{{ $aspirasi->message }}</h4>
          </div>
          <button class="btn3">Selengkapnya</button>
          <div class="panel">
            <p>{{ $aspirasi->answer }}</p>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Birokrasi Section -->
    <h2 class="header-BA">Birokrasi</h2>
    <div class="pricing">
      @foreach ($birokrasi as $aspirasi)
        <div class="card">
          <div class="content">
            <h4>{{ $aspirasi->message }}</h4>
          </div>
          <button class="btn3">Selengkapnya</button>
          <div class="panel">
            <p>{{ $aspirasi->answer }}</p>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Akademik Section -->
    <h2 class="header-BA">Akademik</h2>
    <div class="pricing">
      @foreach ($akademik as $aspirasi)
        <div class="card">
          <div class="content">
            <h4>{{ $aspirasi->message }}</h4>
          </div>
          <button class="btn3">Selengkapnya</button>
          <div class="panel">
            <p>{{ $aspirasi->answer }}</p>
          </div>
        </div>
      @endforeach
    </div>
    <script src="js-bankaspirasi.js"></script>
    
  </section>
@endsection
