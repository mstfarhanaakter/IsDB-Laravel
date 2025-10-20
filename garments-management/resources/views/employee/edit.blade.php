@extends('layout.app')

@section('content')


<!-- Page Header -->
<div class="text-center mb-4">
    <h1>Manage Category</h1>
    <a href="{{ route('create') }}">
        <button class="btn btn-md btn-primary">Add Category</button>
    </a>
</div>
    <div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Details</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($employee as $single)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $single->name }}</td>
                <td>{{ $single->email }}</td>
                <td>{{ $single->phone }}</td>
                <td>{{ $single->department }}</td>
                <td>{{ $single->salary }}</td>
                <td>{{ $single->joining_date }}</td>
               
                <td>
                    <div class="btn-group">
                        <a href="{{ route('edit', $single->id) }}">
                            <button class="btn btn-md btn-warning me-1 p-2">Edit</button>
                        </a>

                        <form action="{{ route('delete') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="catagory_id" value="{{ $single->id }}">
                            <button class="btn btn-md btn-danger p-2">Delete</button>
                        </form>
                    </div>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
