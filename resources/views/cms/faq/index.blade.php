@extends("cms.layouts.layout")
<link href="{{ URL::asset("cms/faq/styleindex.css") }}" rel="stylesheet">

@section("content")
  <h1>FAQs</h1><br>

  @if (session("success"))
    <div class="alert alert-success">
      {{ session("success") }}
    </div><br>
  @endif

  <a class="btn btn-primary mb-2" href="{{ route("admin.faq.create") }}">Add FAQ</a><br><br>

  @if (count($faqs) > 0)
    <table class="item" border="1">
      <thead>
        <tr>
          <th scope="col">Question</th>
          <th scope="col">Answer</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($faqs as $faq)
          <tr>
            <td>{{ $faq->question }}</td>
            <td>{{ $faq->answer }}</td>
            <td>
              <a href="{{ route("admin.faq.edit", $faq->id) }}">Edit</a> |
              <form class="d-inline" action="{{ route("admin.faq.destroy", $faq->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>No FAQs found</p>
  @endif
@endsection
