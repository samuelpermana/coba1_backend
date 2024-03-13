@extends("ormawa.layouts.layout")
@section("content")
<link href="{{ asset("styletransparansi.css") }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet"> 

<section class="container">
        <h2 class="header">TRANSPARANSI SURAT</h2>
        <p class="sub-header">Berisikan tentang data Surat yang sudah diajukan kepada senat </p>
        <a href="ajukansurat"><button type="button" class="trans">Ajukan Surat</button></a>
    <main class="table" id="customers_table">
        <section class="table__header">
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="/img/search.png" alt="">
            </div>
            
        </section>
        
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Judul Proposal </th>
                        <th> Deskripsi </th>
                        <th> Tanggal </th>
                        <th> Tracking Surat </th>
                        <th> Status </th>
                        <th> Surat </th>
                        <th> Lama Proses</th>
                        <th> File Final SM FH</th>
                        <th> Upload File Final</th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($proposalData as $proposal)
                    <tr>
                        <td> 1 </td>
                        <td>{{ $proposal['judul'] }}</td>
                        <td>{{ $proposal['deskripsi'] }}</td>
                        <td>{{ $proposal['created_at'] }} </td>
                        <td>
                        <section class="step-wizard">
                            <ul class="step-wizard-list">
                                <li class="step-wizard-item @if($proposal['status'] == 'admin') current-item @endif">
                                    <span class="progress-count">1</span>
                                    <span class="progress-label">Admin</span>
                                </li>
                                <li class="step-wizard-item @if($proposal['status'] == 'komisi') current-item @endif">
                                    <span class="progress-count">2</span>
                                    <span class="progress-label">Komisi</span>
                                </li>
                                <li class="step-wizard-item @if($proposal['status'] == 'badan anggaran') current-item @endif">
                                    <span class="progress-count">3</span>
                                    <span class="progress-label">Badan Anggaran</span>
                                </li>
                                <li class="step-wizard-item @if($proposal['status'] == 'sekjen' && $proposal['status_persetujuan'] != 'approved') current-item @endif">
                                    <span class="progress-count">4</span>
                                    <span class="progress-label">SekJen</span>
                                </li>



                            </ul>
                        </section>
                    </td>
                    <td>{{ $proposal['status_persetujuan'] }}
                        @if ($proposal['status_persetujuan'] == 'direvisi')
                            <br>
                            <a href="{{ route('ormawa.proposal.revisi', $proposal['id']) }}" target="_blank">Kirimkan Revisi Proposal</a>
                        @endif
                    </td>

                        <td>
                        <a href="{{ Storage::url($proposal['file_proposal']) }}"target="_blank>
                            <span class="blue"><img class="star-img" src="/img/filetransparan.svg" alt="" /></span>
                        </a>
                        </td>  
                        <td>
                            @if ($proposal['approved_at'])
                               {{ $proposal['lama_proses'] }}
                            @else
                                Belum disetujui
                            @endif
                        </td>
                        <td>
                        @if ($proposal['status'] == 'sekjen' && $proposal['status_persetujuan'] == 'approved')
                                                {{-- Cek apakah file final sudah diunggah --}}
                                                @if ($proposal['file_final_sekjen'])
                                                    <a href="{{ Storage::url($proposal['file_final_sekjen']) }}" target="_blank" class="blue">
                                                        <img class="star-img" src="/img/filetransparan.svg" alt="" />
                                                    </a>
                                                @else
                                                    belum diupload
                                                @endif
                                            @else
                                                Belum disetujui
                                            @endif
                        </td>
                        <td>
                            @if ($proposal['status'] == 'sekjen' && $proposal['status_persetujuan'] == 'approved')
                                {{-- Cek apakah file final sudah diunggah --}}
                                @if ($proposal['file_final'])
                                    <a href="{{ Storage::url($proposal['file_final']) }}" target="_blank" class="blue">
                                        <img class="star-img" src="/img/filetransparan.svg" alt="" />
                                    </a>
                                @else
                                <form class="finalis" action="{{ route('ormawa.upload.file.final', $proposal['id']) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input class="final" type="file" name="file_final" accept=".doc, .docx, application/pdf" required>
                                    <button class="final-upload" type="submit">Upload File Final</button>
                                </form>
                                @endif
                            @else
                                Belum disetujui
                            @endif
                        </td>



                    </tr>

                @endforeach
                    
                </tbody>
            </table>
        </section>
    </main>
    <script src="js-peminjamanruangan.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      @if(session('success'))
        iziToast.success({
          title: 'Success',
          message: '{{ session('success') }}',
          position: 'topRight'
        });
      @endif

      @if(session('error'))
        iziToast.error({
          title: 'Error',
          message: '{{ session('error') }}',
          position: 'topRight'
        });
      @endif
    });
  </script>

    @endsection