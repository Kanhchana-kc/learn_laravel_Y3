@extends('layout.backend')

@section('content')
    <div class="container mt-4">
        <h1>Book Details</h1>
        <p><strong>Name:</strong> {{ $books->name }}</p>
        <p><strong>Author:</strong> {{ $books->author }}</p>
        <p><strong>Year:</strong> {{ $books->year }}</p>

        <p><strong>Description:</strong> {{ $books->description }}</p>
        <a class="btn btn-secondary mt-3" href="{{ route('books.list') }}">Back</a>
    </div>
@endsection