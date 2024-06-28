@extends("cms.layouts.layout")

@section("content")
  {{-- Content goes here --}}
  
  <link href="{{ URL::asset("cms/roomSchedule/styleindex.css") }}" rel="stylesheet">

  <h1>Room Schedules</h1>

  @if (session("success"))
    <div style="color: green;">{{ session("success") }}</div>
  @endif

  <button class="btn"><a href="{{ route("admin.room-schedules.create") }}">Add New Schedule</a></button>

  <table class="item" border="1">
    <thead>
      <tr>
        {{-- <th>ID</th> --}}
        <th>Room</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Booked By</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr></tr>
      @foreach ($roomSchedules as $schedule)
        <tr>
          {{-- <td>{{ $schedule->id }}</td> --}}
          <td>{{ $schedule->room->name }}</td>
          <td>{{ $schedule->date }}</td>
          <td>{{ $schedule->start_time }}</td>
          <td>{{ $schedule->end_time }}</td>
          <td>{{ $schedule->booked_by }}</td>
          <td>
            <a href="{{ route("admin.room-schedules.edit", $schedule->id) }}">Edit</a> |
            <form action="{{ route("admin.room-schedules.destroy", $schedule->id) }}" method="POST">
              @csrf
              @method("DELETE")
              <button class="delete-btn" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <script src="{{ URL::asset("js-rs-index.js") }}"></script>

  {{-- Content ends here --}}
@endsection
