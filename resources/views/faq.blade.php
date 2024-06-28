@extends("layouts.layout")
@section("content")
  <link href="stylefaq.css" rel="stylesheet">

  <section class="container">
    <h2 class="header">FAQ</h2>
    <p class="sub-header">
      Berisikan tentang pertanyaan yang sering diajukan beserta jawaban secara umum.
    </p>
    @if ($faqs->isEmpty())
      <p class="sub-header">Belum ada data.</p>
    @else
    @foreach ($faqs as $faq)
    <div class="tag">
      <div class="tag-divide">
        <button class="accordion">{{ $faq->question }}</button>
        <div class="panel">
          <p>{{ $faq->answer }}</p>
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </section>

  <script src="js-faq.js"></script>
@endsection