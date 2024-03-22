@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}
  <link href="{{ URL::asset("cms/jdih/styleedit.css") }}" rel="stylesheet">

  <body>
    <h1>Edit JDIH Record</h1>

    @if (session("success"))
      <div style="color: green;">{{ session("success") }}</div>
    @endif

    <form class="custom-form" action="{{ route("admin.jdih.update", ["id" => $jdihRecord->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input name="_method" type="hidden" value="PUT">

      <label for="tahun">Tahun:</label><br>
      <input pattern="[0-9]*" class="custom-input" id="tahun" name="tahun" type="text" value="{{ $jdihRecord->tahun }}"><br>

      <label for="jenis_jdih_id">Jenis Peraturan:</label><br>
      <select id="jenis_jdih_id" name="jenis_jdih_id" required>
        <option value="" selected disabled>Select Jenis Peraturan</option>
        @foreach($jenisJDIH as $jenis)
          <option value="{{ $jenis->id }}" {{ $jenis->id == $jdihRecord->jenis_jdih_id ? 'selected' : '' }}>{{ $jenis->name }}</option>
        @endforeach
      </select><br>

      <label for="nama_peraturan">Nama Peraturan:</label><br>
      <input class="custom-input" id="nama_peraturan" name="nama_peraturan" type="text" value="{{ $jdihRecord->nama_peraturan }}"><br>

      <label for="tanggal_disahkan">Tanggal Disahkan:</label><br>
      <input class="custom-input" id="tanggal_disahkan" name="tanggal_disahkan" type="date" value="{{ $jdihRecord->tanggal_disahkan }}"><br>

      <label for="peraturan">Peraturan:</label><br>
      <textarea accept=".doc, .docx, application/pdf" class="custom-input" id="peraturan" name="peraturan">{{ $jdihRecord->peraturan }}</textarea><br>

      <label for="status_peraturan">Status Peraturan:</label><br>
      <input accept=".doc, .docx, application/pdf" class="custom-input" id="status_peraturan" name="status_peraturan" type="text" value="{{ $jdihRecord->status_peraturan }}"><br>

      <label for="file_peraturan">File Peraturan:</label><br>
      @if ($jdihRecord->file_peraturan)
        <p><a href="{{ Storage::url($jdihRecord->file_peraturan) }}" target="_blank" class="custom-link">Download File Peraturan Lama</a></p>
      @endif
      <input accept=".doc, .docx, application/pdf" class="custom-bae" id="file_peraturan" name="file_peraturan" type="file"><br>

      <label for="file_naskah">File Naskah Akademik:</label><br>
      @if ($jdihRecord->file_naskah)
        <p><a href="{{ Storage::url($jdihRecord->file_naskah) }}" target="_blank" class="custom-link">Download File Naskah Lama</a></p>
      @endif
      <input accept=".doc, .docx, application/pdf" class="custom-bae" id="file_naskah" name="file_naskah" type="file"><br>

      <label for="file_inventarisasi">File DIM:</label><br>
      @if ($jdihRecord->file_inventarisasi)
        <p><a href="{{ Storage::url($jdihRecord->file_inventarisasi) }}" target="_blank" class="custom-link">Download File Inventarisasi Lama</a></p>
      @endif
      <input accept=".doc, .docx, application/pdf" class="custom-bae" id="file_inventarisasi" name="file_inventarisasi" type="file"><br>

      <label for="file_lainnya">File Lainnya <small style="font-size: 0.8em;">(centang jika ingin menghapus file)</small>:</label><br>
      @if ($jdihRecord->file_lain->isNotEmpty())
        <ul>
          @foreach ($jdihRecord->file_lain as $file)
            <li>
              <a href="{{ Storage::url($file->nama_file) }}" target="_blank" class="custom-link">Download File Lainnya {{ $loop->iteration }}</a>
              <input  class="custom-link" type="checkbox" name="file_to_delete[]" value="{{ $file->id }}"> <br>
            </li>
          @endforeach
        </ul>
      @endif
      <input accept=".doc, .docx, application/pdf" class="custom-bae" id="file_lainnya" name="file_lainnya[]" type="file" multiple><br>

      <button class="btn" type="submit">Update</button>
    </form>

    <a href="{{ route("admin.jdih.index") }}">Back to JDIH Records</a>
    <!-- Include your additional content, styles, and scripts as needed -->
  </body>
  {{-- Content ends here --}}
@endsection
