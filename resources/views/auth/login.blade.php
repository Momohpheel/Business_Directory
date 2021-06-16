<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ url('app.css') }}">
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
    <div class="container signin">
        <p>You don't have an account? <a href="/register">Sign up</a>.</p>
      </div>

  </form>
</body>
  </html>
