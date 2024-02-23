@extends("ormawa.layouts.layout")

@section('content')
<link href="{{ asset("styleagenda.css") }}" rel="stylesheet">
    <div class="container-revisi">
        <div class="header-revisi">
            <h1>List Revisi Proposal</h1>
            <p>Judul Proposal direvisi: {{ $proposal->judul }}</p>
            <p>Deskripsi Proposal direvisi: {{ $proposal->deskripsi }}</p>
        </div>

        <form action="{{ route('ormawa.kirim_revisi', [$proposal->id, $revisiProposal->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group-revisi">
                <label for="judul">Judul Baru:</label>
                <input type="text" class="form-control-revisijudul" id="judul" name="judul" value="{{ $proposal->judul }}">
            </div>

            <div class="form-group-revisi">
                <label for="deskripsi">Deskripsi Baru:</label>
                <textarea class="form-control-revisi" id="deskripsi" name="deskripsi" rows="3">{{ $proposal->deskripsi }}</textarea>
            </div>
            
            <div class="form-group-revisi">
                <label for="file_proposal">Upload File Revisi:</label>
                <input type="file" class="form-control-file-revisi" id="file_proposal" name="file_proposal">
            </div>

            <button type="submit" class="btn btn-primary">Kirim Revisi</button>
        </form>
    </div>
@endsection
