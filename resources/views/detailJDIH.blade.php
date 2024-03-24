@extends("layouts.layout")
@section("content")

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet" />

    <link href="{{ asset("styledetailjdih.css") }} " rel="stylesheet" />

    <title>JDIH</title>
  </head>

  <body>

    <div class="pricing-JD">
      <div class="card-JD1">
        <div class="content">
          <table class="content-table">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td>Tipe Dokumen</td>
                <td>{{ $jdihRecord->jenis_peraturan }}</td>
              </tr>
              <tr class="active-row">
                <td>Judul</td>
                <td>{{ $jdihRecord->nama_peraturan }}</td>
              </tr>
              <tr>
                <td>Tanggal Disahkan</td>
                <td>{{ $jdihRecord->tanggal_disahkan }}</td>
              </tr>
              <tr>
                <td>Peraturan</td>
                <td>{{ $jdihRecord->peraturan }}</td>
              </tr>
              <tr>
                <td>Status Peraturan</td>
                <td>{{ $jdihRecord->status_peraturan }}</td>
              </tr>
              <tr>
                <td>File Peraturan</td>
                <td><a href="{{ Storage::url($jdihRecord->file_peraturan) }}" target="_blank">Download</a></td>
                </td>
              </tr>
              <tr>
              <td>File Naskah Akademik</td>
              <td>
                  @if($jdihRecord->file_naskah)
                      <a href="{{ Storage::url($jdihRecord->file_naskah) }}" target="_blank">Download</a>
                  @else
                      -
                  @endif
              </td>
          </tr>
          <tr>
              <td>File DIM</td>
              <td>
                  @if($jdihRecord->file_inventarisasi)
                      <a href="{{ Storage::url($jdihRecord->file_inventarisasi) }}" target="_blank">Download</a>
                  @else
                      -
                  @endif
              </td>
          </tr>

              <tr>
                <td>File Lainnya</td>
                <td>
                  @if ($jdihRecord->file_lain->isNotEmpty())
                    <ul>
                      @foreach ($jdihRecord->file_lain as $file)
                        <li><a href="{{ Storage::url($file->nama_file) }}" target="_blank">Download {{ $loop->iteration }}</a></li>
                      @endforeach
                    </ul>
                  @else
                    N/A
                  @endif
                </td>
              </tr>
              <!-- <tr>
                              <td>Download File</td>
                              <td><a href="img/filetransparan.svg" download>
                                <span class="blue">
                                  <img class="imageperma" src="img/filetransparan.svg" alt=""/>
                                </span>
                              </a>
                              </td>
                            </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </body>
  <script src="{{ asset("script7.js") }} "></script>
@endsection
