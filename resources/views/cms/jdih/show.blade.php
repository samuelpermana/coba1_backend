@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}
  <link href="{{ URL::asset("cms/jdih/styleshow.css") }}" rel="stylesheet">

  <body>
    <h1>Show JDIH Record</h1>

    @if (session("success"))
      <div style="color: green;">{{ session("success") }}</div>
    @endif

    <div>
      <strong>Tahun:</strong> {{ $jdihRecord->tahun }} <br>
      <strong>Jenis Peraturan:</strong> {{ $jdihRecord->jenis_peraturan }} <br>
      <!-- Display other fields here based on your JDIH model -->
    </div>

    <a href="{{ route("admin.jdih.index") }}">Back to JDIH Records</a>

    <!-- Include your additional content, styles, and scripts as needed -->
  </body>

  {{-- Content ends here --}}
@endsection
