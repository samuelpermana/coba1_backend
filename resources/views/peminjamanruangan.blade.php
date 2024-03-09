@extends("layouts.layout")
@section("content")

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="styletransparansi.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" rel="stylesheet">
    <link href="stylepeminjamanruangan.css" rel="stylesheet">
    <title>SENAT FH UNDIP</title>
  </head>

  <body>

    <section class="container">
      <h2 class="header">PEMINJAMAN RUANGAN</h2>
      <p class="sub-header">Berisikan tentang data peminjaman ruangan</p>

      <main class="table" id="customers_table">
        <section class="table__header">
          <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="/img/search.png" alt="">
          </div>
          <div class="export__file">
            <label class="export__file-btn" for="export-file" title="Export File"></label>
            <input id="export-file" type="checkbox">
            <div class="export__file-options">
              <label>Export As &nbsp; &#10140;</label>
              <label id="toPDF" for="export-file">PDF <img src="/img/pdf.png" alt=""></label>
            </div>
          </div>
        </section>
        <section class="table__body">
          <table>
            <thead>
              <tr>
                <th> No <span class="icon-arrow">&UpArrow;</span></th>
                <th> Digunakan Oleh <span class="icon-arrow">&UpArrow;</span></th>
                <th> Ruangan <span class="icon-arrow">&UpArrow;</span></th>
                <th> Tanggal <span class="icon-arrow">&UpArrow;</span></th>
                <th> Jam Mulai <span class="icon-arrow">&UpArrow;</span></th>
                <th> Jam Selesai <span class="icon-arrow">&UpArrow;</span></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roomSchedule as $index => $schedule)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $schedule->booked_by }}</td>
                  <td>{{ $schedule->room->name }}</td>
                  <td>{{ \Carbon\Carbon::parse($schedule->date)->format("d M, Y") }}</td>
                  <td>
                    <p class="status delivered">{{ $schedule->start_time }}</p>
                  </td>
                  <td>
                    <p class="status delivered">{{ $schedule->end_time }}</p>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </section>
      </main>
      <section class="container">
        <h2 class="header">TAMPILAN EXCEL</h2>
        <p class="sub-header">Berisikan tentang data ruangan yang meminjam tempat di FH dalam bentuk exel</p>
        <main class="table4" id="customers_table">
          <a href="https://bit.ly/PeminjamanRuanganFakultasHukumUndip">Link Tampilan Excel</a>
        </main>
      </section>

      <script src="js-peminjamanruangan.js"></script>
    @endsection
