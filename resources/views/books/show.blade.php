@extends('layout.backend')

@section('content')
    <h1>Book details</h1>
    <p>name: {{$books->name}}</p>
    <p>description: {{$books->description}}</p>
    <a class="btn btn-secondary" href="{{route('books.list')}}">Back</a>
@endsection