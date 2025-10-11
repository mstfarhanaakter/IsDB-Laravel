<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

</head>
<body>
    <h2>Edit User</h2>
    <form action="{{ route('users.update', $user['id']) }}" method="POST">
        @csrf
        <label for="">Name: </label>
        <input type="text" name="name" value="{{ $user['name'] }}"> <br><br>
        <label for="">Email: </label>
        <input type="text" name="email" value="{{ $user['email'] }}"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>