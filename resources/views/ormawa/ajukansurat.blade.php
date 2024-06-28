@extends("ormawa.layouts.layout")
@section("content")
  <link href="{{ asset("styleajukansurat.css") }}" rel="stylesheet">
  

  <div class="container-AJ">
    <h1 class="form-title">Ajukan Surat</h1>
    <form method="POST" action="{{ route('ormawa.pengajuan_proposal') }}" enctype="multipart/form-data">
     @csrf
      <div class="main-user-info">
        <div class="user-input-box">
          <label for="judul">Judul Proposal</label>
          <input id="fullName" name="judul" type="text" placeholder="Judul Proposal" required/>
        </div>
        <div class="user-input-box">
          <label for="deskripsi">Deskripsi</label>
          <input id="username" name="deskripsi" type="text" placeholder="Deskripsi" required/>
        </div>

      </div>
      <div class="gender-details-box">
        <span class="gender-title" style="color: #18181b">File</span>
        <div class="mb-3">
        <label for="file_proposal"class="form-label">File Proposal (Format Doc/Docx)</label>
          <input class="form-control" id="formFileMultiple" type="file" accept=".doc, .docx" class="form-control-file" name="file_proposal" required>
        </div>
      </div>
      <div class="form-submit-btn">
        <input type="submit" value="Submit">
      </div>
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
