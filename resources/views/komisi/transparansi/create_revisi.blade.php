@extends('komisi.agenda-komisi.layouts.layout')

@section('content')
    <link href="{{ asset("styleagenda.css") }}" rel="stylesheet">
    <div class="container-revisi">
        <div class="header-revisi">
            <h1>Buat Revisi Proposal</h1>
            <p>Proposal: {{ $proposal->judul }}</p>
        </div>
        
        <form action="{{ route(auth()->user()->role->role_slug . '.revisi.store', $proposal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group-revisi">
                <label for="komentar">Komentar Revisi:</label>
                <textarea class="form-control-revisi" id="komentar" name="komentar" rows="4"></textarea>
            </div>
            <div class="form-group-revisi">
                <label for="file_revisi">File Revisi</label>
                <input type="file" class="form-control-file-revisi" id="file_revisi" accept=".doc, .docx" name="file_revisi">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
