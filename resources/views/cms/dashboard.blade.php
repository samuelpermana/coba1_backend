@extends("cms.layouts.layout")

@section("content")
  <link href="{{ URL::asset("cms/styledashboard.css") }}" rel="stylesheet">

  <body>
    <h1>Dashboard CMS Senat FH Undip</h1><br>
    <a href="http://127.0.0.1:8000/admin/aktivitas"><button class="btn item">Aktivitas Senat</button></a>
    <a href="http://127.0.0.1:8000/admin/jdih"><button class="btn item">JDIH</button></a>
    <a href="http://127.0.0.1:8000/admin/rooms"><button class="btn item">Ruangan</button></a>
    <a href="http://127.0.0.1:8000/admin/room-schedules"><button class="btn item">Jadwal Ruangan</button></a>
    <a href="http://127.0.0.1:8000/admin/bankaspirasi"><button class="btn item">Bank Aspirasi</button></a>

  </body>
@endsection
