@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <link href="{{ URL::asset("cms/aktivitasSenat/styleindex.css") }}" rel="stylesheet">

  <body>
    <h1>Aktivitas Senat List</h1>

    <a class="btn btn-primary" href="{{ route("admin.aktivitasSenat.create") }}">Create Aktivitas Senat</a>

    <table class="table item" border="1">

      <thead>
        <tr>
          <th>ID</th>
          <th>Judul</th>
          <th>Isi Teks</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($aktivitasSenats as $aktivitasSenat)
          <tr>
            <td>{{ $aktivitasSenat->id }}</td>
            <td>{{ $aktivitasSenat->judul }}</td>
            <td>{{ $aktivitasSenat->isi_teks }}</td>
            <td>

              <a class="btn-info" href="{{ route("admin.aktivitasSenat.show", ["id" => $aktivitasSenat->id]) }}">Show</a>
              <a class="btn-warning" href="{{ route("admin.aktivitasSenat.edit", ["id" => $aktivitasSenat->id]) }}">Edit</a>
              <form style="display:inline" action="{{ route("admin.aktivitasSenat.destroy", ["id" => $aktivitasSenat->id]) }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn-danger" type="submit">Delete</button>

              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Add your additional HTML content here -->

    <!-- Add your scripts and other body elements here -->
  </body>

  {{-- Content ends here --}}
@endsection
