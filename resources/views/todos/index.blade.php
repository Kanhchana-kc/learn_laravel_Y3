@extends('layout.backend')

@section('content')
<h1>To-Do List</h1>

<a href="{{ url('/todos/create') }}" class="btn btn-success mb-3">+ New Task</a>

@if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

@if($todos->count())
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($todos as $todo)
        <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->title }}</td>
            <td>{{ $todo->description }}</td>
            <td>
                <span class="badge bg-{{ $todo->status == 'completed' ? 'success' : 'warning' }}">
                    {{ ucfirst($todo->status) }}
                </span>
            </td>
            <td><a href="{{ url('/todos/' . $todo->id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a></td>
            <td>
                <form action="{{ url('/todos/' . $todo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No tasks found.</p>
@endif
@endsection
