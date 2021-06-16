<!DOCTYPE html>
<html>
<head>
    <title>Category</title>
    <link rel="stylesheet" href="{{ url('app.css') }}">
</head>


<body>
<div class="container">
    <form action="/category" method="POST">
        @csrf
      <label for="fname">Category Name</label>
      <input type="text" name="name" placeholder="Category name..">

    <input type="submit" value="Create Category">

    </form>
  </div>
</body>
</html>
