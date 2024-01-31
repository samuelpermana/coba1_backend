@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <body>
    <h2>Create AktivitasSenat</h2>

    <form action="{{ route("admin.aktivitasSenat.store") }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div>
        <label for="judul">Judul:</label>
        <input id="judul" name="judul" type="text" required>
      </div>

      <div>
        <label for="isi_teks">Isi Teks:</label>
        <textarea id="isi_teks" name="isi_teks" required></textarea>
      </div>

      <div>
        <label for="gambar">Gambar:</label>
        <input id="gambar" name="gambar" type="file">
      </div>

      <button type="submit">Create</button>
    </form>

    <!-- Add your additional HTML content here -->

    <!-- Add your scripts and other body elements here -->
  </body>

  {{-- Content ends here --}}
@endsection
