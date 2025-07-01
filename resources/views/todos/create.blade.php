@extends('layout.backend')

@section('content')
<h2>Create New Task</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('/todos') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title *</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select" required>
        <option value="pending">Pending</option>
        <option value="completed">Completed</option>
    </select>
</div>


    <button type="submit" class="btn btn-success">Create Task</button>
    <a href="{{ url('/todos') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
