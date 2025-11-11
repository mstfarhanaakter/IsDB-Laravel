@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Production Lines</h1>
    <a href="{{ route('production-lines.create') }}" class="btn btn-primary mb-3">Add New Line</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lines as $line)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $line->name }}</td>
                    <td>{{ $line->description }}</td>
                    <td>
                        <a href="{{ route('production-lines.show', $line->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('production-lines.edit', $line->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('production-lines.destroy', $line->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
