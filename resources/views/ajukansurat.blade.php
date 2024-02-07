@extends("layouts.layout")
@section("content")
  <link href="styleajukansurat.css" rel="stylesheet">

  <div class="container-AJ">
    <h1 class="form-title">Ajukan Surat</h1>
    <form action="#">
      <div class="main-user-info">
        <div class="user-input-box">
          <label for="fullName">Nama Panjang</label>
          <input id="fullName" name="fullName" type="text" placeholder="Nama" />
        </div>
        <div class="user-input-box">
          <label for="username">Ormawa</label>
          <input id="username" name="username" type="text" placeholder="Ormawa" />
        </div>
        <div class="user-input-box">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" placeholder="Email" />
        </div>
        <div class="user-input-box">
          <label for="phoneNumber">id line</label>
          <input id="phoneNumber" name="phoneNumber" type="text" placeholder="id ine" />
        </div>
        <div class="user-input-box">
          <label for="username">Angkatan</label>
          <input id="username" name="username" type="text" placeholder="Angkatan" />
        </div>
        <div class="user-input-box">
          <label for="username">Alamat</label>
          <input id="username" name="username" type="text" placeholder="Alamat" />
        </div>
      </div>
      <div class="gender-details-box">
        <span class="gender-title">File</span>
        <div class="mb-3">
          <label class="form-label" for="formFileMultiple">Multiple files input example</label>
          <input class="form-control" id="formFileMultiple" type="file" multiple>
        </div>
      </div>
      <div class="form-submit-btn">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
@endsection
