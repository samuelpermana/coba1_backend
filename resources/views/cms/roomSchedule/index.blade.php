<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Schedules</title>
</head>
<body>
    <h1>Room Schedules</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.room-schedules.create') }}">Add New Schedule</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Room</th>
            <th>Date</th>
            <th>Time</th>
            <th>Booked By</th>
            <th>Actions</th>
        </tr>
        @foreach ($roomSchedules as $schedule)
        <tr>
            <td>{{ $schedule->id }}</td>
            <td>{{ $schedule->room->name }}</td>
            <td>{{ $schedule->date }}</td>
            <td>{{ $schedule->time }}</td>
            <td>{{ $schedule->booked_by }}</td>
            <td>
                <a href="{{ route('admin.room-schedules.show', $schedule->id) }}">View</a> |
                <a href="{{ route('admin.room-schedules.edit', $schedule->id) }}">Edit</a> |
                <form action="{{ route('admin.room-schedules.destroy', $schedule->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
