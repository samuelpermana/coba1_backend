@extends("cms.layouts.layout")

<link href="{{ URL::asset("cms/faq/styleedit.css") }}" rel="stylesheet">

@section("content")
  <h1>Edit FAQ</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route("admin.faq.update", $faq->id) }}" method="POST">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="question">Question</label>
      <textarea class="form-control" id="question" name="question" type="text">{{ $faq->question }}</textarea>
    </div>
    <div class="form-group">
      <label for="answer">Answer</label>
      <textarea class="form-control" id="answer" name="answer" rows="3">{{ $faq->answer }}</textarea>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
  </form>
@endsection
