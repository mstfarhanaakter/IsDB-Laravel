<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
</head>
<body>
    <h2>Users List</h2>
    <a href="{{ route('users.create') }}">➕ Add New User</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Action</th>
        </tr>
        @foreach($data as $user)
        <tr>
            <td>{{ $user['id'] }}</td>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>
                <a href="{{ route('users.edit', $user['id']) }}">Edit</a> |
                <a href="{{ route('users.delete', $user['id']) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
