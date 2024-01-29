<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit AktivitasSenat</title>
    <!-- Add your stylesheets and other head elements here -->
</head>
<body>
    <h2>Edit AktivitasSenat</h2>

    <form action="{{ route('admin.aktivitasSenat.update', ['id' => $aktivitasSenat->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" value="{{ $aktivitasSenat->judul }}" required>
        </div>

        <div>
            <label for="isi_teks">Isi Teks:</label>
            <textarea id="isi_teks" name="isi_teks" required>{{ $aktivitasSenat->isi_teks }}</textarea>
        </div>

        <div>
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar">
        </div>

        <button type="submit">Update</button>
    </form>

    <!-- Add your additional HTML content here -->

    <!-- Add your scripts and other body elements here -->
</body>
</html>
