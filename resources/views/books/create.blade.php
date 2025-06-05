@extends('layout.backend')

@section('content')
    <h1>Create Book</h1>

    @if(Session::has('books_create'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> {!! session('books_create') !!}
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Something is wrong</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {!! Html::form('POST', route('books.store'))->open() !!}

    {!! Html::label('Title:', 'title') !!}
    {!! Html::input('text', 'title', old('title'))->class('form-control') !!}
    <br>

    {!! Html::label('Description:', 'description') !!}
    {!! Html::textarea('description', old('description'))->class('form-control') !!}
    <br>

    {!! Html::label('Author:', 'author') !!}
    {!! Html::input('text', 'author', old('author'))->class('form-control') !!}
    <br>

    {!! Html::label('Year:', 'year') !!}
    {!! Html::input('number', 'year', old('year'))->class('form-control') !!}
    <br>

    {{ Html::submit('Create')->class('btn btn-primary') }}
    <a class="btn btn-secondary" href="{{ route('books.index') }}">Back</a>

    {!! Html::form()->close() !!}
@endsection
