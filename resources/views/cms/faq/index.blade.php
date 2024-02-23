@extends("cms.layouts.layout")
<link href="{{ URL::asset("cms/rooms/styleindex.css") }}" rel="stylesheet">

@section('content')
    <h1>FAQs</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.faq.create') }}" class="btn btn-primary mb-2">Add FAQ</a>

    @if(count($faqs) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>
                            <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
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
