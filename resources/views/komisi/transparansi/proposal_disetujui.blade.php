@extends("komisi.agenda-komisi.layouts.layout")
@section("content")
<link href="{{ asset("styletransparansi.css") }}" rel="stylesheet">
    <section class="container">
        <h2 class="header">Persetujuan Proposal dan LPPK</h2>
        <p class="sub-header">Berisikan tentang data Surat yang sudah diajukan kepada senat </p>
        <a href="{{ route(auth()->user()->role->role_slug . '.proposal.belum-diperiksa') }}"><button type="button" class="trans">Belum diperiksa</button></a>
        <a href="{{ route(auth()->user()->role->role_slug . '.proposal.direvisi') }}"><button type="button" class="trans">Proposal di revisi</button></a>
        <a href="{{ route(auth()->user()->role->role_slug . '.proposal.disetujui') }}"><button type="button" class="trans">Proposal di setujui</button></a>
        <a href="{{ route(auth()->user()->role->role_slug . '.proposal.ditolak') }}"><button type="button" class="trans">Proposal ditolak</button></a>

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
                    <th>Ormawa</th>
                    <th>Tanggal Diajukan</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Dokumen</th>
                    <th>Progress Tahap Persetujuan </th>
                    <th>Status Persetujuan </th>
                    <th>File Final </th>
                    <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
      <tr></tr>
      @foreach ($proposalData as $proposal)
        <tr>
          <td>{{ $proposal['nama_pengaju'] }}</td>
          <td>{{ $proposal['created_at'] }}</td>
          <td>{{ $proposal['judul'] }}</td>
          <td>{{ $proposal['deskripsi'] }}</td>
          <td><a href="{{ Storage::url($proposal['file_proposal']) }}"target="_blank>
                  <span class="blue"><img class="star-img" src="img/filetransparan.svg" alt="" /></span>
              </a></td>
          </td>
          <td>{{ $proposal['status'] }}</td>
          <td>{{ $proposal['status_persetujuan'] }}</td>
          <td>@if ($proposal['status'] == 'sekjen' && $proposal['status_persetujuan'] == 'approved')
                                {{-- Cek apakah file final sudah diunggah --}}
                                @if ($proposal['file_final'])
                                    <a href="{{ Storage::url($proposal['file_final']) }}" target="_blank" class="blue">
                                        <img class="star-img" src="img/filetransparan.svg" alt="" />
                                    </a>
                                @else
                                    belum diupload
                                @endif
                            @else
                                Belum disetujui
                            @endif</td>
          <td>Sudah Disetujui</td>

        </tr>
      @endforeach
    </tbody>
            </table>
        </section>
    </main>
    <script src="js-peminjamanruangan.js"></script>

    @endsection