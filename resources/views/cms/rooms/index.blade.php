@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}

  <link href="{{ URL::asset("cms/rooms/styleindex.css") }}" rel="stylesheet">

  <body>
    <h1>Daftar Ruangan Fakultas Hukum Undip</h1>

    @if (session("success"))
      <div style="color: green;">{{ session("success") }}</div>
    @endif

    <button class="btn"><a href="{{ route("admin.rooms.create") }}">Tambahkan Data Ruangan Baru</a></button>

    <!-- Input for search -->
    
    <input type="text" id="searchInput" placeholder="Cari Nama Ruangan..." />
    <ul id="roomList">
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
                </form>
              </td>
            </tr>
          </table>
        </li>
        </table>
      @endforeach
    </ul>
  </body>

  <script>
    // Function to filter room list based on search input
    function filterRoomList() {
      var input, filter, ul, li, span, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("roomList");
      li = ul.getElementsByTagName("li");

      for (i = 0; i < li.length; i++) {
        span = li[i].getElementsByClassName("list-room")[0];
        txtValue = span.textContent || span.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }

    // Add event listener to trigger filtering when input changes
    document.getElementById("searchInput").addEventListener("input", filterRoomList);
  </script>

  {{-- Content ends here --}}
@endsection
