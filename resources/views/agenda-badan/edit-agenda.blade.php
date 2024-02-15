@extends('agenda-badan.layouts.layout')

@section('content')
<link href="{{ asset("styleagenda.css") }}" rel="stylesheet">
    <section class="container7">
        <h2 class="header">Edit Agenda Kerja</h2>
        <form action="{{ route( auth()->user()->role->role_slug .'.agenda.update', $agenda->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Agenda:</label>
                <input type="text" name="nama" class="form-control input-form" id="nama" value="{{ $agenda->nama }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <<input class="form-check-input" type="checkbox" value="1" name="status" id="status">
            </div>
            <div class="form-group">
                <label for="file">Dokumen:</label>
                <input type="file" name="file" class="form-control-file input-form" id="file">
                <p>File saat ini: <a href="{{ Storage::url($agenda->file) }}">Cek file</a></p>
            </div>
            <div class="form-group">
                <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan:</label>
                <input type="date" name="tanggal_pelaksanaan" class="form-control input-form" id="tanggal_pelaksanaan" value="{{ $agenda->tanggal_pelaksanaan }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </section>
@endsection
