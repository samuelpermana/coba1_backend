@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <body>
    <h1>Edit Room</h1>

    @if ($errors->any())
      <div style="color: red;">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route("admin.rooms.update", $room->id) }}" method="POST">
      @csrf
      @method("PUT")
      <label for="name">Name:</label><br>
      <input id="name" name="name" type="text" value="{{ $room->name }}"><br><br>
      <button type="submit">Update</button>
    </form>
  </body>

  {{-- Content ends here --}}
@endsection
