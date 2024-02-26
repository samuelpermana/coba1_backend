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
          <input id="fullName" name="judul" type="text" placeholder="Judul Proposal" />
        </div>
        <div class="user-input-box">
          <label for="deskripsi">Deskripsi</label>
          <input id="username" name="deskripsi" type="text" placeholder="Deskripsi" />
        </div>

      </div>
      <div class="gender-details-box">
        <span class="gender-title" style="color: #18181b">File</span>
        <div class="mb-3">
        <label for="file_proposal"class="form-label">File Proposal</label>
          <input class="form-control" id="formFileMultiple" type="file" class="form-control-file" name="file_proposal" required>
        </div>
      </div>
      <div class="form-submit-btn">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
@endsection
