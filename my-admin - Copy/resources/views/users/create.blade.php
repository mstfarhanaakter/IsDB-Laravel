<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h2>Add New User</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="">Name: </label>
        <input type="text" name="name"><br><br>
        <label for="">Email: </label>
        <input type="text" name="email"> <br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>