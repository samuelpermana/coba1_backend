<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Room Schedule</title>
</head>
<body>
    <h1>Create Room Schedule</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.room-schedules.store') }}" method="POST">
        @csrf
        <label for="room_id">Room:</label><br>
        <select name="room_id" id="room_id">
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
        </select><br><br>

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date"><br><br>

        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time"><br><br>

        <label for="booked_by">Booked By:</label><br>
        <input type="text" id="booked_by" name="booked_by"><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
