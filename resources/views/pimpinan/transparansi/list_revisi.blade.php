@extends('pimpinan.layouts.layout')

@section('content')
<link href="{{ asset("styletransparansi.css") }}" rel="stylesheet">
    <div class="container">
        <div class="header-revisi">
            <h1>Daftar Revisi Proposal</h1>
            <h2>{{ $proposal->judul }}</h2>
        </div>

        <a href="{{ route(auth()->user()->role->role_slug . '.revisi.create', $proposal->id) }}" class="btn-revisi">Buat Revisi</a>

        <section class="table__body">
        <table class="table__body">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Komentar</th>
                    <th>Direvisi Oleh</th>
                    <th>Waktu Revisi</th>
                    <th>File Revisi</th>
                    <th>Judul Lama</th>
                    <th>Deskripsi Lama</th>
                    <th>File Lama</th>
                    <th>Judul Baru</th>
                    <th>Deskripsi Baru</th>
                    <th>File Baru</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($revisiProposals as $index => $revisi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $revisi->komentar }}</td>
                        <td>{{ $revisi->revisedBy->name }}</td>
                        <td>{{ $revisi->created_at->format('d M Y H:i:s') }}</td>
                        <td><a href="{{ Storage::url($revisi['file_revisi']) }}" target="_blank">Download</a></td>
                        @foreach ($riwayatRevisi as $riwayat)
                            @if ($riwayat->revisi_id == $revisi->id)
                                <td>{{ $riwayat->judul_lama }}</td>
                                <td>{{ $riwayat->deskripsi_lama }}</td>
                                <td><a href="{{ Storage::url($riwayat->file_lama) }}" target="_blank">Download</a></td>
                                <td>{{ $riwayat->judul_hasil_revisi ?? '' }}</td>
                                <td>{{ $riwayat->deskripsi_hasil_revisi ?? '' }}</td>
                                <td>
                                    @if ($riwayat->file_hasil_revisi)
                                        <a href="{{ Storage::url($riwayat->file_hasil_revisi) }}" target="_blank">Download</a>
                                    @else
                                        {{-- File baru masih null --}}
                                    @endif
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        </section>
    </div>
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
