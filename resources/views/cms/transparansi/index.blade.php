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
            <form action="{{ route("admin.proposal.update-komisi", $proposal["id"]) }}" method="POST">
              @csrf
              @method("PUT")
              <select class="select" name="komisi_checked_by">
                @if ($proposal["komisi_checked_by"] == null)
                  <option value="" disabled selected>pilih</option>
                @endif
                @foreach ($komisiUsers as $user)
                  <option value="{{ $user->id }}" {{ $proposal["komisi_checked_by"] == $user->id ? "selected" : "" }}>
                    {{ $user->name }}
                  </option>
                @endforeach
              </select>
              <button class="btn" type="submit">Submit</button>
            </form>
            <form action="{{ route("admin.proposal.admin-reject", $proposal["id"]) }}" method="POST">
              @csrf
              @method("PUT")
              <button class="btn" type="submit">Reject</button>
            </form>
          </td>

        </tr>
      @endforeach
    </tbody>
  </table>
  <script src="{{ URL::asset("js-rs-index.js") }}"></script>

  {{-- Content ends here --}}
@endsection
