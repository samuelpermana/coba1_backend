@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}


  <link href="{{ URL::asset("cms/rooms/styleindex.css") }}" rel="stylesheet">
  

  <body>
    <h1>Rooms List</h1>

    @if (session("success"))
      <div style="color: green;">{{ session("success") }}</div>
    @endif

    <button class="btn"><a href="{{ route("admin.rooms.create") }}">Create New Room</a></button>

    <ul>
      @foreach ($rooms as $room)
          <li class="list">
            <table>
              <tr>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <td><span class="list-room">{{ $room->name }} </span></td>
                <td><button><a href="{{ route("admin.rooms.edit", $room->id) }}">Edit</a></button> |
                <form style="display: inline-block;" action="{{ route("admin.rooms.destroy", $room->id) }}" method="POST">
                  @csrf
                  @method("DELETE")
                  <button type="submit" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                </form></td>
              </tr>
            </table>
          </li>
      </table>
      @endforeach
    </ul>
  </body>

  {{-- Content ends here --}}
@endsection
