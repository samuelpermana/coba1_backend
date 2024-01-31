@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <body>
    <h2>Edit AktivitasSenat</h2>

    <form action="{{ route("admin.aktivitasSenat.update", ["id" => $aktivitasSenat->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PUT")

      <div>
        <label for="judul">Judul:</label>
        <input id="judul" name="judul" type="text" value="{{ $aktivitasSenat->judul }}" required>
      </div>

      <div>
        <label for="isi_teks">Isi Teks:</label>
        <textarea id="isi_teks" name="isi_teks" required>{{ $aktivitasSenat->isi_teks }}</textarea>
      </div>

      <div>
        <label for="gambar">Gambar:</label>
        <input id="gambar" name="gambar" type="file">
      </div>

      <button type="submit">Update</button>
    </form>

    <!-- Add your additional HTML content here -->

    <!-- Add your scripts and other body elements here -->
  </body>

  {{-- Content ends here --}}
@endsection
