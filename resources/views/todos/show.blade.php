@extends('layout.backend')

@section('content')
    <div class="container mt-4">
        <h1>Todos Details</h1>


        <p><strong>Description:</strong> {{ $todos->description }}</p>
        <a class="btn btn-secondary mt-3" href="{{ route('todos.list') }}">Back</a>
    </div>
@endsection