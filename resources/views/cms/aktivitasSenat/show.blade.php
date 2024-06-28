@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <body>
    <h2>Aktivitas Senat Details</h2>


    <div>
      <strong>Judul:</strong> {{ $aktivitasSenat->judul }}
    </div>
    <div>
      <strong>Isi Teks:</strong> {{ $aktivitasSenat->isi_teks }}
    </div>
    <div>
      <strong>Gambar:</strong>
      @if ($aktivitasSenat->gambar)
        <img src="{{ Storage::url($aktivitasSenat->gambar) }}" alt="AktivitasSenat Image">
      @else
        No image available
      @endif
    </div>

    <a href="{{ route("admin.aktivitasSenat.index") }}">Back to List</a>

    <!-- Add your additional HTML content here -->

    <!-- Add your scripts and other body elements here -->
  </body>

  {{-- Content ends here --}}
@endsection
