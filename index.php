<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form </title>
  <link rel="stylesheet" href="index.css">
</head>
<body>

  <div class="wrapper">
    <form action="index.html" method="POST">
      <h2>Login</h2>
      <div class="input-field">
        <input type="username" required>
        <label>username</label>
      </div>
        <div class="input-field">
        <input type="text" required>
        <label>email</label>
      </div>
      <div class="input-field">
        <input type="password" required>
        <label>password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember"> 
          <p>ingat saya</p>
        </label>
        <a href="">Lupa password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>belum memiliki akun? <a href="daftar.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>