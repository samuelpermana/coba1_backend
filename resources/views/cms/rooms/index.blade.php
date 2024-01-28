<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms List</title>
</head>
<body>
    <h1>Rooms List</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.rooms.create') }}">Create New Room</a>

    <ul>
        @foreach($rooms as $room)
            <li>
                {{ $room->name }} - 
                <a href="{{ route('admin.rooms.edit', $room->id) }}">Edit</a> | 
                <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
