@extends('layout.backend')

@section('content')
    <h1>Edit Book</h1>

    @if(Session::has('books_update'))
        <div class="alert alert-primary alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> {!! session('books_update') !!}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Something is Wrong</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Use $book not $books --}}
    {{-- Use route 'books.update' and method PUT --}}
    {{ Html::modelForm($book, 'PUT', route('books.update', $book->id))->open() }}

    {!! Html::label('Title:', 'title') !!}
    {!! Html::input('text', 'title', old('title', $book->title))->class('form-control') !!}
    <br>

    {!! Html::label('Description:', 'description') !!}
    {!! Html::textarea('description', old('description', $book->description))->class('form-control') !!}
    <br>

    {!! Html::label('Author:', 'author') !!}
    {!! Html::input('text', 'author', old('author', $book->author))->class('form-control') !!}
    <br>

    {!! Html::label('Year:', 'year') !!}
    {!! Html::input('number', 'year', old('year', $book->year))->class('form-control') !!}
    <br>

    {{ Html::submit('Update')->class('btn btn-primary') }}
    <a class="btn btn-secondary" href="{{ route('books.index') }}">Back</a>

    {!! Html::closeModelForm() !!}
@endsection
