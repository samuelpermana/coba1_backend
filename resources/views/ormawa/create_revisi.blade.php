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
                <input type="text" class="form-control-revisijudul" id="judul" name="judul" value="{{ $proposal->judul }}" required>
            </div>

            <div class="form-group-revisi">
                <label for="deskripsi">Deskripsi Baru:</label>
                <textarea class="form-control-revisi" id="deskripsi" name="deskripsi" rows="3" required>{{ $proposal->deskripsi }}</textarea>
            </div>
            
            <div class="form-group-revisi">
                <label for="file_proposal">Upload File Revisi (Format Doc/Docx):</label>
                <input type="file" class="form-control-file-revisi" id="file_proposal" name="file_proposal" accept=".doc, .docx" required>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Revisi</button>
        </form>
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
