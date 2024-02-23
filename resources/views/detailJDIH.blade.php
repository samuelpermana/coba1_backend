
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" />

    <link rel="stylesheet" href="{{ asset('styledetailjdih.css') }} " />
    <title>JDIH</title>
</head>


  <body>
    <nav>
      <div class="nav-logo">
        <a href="{{ url('/') }}">
          <img src="/img/coba1.png" alt="Logo" />
        </a>
      </div>

      <ul class="nav-links">
            <li class="link"><a href="{{ url('/') }}">Home</a></li>
            <li id="link1" class="link"><a href="{{ url('/kotakaspirasi') }}">Kotak Aspirasi</a></li>
            <li id="link2" class="link"><a href="{{ url('/faq') }}">FAQ</a></li>
            <li id="link3" class="link"><a href="{{ url('/bankaspirasi') }}">Bank Aspirasi</a></li>
            <li id="link4" class="link"><a href="{{ url('/selayangpandang') }}">Selayang Pandang</a></li>
            <li id="link4" class="link">
                <div class="dropdown">
                    <button class="dropbtn">JDIH</button>
                    <div class="dropdown-content">
                        <a href="{{ route('jdih.jenis', ['id' => 1]) }}">Peraturan Mahasiswa</a>
                        <a href="{{ route('jdih.jenis', ['id' => 2]) }}">Peraturan Senat Mahasiswa</a>
                        <a href="{{ route('jdih.jenis', ['id' => 3]) }}">Keputusan</a>
                        <a href="{{ route('jdih.jenis', ['id' => 4]) }}">Standart Operating Procedure </a>
                        <a href="{{ route('jdih.jenis', ['id' => 5]) }}">Rancangan Peraturan</a>
                    </div>
                </div>
            </li>
            <li id="link6" class="link"><a href="{{ url('/peminjamanruangan') }}">Peminjaman Ruangan</a></li>
            <li id="link4" class="link"><a href="{{ url('/transparansisurat3') }}">Transparansi surat</a></li>
</ul>
      <button class="btn">Ajukan Surat</button>
    </nav>

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
                        <td>File Naskah</td>
                        <td><a href="{{ Storage::url($jdihRecord->file_naskah) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                        <td>File Inventarisasi</td>
                        <td><a href="{{ Storage::url($jdihRecord->file_inventarisasi) }}" target="_blank">Download</a></td>
                  </tr>
                  <tr>
                        <td>File Lainnya</td>
                        <td>@if ($jdihRecord->file_lain->isNotEmpty())
                                                <ul>
                                                    @foreach ($jdihRecord->file_lain as $file)
                                                        <li><a href="{{ Storage::url($file->nama_file) }}" target="_blank">Download {{ $loop->iteration }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                N/A
                                            @endif</td>            
                  </tr>
                  <!-- <tr>
                    <td>Download File</td>
                    <td><a href="/img/filetransparan.svg" download>
                      <span class="blue">
                        <img class="imageperma" src="/img/filetransparan.svg" alt="" />
                      </span>
                    </a>
                    </td>      
                  </tr> -->
                </tbody>
              </table>
          </div>
        </div>
      </div>
    <footer class="container">
        <span class="blur"></span>
        <span class="blur"></span>
        <div class="column">
            <div class="logo">
                <img src="img/coba1.png">
            </div>
            <p>
                SENAT MAHASISWA FAKULTAS HUKUM UNDIP
            </p>
            <div class="socials">
                <a href="#"><i class="ri-youtube-line"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>
                <a href="#"><i class="ri-twitter-line"></i></a>
            </div>
        </div>
        <div class="column">
            <h4>CONTOH</h4>
            <a href="#">Template</a>
            <a href="#">Template</a>
            <a href="#">Template</a>
        </div>
        <div class="column">
            <h4>About Us</h4>
            <a href="#">Blogs</a>
            <a href="#">Channels</a>
            <a href="#">Sponsors</a>
        </div>
        <div class="column">
            <h4>Contact</h4>
            <a href="#">Contact Us</a>
            <a href="#">Privicy Policy</a>
            <a href="#">Terms & Conditions</a>
        </div>
    </footer>

</body>
</html>
