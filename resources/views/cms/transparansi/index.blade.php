@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <link href="{{ URL::asset("cms/transparansi/styleindex.css") }}" rel="stylesheet">

  <h1>Persetujuan Proposal</h1>

  @if (session("success"))
    <div style="color: green;">{{ session("success") }}</div>
  @endif

  <table class="item" border="1">
    <thead>
      <tr>
        {{-- <th>ID</th> --}}
        <th>Ormawa</th>
        <th>Tanggal Diajukan</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Dokumen</th>
        <th>Progress Tahap Persetujuan </th>
        <th>Status Persetujuan </th>
        <th>File Final SM FH </th>
        <th>File Final </th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr></tr>
      @foreach ($proposalData as $proposal)
        <tr>
          <td>{{ $proposal["nama_pengaju"] }}</td>
          <td>{{ $proposal["created_at"] }}</td>
          <td>{{ $proposal["judul"] }}</td>
          <td>{{ $proposal["deskripsi"] }}</td>
          <td><a href="{{ Storage::url($proposal["file_proposal"]) }}"target="_blank">
              <span class="blue"><img class="star-img" src="/img/filetransparan.svg" alt="" /></span>
            </a></td>

          <td>{{ $proposal["status"] }}</td>
          <td>{{ $proposal["status_persetujuan"] }}</td>
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
                                    belum diupload
                                @endif
                            @else
                                Belum disetujui
                            @endif
            </td>

          <td>
    @if ($proposal["status_persetujuan"] != 'rejected')
        <form action="{{ route("admin.proposal.update-komisi", $proposal["id"]) }}" method="POST">
            @csrf
            @method("PUT")
            <select class="select" name="komisi_checked_by" {{ $proposal["komisi_checked_by"] ? 'disabled' : '' }}>
                @if ($proposal["komisi_checked_by"] == null)
                    <option value="" disabled selected>pilih</option>
                @endif
                @foreach ($komisiUsers as $user)
                    <option value="{{ $user->id }}" {{ $proposal["komisi_checked_by"] == $user->id ? "selected" : "" }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @if (!$proposal["komisi_checked_by"])
                <button class="btn" type="submit">Submit</button>
            @endif
        </form>
    @endif

    @if ($proposal["status"] == 'admin' && $proposal["status_persetujuan"] == 'rejected')
        Sudah di reject
    @else
        @if ($proposal["status_persetujuan"] != 'rejected' && !$proposal["komisi_checked_by"])
            <form action="{{ route("admin.proposal.admin-reject", $proposal["id"]) }}" method="POST">
                @csrf
                @method("PUT")
                <button class="btn" type="submit">Reject</button>
            </form>
        @endif
    @endif
</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <script src="{{ URL::asset("js-rs-index.js") }}"></script>

  {{-- Content ends here --}}
@endsection
