@extends("badan.layouts.layout")
@section("content")
<body>
    <h1>Create New Agenda</h1>

    <form action="{{ route('badan.agenda.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nama">Nama Agenda:</label><br>
            <input type="text" id="nama" name="nama" required><br>
        </div>
        <div>
            <label for="file">Upload File:</label><br>
            <input type="file" id="file" name="file" required><br>
        </div>
        <div>
            <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan:</label><br>
            <input type="datetime-local" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" required><br>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
@endsection