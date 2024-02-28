@extends("layouts.layout")
@section("content")
  <link href="stylekotakaspirasi.css" rel="stylesheet">


  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="stylekotakaspirasi.css" rel="stylesheet">

    <title>SENAT FH UNDIP</title>
  </head>

  <section id="contact">
    <h2>KOTAK ASPIRASI</h2>
    <form action="{{ route("aspirasi.store") }}" method="POST">


      <label for="name">Nama:</label>
      <input id="name" name="name" type="text" required>

      <label for="email">Email:</label>
      <input id="email" name="email" type="email" required>

      <label for="angkatan">Angkatan:</label>
      <input id="angkatan" name="angkatan" type="text" required>

      <label for="id_line">ID Line:</label>
      <input id="id_line" name="id_line" type="text" required>

      <div class="message-container">
        <label for="message">Pesan:</label>
        <textarea id="message" name="message" required></textarea>
        @csrf <button type="submit">Kirim</button>
      </div>
    </form>
  </section>
@endsection
