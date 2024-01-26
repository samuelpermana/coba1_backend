<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JDIH Records</title>
    <!-- Include your styles and scripts as needed -->
</head>
<body>
    <h1>JDIH Records</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tahun</th>
                <th>Jenis Peraturan</th>
                <th>Nama Peraturan</th>
                <!-- Include other table headers based on your JDIH model -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jdihRecords as $jdihRecord)
                <tr>
                    <td>{{ $jdihRecord->id }}</td>
                    <td>{{ $jdihRecord->tahun }}</td>
                    <td>{{ $jdihRecord->jenis_peraturan }}</td>
                    <td>{{ $jdihRecord->nama_peraturan }}</td>
                    <!-- Include other table data based on your JDIH model -->
                    <td>
                        <a href="{{ route('admin.jdih.show', ['id' => $jdihRecord->id]) }}">View</a>
                        <a href="{{ route('admin.jdih.update', ['id' => $jdihRecord->id]) }}">Edit</a>
                        <a href="{{ route('admin.jdih.delete', ['id' => $jdihRecord->id]) }}">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No JDIH records found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Include your additional content, styles, and scripts as needed -->
</body>
</html>
