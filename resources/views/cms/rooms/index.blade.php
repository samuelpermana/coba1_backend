@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <body>
    <h1>Rooms List</h1>

    @if (session("success"))
      <div style="color: green;">{{ session("success") }}</div>
    @endif

    <a href="{{ route("admin.rooms.create") }}">Create New Room</a>

    <ul>
      @foreach ($rooms as $room)
        <li>
          {{ $room->name }} -
          <a href="{{ route("admin.rooms.edit", $room->id) }}">Edit</a> |
          <form style="display: inline-block;" action="{{ route("admin.rooms.destroy", $room->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
          </form>
        </li>
      @endforeach
    </ul>
  </body>

  {{-- Content ends here --}}
@endsection
