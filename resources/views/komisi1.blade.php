@extends("layouts.layout")
@section("content")
  <link href="stylekomisi1.css" rel="stylesheet">

  <section class="container">
    <h1 class="j-header4">KOMISI I</h1>
    <div class="container6">
      <div class="slide">

      <div class="item"  style="background-image: url(img/KOMISI1.jpg);">
          <div class="content">
            <div class="name">KOMISI I</div>
            <div class="des">Komisi I adalah komisi yang menaungi terkait dengan Bidang Pengembangan dan Keilmuan</div>
            <a href="http://127.0.0.1:8000/komisi1" target="_blank">
              <button>Selengkapnya</button>
            </a>
          </div>
        </div>
        <div class="item"  style="background-image: url(img/komisi1fix.jpg);">
          <div class="content">
            <div class="name">KOMISI I</div>
            <div class="des">Komisi I adalah adalah komisi yang menaungi terkait dengan Bidang Pengembangan dan Keilmuan</div>

          </div>
        </div>

      </div>

    </div>
  </section>

  <section class="container">
    <div class="section-header6">
      <h2 class="modern-header">Tugas Pokok dan Wewenang Komisi I</h2>
    </div>
    <div class="modern-wewenang">
      <div class="modern-card">
        <div class="content">
          <h4>Melaksanakan Rapat Kerja Dengan Mitra Kerja Dalam Bidang pengembangan dan keilmuan</h4>
        </div>
      </div>
      <div class="modern-card">
        <div class="content">
          <h4>Menampung aspirasi dari mitra kerja dalam bidang pengembangan dan keilmuan serta melakukan advokasi kepada pihak terkait</h4>
        </div>
      </div>
      <div class="modern-card">
        <div class="content">
          <h4>Melaksanakan fungsi pengawasan dan fungsi legislasi terhadap mitra kerja dalam bidang pengembangan dan keilmuan</h4>
        </div>
      </div>
      <div class="modern-card">
        <div class="content">
          <h4>Menjembatani hubungan mitra kerja dalam bidang pengembangan dan keilmuan dengan Dekanat</h4>
        </div>
      </div>
      <div class="modern-card">
        <div class="content">
          <h4>Melaksanakan Laporan Pertanggung jawaban Terbuka dari mitra kerja</h4>
        </div>
      </div>
    </div>
  </section>
  <section class="container-k">
    <h2 class="header">Agenda Kerja</h2>
    @foreach ($agendas['Komisi I SM FH Undip'] as $agenda)
    <div class="tag-divide">
        <button class="accordion-k">{{ $agenda->nama }}</button>
        <div class="panel-k">
            <div class="agenda">
                <h2 class="title-k">Agenda</h2>
                <p>{{ $agenda->deskripsi }}</p>
            </div>
            <div class="check">
                <div class="title-k">
                    <h2>Status Pelaksanaan</h2>
                </div>
                <label class="container-check">
                    <input class="check-box" type="checkbox" {{ $agenda->status ? 'checked disabled' : 'disabled' }}>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="file">
                <h2 class="title-k">File</h2>
                <div class="container-img">
                    <svg class="bi bi-file-pdf" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1" />
                        <path
                            d="M4.603 12.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.6 11.6 0 0 0-1.997.406 11.3 11.3 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.244.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 5.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z" />
                    </svg>
                    @if($agenda->file)
                        <a href="{{ Storage::url($agenda->file) }}" target="_blank" class="d-btn">
                            <button class="d-btn">Dokumen</button>
                        </a>
                    @else
                        -
                    @endif
                    @if($agenda->link)
                        <a href="{{ $agenda->link }}" target="_blank" class="d-btn">
                            <button class="d-btn">Link</button>
                        </a>
                    @else
                        -
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>

  <section class="container">
    <h2 class="header">Anggota Komisi I</h2>
    <div class="anggota-4">
      <div class="card-coba">
          <div class="imgbox">
            <img class="img-coba"
              src="/img/gibran-kuning.png"
            />
          </div>
    
          <div class="content1">
            <h2>Muhammad Gibran Widiharyanto</h2>
            <p class="deskripsi">
              Ketua Komisi I</br>FH UNDIP 2022
            </p>
          </div>
      </div>
      <div class="card-coba">
          <div class="imgbox">
            <img class="img-coba"
              src="/img/maharani-kuning.png"
            />
          </div>
    
          <div class="content1">
            <h2>Maharani Ali Putri</h2>
            <p class="deskripsi">
              Senator Anggota</br>FH UNDIP 2022
            </p>
          </div>
      </div>
    </div>
    <div class="anggota-4-1">
      <div class="card-coba">
            <div class="imgbox">
              <img class="img-coba"
                src="/img/sami-kuning.png"
              />
            </div>
      
            <div class="content1">
              <h2>Sami Makarim</h2>
              <p class="deskripsi">
                Senator Anggota</br>FH UNDIP 2022
              </p>
            </div>
        </div>
        <div class="card-coba">
            <div class="imgbox">
              <img class="img-coba"
                src="/img/ridho-kuning.png"
              />
            </div>
      
            <div class="content1">
              <h2>Muhammad Ridho Putra Pratama</h2>
              <p class="deskripsi">
                Senator Anggota</br>FH UNDIP 2023
              </p>
            </div>
        </div>
    </div>
    <div class="anggota-4-1">
      <div class="card-coba">
            <div class="imgbox">
              <img class="img-coba"
                src="/img/prawatya-kuning.png"
              />
            </div>
      
            <div class="content1">
              <h2>Prawatya Lintang Mahisi</h2>
              <p class="deskripsi">
                Staff Ahli</br>FH UNDIP 2023
              </p>
            </div>
        </div>
        <div class="card-coba">
            <div class="imgbox">
              <img class="img-coba"
                src="/img/abel-kuning.png"
              />
            </div>
      
            <div class="content1">
              <h2>Abel Vincent Sibagariang</h2>
              <p class="deskripsi">
                Staff Ahli</br>FH UNDIP 2023
              </p>
            </div>
        </div>
    </div>
    <div class="anggota-4-1">
      <div class="card-coba">
            <div class="imgbox">
              <img class="img-coba"
                src="/img/fahreza-kuning.png"
              />
            </div>
      
            <div class="content1">
              <h2>Fahreza Dwi Sakti</h2>
              <p class="deskripsi">
                Staff Ahli</br>FH UNDIP 2022
              </p>
            </div>
        </div>
        <div class="card-coba">
            <div class="imgbox">
              <img class="img-coba"
                src="/img/adinda-kuning.png"
              />
            </div>
      
            <div class="content1">
              <h2>Adinda Yustisia Damanik</h2>
              <p class="deskripsi">
                Staff Ahli</br>FH UNDIP 2023
              </p>
            </div>
        </div>
    </div>
    <div class="anggota-4-1">
      <div class="card-coba">
            <div class="imgbox">
              <img class="img-coba"
                src="/img/axel-kuning.png"
              />
            </div>
      
            <div class="content1">
              <h2>Axel Aurellio Timothy Nalle</h2>
              <p class="deskripsi">
                Staff Ahli</br>FH UNDIP 2023
              </p>
            </div>
        </div>
        <div class="card-coba">
            <div class="imgbox">
              <img class="img-coba"
                src="/img/hilda-kuning.png"
              />
            </div>
      
            <div class="content1">
              <h2>Hilda Rahmah Ardita</h2>
              <p class="deskripsi">
                Staff Ahli</br>FH UNDIP 2023
              </p>
            </div>
        </div>
    </div>
    <div class="anggota-4-2">
      <div class="card-coba">
              <div class="imgbox">
                <img class="img-coba"
                  src="/img/risvan-kuning.png"
                />
              </div>
        
              <div class="content1">
                 <h2>Risvan Tirmizi Rahim</h2>
                <p class="deskripsi">
                  Staff Ahli</br>FH UNDIP 2023
                </p>
              </div>
          </div>
    </div>
  </section>

  <script src="js-komisi.js"></script>
@endsection