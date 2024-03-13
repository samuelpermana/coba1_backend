@extends("ormawa.layouts.layout")

@section("content")
<link href="{{ asset("styletransparansi.css") }}" rel="stylesheet">
    <div class="container"> 
        <div class="header-revisi">
            <h1>Daftar Revisi Proposal</h1>
            <h2>{{ $proposal->judul }}</h2>
        </div>
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
                        <th>Upload Hasil Revisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($revisiProposals as $index => $revisi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $revisi->komentar }}</td>
                            <td>{{ $revisi->revisedBy->name }}</td>
                            <td>{{ $revisi->created_at->format('d M Y H:i:s') }}</td>
                            <td>
                                @if ($revisi['file_revisi'])
                                <a href="{{ Storage::url($revisi['file_revisi']) }}" target="_blank">Download</a>
                                @else
                                    <p>-</p>
                                @endif       
                            </td>
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
                            <td>
                                @if ($revisi->is_revision_done_by_ormawa == 0)
                                    <a href="{{ route('ormawa.create_revisi', ['proposalId' => $proposal->id, 'revisiId' => $revisi->id]) }}" >Upload Revisi</a>
                                @elseif ($revisi->is_revision_done_by_ormawa == 1)
                                    Revisi berhasil terkirim
                                @endif
                            </td>
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
