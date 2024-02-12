@extends("ormawa.layouts.layout")
@section("content")
<link href="{{ asset("styletransparansi.css") }}" rel="stylesheet">
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

    @endsection