@extends('komisi.agenda-komisi.layouts.layout')

@section('content')
<link href="{{ asset("styleagenda.css") }}" rel="stylesheet">
    <section class="container">
        <h2 class="header">Agenda Kerja</h2>
        <p class="sub-header">Transparansi Agenda Kerja Komisi </p>
        <a href="{{ route(auth()->user()->role->role_slug . '.agenda.create') }}"><button type="button" class="trans">Buat Agenda Kerja</button></a>
    <main class="table" id="customers_table">
        <section class="table__header">
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="{{ asset("/img/search.png") }}"  alt="">
            </div>
            
        </section>
        
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> No <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nama Agenda <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tanggal Pelaksanaan <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Deskripsi <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Dokumen <span class="icon-arrow">&UpArrow;</span></th>
                        <th> link <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($agendas as $agenda)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $agenda->nama }}</td>
                        <td>{{ $agenda->tanggal_pelaksanaan }}</td>
                        <td>{{ $agenda->status }}</td>
                        <td>{{ $agenda->deskripsi }}</td> <!-- Tambahkan kolom deskripsi di sini -->
                        <td>
                            @if($agenda->file)
                                <a href="{{ Storage::url($agenda->file) }}" target="_blank">Download</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($agenda->link)
                                <a href="{{ $agenda->link }}" target="_blank">Link</a>
                            @else
                                -
                            @endif
                        </td>

                        <td>
                        <a href="{{ route(auth()->user()->role->role_slug . '.agenda.edit', $agenda->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route(auth()->user()->role->role_slug . '.agenda.destroy', $agenda->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </main>
    <script src={{asset("script5.js")}}></script>

    @endsection
