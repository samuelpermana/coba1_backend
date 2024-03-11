@extends('pimpinan.layouts.layout')

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
                <input type="file" class="form-control-file-revisi" id="file_revisi" name="file_revisi">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection