<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AktivitasSenat List</title>
    <!-- Add your stylesheets and other head elements here -->
</head>
<body>
    <h2>AktivitasSenat List</h2>

    <a href="{{ route('admin.aktivitasSenat.create') }}" class="btn btn-primary">Create AktivitasSenat</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Isi Teks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aktivitasSenats as $aktivitasSenat)
                <tr>
                    <td>{{ $aktivitasSenat->id }}</td>
                    <td>{{ $aktivitasSenat->judul }}</td>
                    <td>{{ $aktivitasSenat->isi_teks }}</td>
                    <td>
                        <a href="{{ route('admin.aktivitasSenat.show', ['id' => $aktivitasSenat->id]) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('admin.aktivitasSenat.edit', ['id' => $aktivitasSenat->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.aktivitasSenat.destroy', ['id' => $aktivitasSenat->id]) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add your additional HTML content here -->

    <!-- Add your scripts and other body elements here -->
</body>
</html>
