
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <?php
    if (isset($_GET['error'])) {
        echo '<p class="error">Invalid email or password.</p>';
    }
    ?>
    <form method="post" action="server.php">
      <div class="form-group">
        <label>Email</label>
        <input type="text" id="Email" placeholder="Enter Email" name="email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" id="password" placeholder="Enter password" name="password" required>
      </div>
      <button type="submit" class="btn" name="login_user">Login</button>
    </form>
    <p>
      Not yet a sign up? <a href="registration.html">Sign up</a>
    </p>
  </div>
</body>
</html>