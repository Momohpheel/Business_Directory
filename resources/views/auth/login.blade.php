<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>

<body>


<form action="/login" method="post">
    @csrf
    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="example@email.com" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="**********" name="password" required>

      <button type="submit">Login</button>

    </div>


  </form>
</body>
  </html>
