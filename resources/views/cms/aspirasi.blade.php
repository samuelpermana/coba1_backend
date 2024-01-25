<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CMS - Bank Aspirasi</title>
</head>

<body>
    <h1>Admin CMS - Bank Aspirasi</h1>

    <h2>Data Aspirasi</h2>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Angkatan</th>
                <th>ID Line</th>
                <th>Message</th>
                <th>Status</th>
                <th>Tipe ID</th>
                <th>Answer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aspirasis as $aspirasi)
            <tr>
                <td>{{ $aspirasi->id }}</td>
                <td>{{ $aspirasi->name }}</td>
                <td>{{ $aspirasi->email }}</td>
                <td>{{ $aspirasi->angkatan }}</td>
                <td>{{ $aspirasi->id_line }}</td>
                <td>{{ $aspirasi->message }}</td>
                <td>{{ $aspirasi->is_actived ? 'Active' : 'Inactive' }}</td>
                <td>{{ $aspirasi->tipe_aspirasi_id }}</td>
                <td>{{ $aspirasi->answer }}</td>
                <td>
                    <form action="{{ route('admin.update', $aspirasi->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label>Status: </label>
                        <select name="is_actived">
                            <option value="1" {{ $aspirasi->is_actived ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$aspirasi->is_actived ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <br>

                        <label>Tipe ID: </label>
                        <select name="tipe_aspirasi_id">
                            <option value="1" {{ $aspirasi->tipe_aspirasi_id == 1 ? 'selected' : '' }}>Sarana Prasarana</option>
                            <option value="2" {{ $aspirasi->tipe_aspirasi_id == 2 ? 'selected' : '' }}>Birokrasi</option>
                            <option value="3" {{ $aspirasi->tipe_aspirasi_id == 3 ? 'selected' : '' }}>Akademik</option>
                        </select>
                        <br>

                        <label>Answer: </label>
                        <textarea name="answer">{{ $aspirasi->answer }}</textarea>
                        <br>

                        <button type="submit">Update</button>
                    </form>

                    <form action="{{ route('admin.delete', $aspirasi->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
