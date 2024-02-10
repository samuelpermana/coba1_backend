<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="styletransparansi.css">
    <title>SENAT FH UNDIP</title>
</head>

<body>

    <nav>
        <div class="nav-logo">
          <a href="{{ url('/') }}">
            <img src="/img/coba1.png" alt="Logo">
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
                        <a href="{{ route('jdih.jenis', ['id' => 2]) }}">Standart Operating Procedure</a>
                        <a href="{{ route('jdih.jenis', ['id' => 3]) }}">Peraturan Senat Mahasiswa</a>
                        <a href="{{ route('jdih.jenis', ['id' => 4]) }}">Keputusan</a>
                        <a href="{{ route('jdih.jenis', ['id' => 5]) }}">Rancangan Peraturan</a>
                    </div>
                </div>
            </li>
            <li id="link6" class="link"><a href="{{ url('/peminjamanruangan') }}">Peminjaman Ruangan</a></li>
            <li id="link4" class="link"><a href="{{ url('/transparansisurat3') }}">Transparansi surat</a></li>
</ul>
  
        <a href="login"><button class="btn" type="button">Ajukan Surat</button></a>
      </nav>
    <section class="container">
        <h2 class="header">TRANSPARANSI SURAT</h2>
        <p class="sub-header">Berisikan tentang data Surat yang sudah diajukan kepada senat </p>
        <a href="ajukansurat"><button type="button" class="trans">Ajukan Surat</button></a>
    <main class="table" id="customers_table">
        <section class="table__header">
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="img/search.png" alt="">
            </div>
            
        </section>
        
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Ormawa <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Ruangan <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tanggal <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tracking Surat <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Surat <span class="icon-arrow">&UpArrow;</span></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 1 </td>
                        <td>BASKET</td>
                        <td> A.305 </td>
                        <td> 17 Dec, 2024 </td>
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
                    
                </tbody>
            </table>
        </section>
    </main>
    <script src="js-peminjamanruangan.js"></script>


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


    <script src="script7.js"></script>
</body>

</html>