<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="styletransparansi.css">
=======
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="stylepeminjamanruangan.css" rel="stylesheet">
>>>>>>> 981d35df0dee56e8ebe93c2bf51a409e61dd5be1
    <title>SENAT FH UNDIP</title>
  </head>

  <body>

    <<nav>
      <div class="nav-logo">
        <a href="index">
          <img src="/img/coba1.png" alt="Logo">
        </a>
      </div>

<<<<<<< HEAD
        <ul class="nav-links">
            <li class="link"><a href="index.html">Home</a></li>
            <li id="link1" class="link"><a href="kotakaspirasi.html">Kotak Aspirasi</a></li>
            <li id="link2" class="link"><a href="faq.html">FAQ</a></li>
            <li id="link3" class="link"><a href="bankaspirasi.html">Bank Aspirasi</a></li>
            <li id="link4" class="link"><a href="selayangpandang.html">Selayang Pandang</a></li>
            <li id="link5" class="link"><a href="jdih.html">JDIH</a></li>
            <li id="link6" class="link"><a href="peminjamanruangan.html">Peminjaman Ruangan</a></li>
            <li id="link6" class="link"><a href="transparansi.html">Transparansi Surat</a></li>
        </ul>
        <button class="btn">Ajukan Surat</button>
=======
      <ul class="nav-links">
        <li class="link"><a href="index">Home</a></li>
        <li class="link" id="link1"><a href="kotakaspirasi">Kotak Aspirasi</a></li>
        <li class="link" id="link2"><a href="faq">FAQ</a></li>
        <li class="link" id="link3"><a href="bankaspirasi">Bank Aspirasi</a></li>
        <li class="link" id="link4"><a href="selayangpandang">Selayang Pandang</a></li>
        <li class="link" id="link4"><a href="jdih">JDIH</a></li>
        <li class="link" id="link4"><a href="peminjamanruangan">Peminjaman Ruangan</a></li>
        <li class="link" id="link4"><a href="transparansisurat3">Transparansi surat</a></li>
      </ul>

      <a href="login"><button class="btn" type="button">Ajukan Surat</button></a>
>>>>>>> 981d35df0dee56e8ebe93c2bf51a409e61dd5be1
    </nav>

    <section class="container">
<<<<<<< HEAD
        <h2 class="header">TRANSPARANSI SURAT</h2>
        <p class="sub-header">Berisikan tentang data Surat yang sudah diajukan kepada senat </p>
    
    <main class="table" id="customers_table">
=======
      <h2 class="header">PEMINJAMAN RUANGAN</h2>
      <p class="sub-header">Berisikan tentang data ruangan yang meminjam tempat di FH</p>

      <main class="table" id="customers_table">
>>>>>>> 981d35df0dee56e8ebe93c2bf51a409e61dd5be1
        <section class="table__header">
          <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="img/search.png" alt="">
          </div>
          <div class="export__file">
            <label class="export__file-btn" for="export-file" title="Export File"></label>
            <input id="export-file" type="checkbox">
            <div class="export__file-options">
              <label>Export As &nbsp; &#10140;</label>
              <label id="toPDF" for="export-file">PDF <img src="img/pdf.png" alt=""></label>
              <label id="toEXCEL" for="export-file">EXCEL <img src="img/excel.png" alt=""></label>
            </div>
          </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Digunakan Oleh <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Ruangan <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tanggal <span class="icon-arrow">&UpArrow;</span></th>
<<<<<<< HEAD
                        <th> Tracking Surat <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Surat <span class="icon-arrow">&UpArrow;</span></th>
=======
                        <th> Jam <span class="icon-arrow">&UpArrow;</span></th>
>>>>>>> 981d35df0dee56e8ebe93c2bf51a409e61dd5be1
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($roomSchedule as $index => $schedule)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $schedule->booked_by }}</td>
                        <td>{{ $schedule->room->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d M, Y') }}</td>
                        <td>
<<<<<<< HEAD
                            <section class="step-wizard">
                                <ul class="step-wizard-list">
                                    <li class="step-wizard-item">
                                        <span class="progress-count">1</span>
                                        <span class="progress-label">Pengajuan</span>
                                    </li>
                                    <li class="step-wizard-item current-item">
                                        <span class="progress-count">2</span>
                                        <span class="progress-label">Admin</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">3</span>
                                        <span class="progress-label">komisi 3</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">4</span>
                                        <span class="progress-label">wakil senat</span>
                                    </li>
                                </ul>
                            </section>
                        </td>

                        <td><span class="blue"><img class="star-img" src="/img/filetransparan.svg" alt="" /></span></td>
                        
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td>BASKET</td>
                        <td> A.305 </td>
                        <td> 27 Aug, 2023 </td>
                        

                        <td>
                            <section class="step-wizard">
                                <ul class="step-wizard-list">
                                    <li class="step-wizard-item">
                                        <span class="progress-count">1</span>
                                        <span class="progress-label">Pengajuan</span>
                                    </li>
                                    <li class="step-wizard-item current-item">
                                        <span class="progress-count">2</span>
                                        <span class="progress-label">Admin</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">3</span>
                                        <span class="progress-label">komisi 3</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">4</span>
                                        <span class="progress-label">wakil senat</span>
                                    </li>
                                </ul>
                            </section>
                        </td>

                        <td><span class="blue"><img class="star-img" src="/img/filetransparan.svg" alt="" /></span></td>

                        
                    </tr>
                    <tr>
                        <td> 3</td>
                        <td>BASKET</td>
                        <td> A.305 </td>
                        <td> 14 Mar, 2023 </td>
                        

                        <td>
                            <section class="step-wizard">
                                <ul class="step-wizard-list">
                                    <li class="step-wizard-item">
                                        <span class="progress-count">1</span>
                                        <span class="progress-label">Pengajuan</span>
                                    </li>
                                    <li class="step-wizard-item current-item">
                                        <span class="progress-count">2</span>
                                        <span class="progress-label">Admin</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">3</span>
                                        <span class="progress-label">komisi 3</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">4</span>
                                        <span class="progress-label">wakil senat</span>
                                    </li>
                                </ul>
                            </section>
                        </td>

                        <td><span class="blue"><img class="star-img" src="/img/filetransparan.svg" alt="" /></span></td>
                        
                    </tr>
                    <tr>
                        <td> 4</td>
                        <td>BASKET</td>
                        <td> A.305 </td>
                        <td> 25 May, 2023 </td>
                        

                        <td>
                            <section class="step-wizard">
                                <ul class="step-wizard-list">
                                    <li class="step-wizard-item">
                                        <span class="progress-count">1</span>
                                        <span class="progress-label">Pengajuan</span>
                                    </li>
                                    <li class="step-wizard-item current-item">
                                        <span class="progress-count">2</span>
                                        <span class="progress-label">Admin</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">3</span>
                                        <span class="progress-label">komisi 3</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">4</span>
                                        <span class="progress-label">wakil senat</span>
                                    </li>
                                </ul>
                            </section>
                        </td>

                        <td><span class="blue"><img class="star-img" src="/img/filetransparan.svg" alt="" /></span></td>
                        
                    </tr>
                    <tr>
                        <td> 5</td>
                        <td>BASKET</td>
                        <td> A.305 </td>
                        <td> 23 Apr, 2023 </td>
                       

                        <td>
                            <section class="step-wizard">
                                <ul class="step-wizard-list">
                                    <li class="step-wizard-item">
                                        <span class="progress-count">1</span>
                                        <span class="progress-label">Pengajuan</span>
                                    </li>
                                    <li class="step-wizard-item current-item">
                                        <span class="progress-count">2</span>
                                        <span class="progress-label">Admin</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">3</span>
                                        <span class="progress-label">komisi 3</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">4</span>
                                        <span class="progress-label">wakil senat</span>
                                    </li>
                                </ul>
                            </section>
                        </td>

                        <td><span class="blue"><img class="star-img" src="/img/filetransparan.svg" alt="" /></span></td>
                        
                    </tr>
                    
=======
                            <p class="status delivered">{{ $schedule->time }}</p>
                        </td>
                    </tr>
                    @endforeach
>>>>>>> 981d35df0dee56e8ebe93c2bf51a409e61dd5be1
                </tbody>
            </table>

        </section>
      </main>


      <footer class="container">
        <span class="blur"></span>
        <span class="blur"></span>
        <div class="column">
          <div class="logo">
            <img src="/img/coba1.png">
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

      <div class="copyright">
        Copyright © 2023 SENAT FH UNDIP. All Rights Reserved.
      </div>

      <script src="js-peminjamanruangan.js"></script>
  </body>

<<<<<<< HEAD
    <script src="script7.js"></script>
</body>

</html>
=======
</html>
>>>>>>> 981d35df0dee56e8ebe93c2bf51a409e61dd5be1
