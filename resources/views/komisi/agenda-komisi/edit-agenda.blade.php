@extends('komisi.agenda-komisi.layouts.layout')

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
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" required>{{ $agenda->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input class="form-check-input" type="checkbox" value="1" name="status" id="status" {{ $agenda->status == 1 ? 'checked' : '' }}>
            </div>
            <div class="form-group">
                <label for="file">Dokumen:</label>
                @if($agenda->file)
                    <p>File saat ini: <a href="{{ Storage::url($agenda->file) }}" target="_blank">Download</a></p>
                    <input type="checkbox" name="hapus_file" id="hapus_file"> Hapus File
                @else
                    <p>Tidak ada file yang diunggah.</p>
                @endif
                <input type="file" name="file" class="form-control-file input-form" id="file">
            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <textarea name="link" class="form-control" id="link" rows="5">{{ $agenda->link }}</textarea>
            </div>
            <div class="form-group">
                <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan:</label>
                <input type="date" name="tanggal_pelaksanaan" class="form-control input-form" id="tanggal_pelaksanaan" value="{{ $agenda->tanggal_pelaksanaan }}" >
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </section>
@endsection
