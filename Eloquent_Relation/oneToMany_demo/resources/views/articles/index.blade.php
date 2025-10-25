<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Articles</h1>

        <!-- Articles Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Article Name</th>
                    <th>Details</th>
                    <th>Comments</th>
                    <th>Add Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articals as $artical)
                    <tr>
                        <td>{{ $artical->name }}</td>
                        <td>{{ $artical->details }}</td>
                        <td>
                            <ul class="mb-0">
                                @foreach ($artical->comments as $comment)
                                    <li>{{ $comment->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="artical_id" value="{{ $artical->id }}">
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" placeholder="Add Comment" required>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr class="my-5">

        <!-- Create New Article Form -->
        <h2>Create New Article</h2>
        <!-- articles.store নামটি আসছে এই resource route থেকে -->
        <!-- Resource route হলো URL এবং Controller method এর mapping। -->
        <!-- উদাহরণ:
                | HTTP Method | URL | Controller Method | Route Name |
                |-------------|------------|-----------------|-----------------|
                | GET | /articles | index | articles.index |
                | POST | /articles | store | articles.store |
                | GET | /articles/create | create | articles.create |
            Resource route decide করে কোন URL কোন Controller method কল হবে, কিন্তু $articals variable এর সাথে direct কোনো সম্পর্ক নেই। -->
        
            <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Article Name" required>
            </div>
            <div class="mb-3">
                <textarea name="details" class="form-control" rows="4" placeholder="Article Details"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Create Article</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional, for components like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>