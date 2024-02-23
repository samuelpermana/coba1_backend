@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}
  <link href="{{ URL::asset("cms/roomSchedule/styleedit.css") }}" rel="stylesheet">

  <body>
    <h1>Edit Room Schedule</h1>

    @if ($errors->any())
      <div style="color: red;">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route("admin.room-schedules.update", $roomSchedule->id) }}" method="POST">
      @csrf
      @method("PUT")

      <label for="room_id">Room:</label><br>
      <select id="room_id" name="room_id">
        @foreach ($rooms as $room)
          <option value="{{ $room->id }}" {{ $room->id == $roomSchedule->room_id ? "selected" : "" }}>{{ $room->name }}</option>
        @endforeach
      </select><br><br>

      <label for="date">Date:</label><br>
      <input id="date" name="date" type="date" value="{{ $roomSchedule->date }}"><br><br>

      <label for="start_time">Time:</label><br>
      <input id="start_time" name="start_time" type="time" value="{{ $roomSchedule->start_time }}"><br><br>
      
      <label for="end_time">Time:</label><br>
      <input id="end_time" name="end_time" type="time" value="{{ $roomSchedule->end_time }}"><br><br>
      
      <label for="booked_by">Booked By:</label><br>
      <input id="booked_by" name="booked_by" type="text" value="{{ $roomSchedule->booked_by }}"><br><br>

      <button type="submit">Submit</button>
    </form>
  </body>
  {{-- Content ends here --}}
@endsection
