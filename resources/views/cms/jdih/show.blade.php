<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show JDIH Record</title>
    <!-- Include your styles and scripts as needed -->
</head>
<body>
    <h1>Show JDIH Record</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <div>
        <strong>Tahun:</strong> {{ $jdihRecord->tahun }} <br>
        <strong>Jenis Peraturan:</strong> {{ $jdihRecord->jenis_peraturan }} <br>
        <!-- Display other fields here based on your JDIH model -->
    </div>

    <a href="{{ route('admin.jdih.index') }}">Back to JDIH Records</a>

    <!-- Include your additional content, styles, and scripts as needed -->
</body>
</html>
