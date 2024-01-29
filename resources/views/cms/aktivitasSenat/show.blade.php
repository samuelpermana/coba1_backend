<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show AktivitasSenat</title>
    <!-- Add your stylesheets and other head elements here -->
</head>
<body>
    <h2>AktivitasSenat Details</h2>

    <div>
        <strong>Judul:</strong> {{ $aktivitasSenat->judul }}
    </div>
    <div>
        <strong>Isi Teks:</strong> {{ $aktivitasSenat->isi_teks }}
    </div>
    <div>
        <strong>Gambar:</strong>
        @if ($aktivitasSenat->gambar)
            <img src="{{ Storage::url($aktivitasSenat->gambar) }}" alt="AktivitasSenat Image">
        @else
            No image available
        @endif
    </div>

    <a href="{{ route('admin.aktivitasSenat.index') }}">Back to List</a>

    <!-- Add your additional HTML content here -->

    <!-- Add your scripts and other body elements here -->
</body>
</html>
