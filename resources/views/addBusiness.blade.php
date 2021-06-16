<!DOCTYPE html>
<html>
<head>
    <title>Business</title>
    <link rel="stylesheet" href="{{ url('app.css') }}">
</head>


<body>
<div class="container">
    <form action="/business" method="POST">
        @csrf
      <label for="name">Business Name</label>
      <input type="text"  name="name" placeholder="Your business name..">

      <label for="email">Email</label>
      <input type="text"  name="email" placeholder="Your email..">

      <label for="url">Website URL</label>
      <input type="text"  name="website" placeholder="Your website url..">

      <label for="phone">Phone Number</label>
      <input type="text"  name="phone" placeholder="Your phone number..">

      <label for="address">Address</label>
      <input type="text"  name="address" placeholder="Your address..">

      <label for="sudescription">Description</label>
      <textarea  name="description" placeholder="Write something.." style="height:200px"></textarea>

      <label for="sudescription">Category</label>
      <br>
      @foreach ($categories as $category )
        <input type="checkbox"  name="category[]" value={{$category->id}}>{{$category->name}}
     @endforeach

<br><br><br>
      <input type="submit" value="Create Business">

    </form>
  </div>
</body>
</html>
