@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <body>
    <h1>Create New Room</h1>

    @if ($errors->any())
      <div style="color: red;">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route("admin.rooms.store") }}" method="POST">
      @csrf
      <label for="name">Name:</label><br>
      <input id="name" name="name" type="text"><br><br>
      <button type="submit">Create</button>
    </form>
  </body>

  {{-- Content ends here --}}
@endsection
