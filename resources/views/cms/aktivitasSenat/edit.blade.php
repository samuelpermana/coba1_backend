@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <link href="{{ URL::asset("cms/aktivitasSenat/styleedit.css") }}" rel="stylesheet">

  <body>
    <h1>Edit Aktivitas Senat</h1>


    <form action="{{ route("admin.aktivitasSenat.update", ["id" => $aktivitasSenat->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PUT")

      <div>
        <label for="judul">Judul:</label>
        <input id="judul" name="judul" type="text" value="{{ $aktivitasSenat->judul }}" required>

      </div><br>


      <div>
        <label for="isi_teks">Isi Teks:</label>
        <textarea id="isi_teks" name="isi_teks" required>{{ $aktivitasSenat->isi_teks }}</textarea>

      </div><br>

      <div>
        <label for="gambar">Gambar:</label>
        <input class="btn" id="gambar" name="gambar" type="file" accept="image/*">
      </div><br>

      <button class="btn" type="submit">Update</button>
    </form>
    <div id="back-btn"><a href= "{{ route("admin.aktivitasSenat.index") }}"><button class="btn">Back</button></a></div>


    <!-- Add your additional HTML content here -->

    <!-- Add your scripts and other body elements here -->
  </body>

  {{-- Content ends here --}}
@endsection
