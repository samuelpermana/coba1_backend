@extends("cms.layouts.layout")


@section("content")
  <link href="{{ URL::asset("cms/jdih/styleindex.css") }}" rel="stylesheet">

  <body>

    <div class="container">
      <div class="content">
        <h1>JDIH Records</h1>
        <main class="table" id="customers_table">
          @if (session("success"))
            <div style="color: green;">{{ session("success") }}</div>
          @endif

          <button class="btn"><a href="{{ route("admin.jdih.create") }}">Create New JDIH Record</a></button>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">List JDIH</div>

                  <div class="table__body">
                    <table class="item" border="1">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tahun</th>
                          <th>Jenis Peraturan</th>
                          <th>Nama Peraturan</th>
                          <th>Tanggal Disahkan</th>
                          <th>File Peraturan</th>
                          <th>File Naskah</th>
                          <th>File Inventarisasi</th>
                          <th>File Lainnya</th>
                          <th>Action</th> <!-- New column for actions -->
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($jdihRecords as $key => $jdih)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $jdih->tahun }}</td>
                            <td>{{ $jdih->jenis_peraturan }}</td>
                            <td>{{ $jdih->nama_peraturan }}</td>
                            <td>{{ $jdih->tanggal_disahkan }}</td>
                            <td><a href="{{ Storage::url($jdih->file_peraturan) }}" target="_blank">Download</a></td>
                            <td>
                              @if ($jdih->file_naskah)
                                <a href="{{ Storage::url($jdih->file_naskah) }}" target="_blank">Download</a>
                              @else
                                N/A
                              @endif
                            </td>
                            <td>
                              @if ($jdih->file_inventarisasi)
                                <a href="{{ Storage::url($jdih->file_inventarisasi) }}" target="_blank">Download</a>
                              @else
                                N/A
                              @endif
                            </td>
                            <td>
                              @if ($jdih->file_lain->isNotEmpty())
                                <ul>
                                  @foreach ($jdih->file_lain as $file)
                                    <li><a href="{{ Storage::url($file->nama_file) }}" target="_blank">Download {{ $loop->iteration }}</a></li>
                                  @endforeach
                                </ul>
                              @else
                                N/A
                              @endif
                            </td>
                            <td>
                              <a href="{{ route("admin.jdih.update", $jdih->id) }}">Edit</a> |
                              <a href="{{ route("admin.jdih.delete", $jdih->id) }}">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    </div>
    </div>
    </div>

    <script>
      var hamburger = document.querySelector(".hamburger");
      var wrapper = document.querySelector(".wrapper");
      var backdrop = document.querySelector(".backdrop");

      hamburger.addEventListener("click", function() {
        wrapper.classList.add("active");
      })

      backdrop.addEventListener("click", function() {
        wrapper.classList.remove("active");
      })
    </script>
  </body>
@endsection
