@extends("cms.layouts.layout")

@section("content")
  <link href="{{ URL::asset("cms/styledashboard.css") }}" rel="stylesheet">

  <body>
    <h1>Dashboard CMS Senat FH Undip</h1><br>
    <div class="grid">
      <a href="http://127.0.0.1:8000/admin/aktivitas"><button class="btn item">Aktivitas Senat</button></a>
      <a href="http://127.0.0.1:8000/admin/jdih"><button class="btn item">JDIH</button></a>
      <a href="http://127.0.0.1:8000/admin/rooms"><button class="btn item">Ruangan</button></a>
      <a href="http://127.0.0.1:8000/admin/room-schedules"><button class="btn item">Jadwal Ruangan</button></a>
      <a href="http://127.0.0.1:8000/admin/bankaspirasi"><button class="btn item">Bank Aspirasi</button></a>
      <a href="http://127.0.0.1:8000/admin/events"><button class="btn item">Events</button></a>
      <a href="http://127.0.0.1:8000/admin/persetujuan-proposal"><button class="btn item">Persetujuan Proposal</button></a>
    </div>

  </body>
@endsection
