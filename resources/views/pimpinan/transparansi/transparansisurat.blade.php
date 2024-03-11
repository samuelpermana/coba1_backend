@extends('pimpinan.layouts.layout')
@section("content")
<link href="{{ asset("styletransparansi.css") }}" rel="stylesheet">
    <section class="container">
        <h2 class="header">Persetujuan Proposal dan LPPK</h2>
        <p class="sub-header">Berisikan tentang data Surat yang sudah diajukan kepada senat </p>
        <a href="{{ route(auth()->user()->role->role_slug . '.proposal.belum-diperiksa') }}"><button type="button" class="trans">Belum diperiksa</button></a>
        <a href="{{ route(auth()->user()->role->role_slug . '.proposal.direvisi') }}"><button type="button" class="trans">Proposal direvisi</button></a>
        <a href="{{ route(auth()->user()->role->role_slug . '.proposal.disetujui') }}"><button type="button" class="trans">Proposal disetujui</button></a>
        <a href="{{ route(auth()->user()->role->role_slug . '.proposal.ditolak') }}"><button type="button" class="trans">Proposal ditolak</button></a>

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
                    <th>Ormawa</th>
                    <th>Tanggal Diajukan</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Dokumen</th>
                    <th>Progress Tahap Persetujuan </th>
                    <th>Status Persetujuan </th>
                    <th>File Disetujui SM FH </th>
                    <th>File Final</th>
                    <th>File Final Sekjen (doc, docx, pdf)</th>
                    <th>Action</th>
                        
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
                  <span class="blue"><img class="star-img" src="/img/filetransparan.svg" alt="" /></span>
              </a></td>
          </td>
          <td>{{ $proposal['status'] }}</td>
          <td>{{ $proposal['status_persetujuan'] }}</td>
          <td>aa</td>
          <td>@if ($proposal['status'] == 'sekjen' && $proposal['status_persetujuan'] == 'approved')
                                {{-- Cek apakah file final sudah diunggah --}}
                                @if ($proposal['file_final'])
                                    <a href="{{ Storage::url($proposal['file_final']) }}" target="_blank" class="blue">
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
              @if ($proposal['status_persetujuan'] != 'rejected')
              <form action="{{ route(auth()->user()->role->role_slug . '.proposal.komisi-approve', $proposal['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="file_final_sekjen">File Final Sekjen (doc, docx, pdf)</label>
                        <input type="file" class="form-control" id="file_final_sekjen" name="file_final_sekjen" accept=".doc, .docx, application/pdf" required>
                    </div>
                    <button class="btn btn-warning" type="submit">Setujui</button>
                </form>
              
              @else
              sudah ditolak
              @endif
          </td>
          <td>
            @if ($proposal['status_persetujuan'] != 'rejected')
            
            <form action="{{ route( auth()->user()->role->role_slug .'.proposal.komisi-reject', $proposal['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn-warning1-pimpinan" type="submit">Tolak</button>
            </form>
            <a href="{{ route(auth()->user()->role->role_slug . '.proposal.revisi', $proposal['id']) }}" class="btn-warning2 ">Revisi</a>
            @else
            sudah ditolak
            @endif
        </td>


        </tr>
      @endforeach
    </tbody>
            </table>
        </section>
    </main>
    <script src="js-peminjamanruangan.js"></script>

    @endsection