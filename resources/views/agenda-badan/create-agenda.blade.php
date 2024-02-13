@extends('agenda-badan.layouts.layout')

@section('content')
    <section class="container">
        <h2 class="header">Buat Agenda Kerja Baru</h2>
        <form action="{{ route( auth()->user()->role->role_slug .'.agenda.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Agenda:</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="status" id="status">
                    <label class="form-check-label" for="status">
                        Aktif
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="file">Dokumen:</label>
                <input type="file" name="file" class="form-control-file" id="file" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan:</label>
                <input type="date" name="tanggal_pelaksanaan" class="form-control" id="tanggal_pelaksanaan" required>
            </div>
            <button type="submit" class="btn btn-primary">Buat Agenda Kerja</button>
        </form>
    </section>
@endsection
