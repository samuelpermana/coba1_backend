<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create JDIH Record</title>
    <!-- Include your styles and scripts as needed -->
</head>

<body>
    <h1>Create JDIH Record</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.jdih.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <label for="tahun">Tahun:</label>
        <input type="text" id="tahun" name="tahun" required><br>

        <label for="jenis_peraturan">Jenis Peraturan:</label>
        <input type="text" id="jenis_peraturan" name="jenis_peraturan" required><br>

        <label for="nama_peraturan">Nama Peraturan:</label>
        <input type="text" id="nama_peraturan" name="nama_peraturan" required><br>

        <label for="tanggal_disahkan">Tanggal Disahkan:</label>
        <input type="date" id="tanggal_disahkan" name="tanggal_disahkan" required><br>

        <label for="peraturan">Peraturan:</label>
        <textarea id="peraturan" name="peraturan" required></textarea><br>

        <label for="status_peraturan">Status Peraturan:</label>
        <input type="text" id="status_peraturan" name="status_peraturan" required><br>

        <label for="file_peraturan">File Peraturan:</label>
        <input type="file" name="file_peraturan">

        <label for="file_naskah">File Naskah:</label>
        <input type="file" name="file_naskah">

        <label for="file_inventarisasi">File Inventarisasi:</label>
        <input type="file" name="file_inventarisasi">

        <label for="file_lainnya">File Lainnya:</label>
        <input type="file" name="file_lainnya[]" multiple>

  

        <button type="submit">Create JDIH Record</button>
    </form>

    <a href="{{ route('admin.jdih.index') }}">Back to JDIH Records</a>

    <!-- Include your additional content, styles, and scripts as needed -->
</body>

</html>
