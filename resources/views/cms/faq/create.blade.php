@extends("cms.layouts.layout")

<link href="{{ URL::asset("cms/rooms/stylecreate.css") }}" rel="stylesheet">
@section('content')
    <h1>Add FAQ</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.faq.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question">Question</label>
            <textarea type="text" class="form-control" id="question" name="question"></textarea>
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection