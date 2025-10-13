<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
       <style type="text/tailwindcss">
      @layer utilities{
        .container{
            @apply px-10 mx-auto;
        }
      }
    </style>
    <title>Document</title>
</head>
<body>
   
    <div class="container">
        <div class="flex justify-between my-5">
       <h2 class="text-red-500 text-x1">Home</h2>
       <a href="/create" class="bg-green-600 text-white rounded py-2 px-4">Add New Post</a>
       </div>
    </div>
</body>
</html>