@extends("layouts.layout")
@section("content")
  <link href="stylefaq.css" rel="stylesheet">

  <section class="container">
    <h2 class="header">FAQ</h2>
    <p class="sub-header">
      Jawaban dari pertanyaan yang sering ditanyakan.
    </p>
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
  </section>

  <script src="js-faq.js"></script>
@endsection