@extends('layout.backend')

@section('content')
<h1>Books</h1>
<a class="btn btn-primary" href="{{ url('/books/create') }}">New</a>
<br><br>

@if(Session::has('book_delete'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Primary!</strong> {!! session('book_delete') !!}
</div>
@endif

@if (count($books) > 0)
<table class="table table-bordered">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Year</th>
        <th>Edit</th>
        <th>Delete</th>
    
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{!! $book->id !!}</td>
            <td><a href="{{ url('/books/' . $book->id) }}">{!! $book->title !!}</a></td>
            <td>{!! $book->author !!}</td>
            <td>{!! $book->year !!}</td>
            <td><a class="btn btn-primary" href="{!! url('/books/' . $book->id . '/edit') !!}">Edit</a></td>
            <td>
                {{ Html::form('DELETE','books/'. $book->id)->open() }}
                    <button onclick="return confirmAction()" class="btn btn-danger delete">Delete</button>
                {{ Html::form()->close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    function confirmAction() {
        return confirm("Are you sure to delete?");
    }
</script>

@else
<p>No books found.</p>
@endif
@endsection
