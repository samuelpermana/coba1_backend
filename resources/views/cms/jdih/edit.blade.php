<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit JDIH Record</title>
    <!-- Include your styles and scripts as needed -->
</head>
<body>
    <h1>Edit JDIH Record</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.jdih.update', ['id' => $jdihRecord->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="POST">
        <label for="tahun">Tahun:</label><br>
        <input type="text" id="tahun" name="tahun" value="{{ $jdihRecord->tahun }}"><br><br>

        <label for="jenis_peraturan">Jenis Peraturan:</label><br>
        <input type="text" id="jenis_peraturan" name="jenis_peraturan" value="{{ $jdihRecord->jenis_peraturan }}"><br><br>

        <label for="nama_peraturan">Nama Peraturan:</label><br>
        <input type="text" id="nama_peraturan" name="nama_peraturan" value="{{ $jdihRecord->nama_peraturan }}"><br><br>

        <label for="tanggal_disahkan">Tanggal Disahkan:</label><br>
        <input type="date" id="tanggal_disahkan" name="tanggal_disahkan" value="{{ $jdihRecord->tanggal_disahkan }}"><br><br>

        <label for="peraturan">Peraturan:</label><br>
        <textarea id="peraturan" name="peraturan">{{ $jdihRecord->peraturan }}</textarea><br><br>

        <label for="status_peraturan">Status Peraturan:</label><br>
        <input type="text" id="status_peraturan" name="status_peraturan" value="{{ $jdihRecord->status_peraturan }}"><br><br>

        <label for="file_peraturan">File Peraturan:</label><br>
        @if ($jdihRecord->file_peraturan)
            <p><a href="{{ Storage::url($jdihRecord->file_peraturan) }}" target="_blank">Download File Peraturan Lama</a></p>
        @endif
        <input type="file" id="file_peraturan" name="file_peraturan"><br><br>

        <label for="file_naskah">File Naskah:</label><br>
        @if ($jdihRecord->file_naskah)
            <p><a href="{{ Storage::url($jdihRecord->file_naskah) }}" target="_blank">Download File Naskah Lama</a></p>
        @endif
        <input type="file" id="file_naskah" name="file_naskah"><br><br>

        <label for="file_inventarisasi">File Inventarisasi:</label><br>
        @if ($jdihRecord->file_inventarisasi)
            <p><a href="{{ Storage::url($jdihRecord->file_inventarisasi) }}" target="_blank">Download File Inventarisasi Lama</a></p>
        @endif
        <input type="file" id="file_inventarisasi" name="file_inventarisasi"><br><br>

        <label for="file_lainnya">File Lainnya:</label><br>
        @if ($jdihRecord->file_lain->isNotEmpty())
            <ul>
                @foreach ($jdihRecord->file_lain as $file)
                    <li>
                        <a href="{{ Storage::url($file->nama_file) }}" target="_blank">Download File Lainnya {{ $loop->iteration }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
        <input type="file" id="file_lainnya" name="file_lainnya[]" multiple><br><br>

        <button type="submit">Update</button>
    </form>

    <!-- Include your additional content, styles, and scripts as needed -->
</body>
</html>
