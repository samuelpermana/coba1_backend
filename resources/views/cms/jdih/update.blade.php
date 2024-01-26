<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update JDIH Record</title>
    <!-- Include your styles and scripts as needed -->
</head>

<body>
    <h1>Update JDIH Record</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.jdih.update', ['id' => $jdihRecord->id]) }}" method="post">
        @csrf
        <label for="tahun">Tahun:</label>
        <input type="text" id="tahun" name="tahun" value="{{ $jdihRecord->tahun }}" required><br>

        <label for="jenis_peraturan">Jenis Peraturan:</label>
        <input type="text" id="jenis_peraturan" name="jenis_peraturan" value="{{ $jdihRecord->jenis_peraturan }}" required><br>

        <!-- Add fields for other JDIH attributes -->

        <button type="submit">Update JDIH Record</button>
    </form>

    <a href="{{ route('admin.jdih.index') }}">Back to JDIH Records</a>

    <!-- Include your additional content, styles, and scripts as needed -->
</body>

</html>
