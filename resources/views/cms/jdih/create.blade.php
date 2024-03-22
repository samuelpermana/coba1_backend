@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}
  <link href="{{ URL::asset("cms/jdih/stylecreate.css") }}" rel="stylesheet">

  <body>
    <h1>Create JDIH Record</h1>

    @if (session("success"))
      <div style="color: green;">{{ session("success") }}</div>
    @endif

    <form class="custom-form" action="{{ route("admin.jdih.store") }}" method="POST" enctype="multipart/form-data">
      @csrf

      <label for="tahun">Tahun:</label>
      <input id="tahun" name="tahun" type="text" pattern="[0-9]*" required><br>

      <label for="jenis_jdih_id">Jenis Peraturan:</label>
      <select id="jenis_jdih_id" name="jenis_jdih_id" required>
        <option value="" selected disabled>Select Jenis Peraturan</option>
        @foreach ($jenisJDIH as $jenis)
          <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
        @endforeach
      </select><br>

      <label for="nama_peraturan">Nama Peraturan:</label>
      <input id="nama_peraturan" name="nama_peraturan" type="text" required><br>

      <label for="tanggal_disahkan">Tanggal Disahkan:</label>
      <input id="tanggal_disahkan" name="tanggal_disahkan" type="date" required><br>

      <label for="peraturan">Peraturan:</label>
      <textarea id="peraturan" name="peraturan" required></textarea><br>

      <label for="status_peraturan">Status Peraturan:</label>
      <input id="status_peraturan" name="status_peraturan" type="text" required><br>

      <label for="file_peraturan">File Peraturan:</label>
      <input name="file_peraturan" type="file"accept=".doc, .docx, application/pdf">

      <label for="file_naskah">File Naskah Akademik:</label>
      <input name="file_naskah" type="file" accept=".doc, .docx, application/pdf">

      <label for="file_inventarisasi">File DIM:</label>
      <input name="file_inventarisasi" type="file" accept=".doc, .docx, application/pdf">

      <label for="file_lainnya">File Lainnya:</label>
      <input name="file_lainnya[]" type="file" multiple accept=".doc, .docx, application/pdf">

      <button class="btn" type="submit">Create JDIH Record</button>
    </form>

    <a href="{{ route("admin.jdih.index") }}">Back to JDIH Records</a>
    <!-- Include your additional content, styles, and scripts as needed -->
  </body>
  {{-- Content ends here --}}
@endsection
