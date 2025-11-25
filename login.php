
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <!-- Form header -->
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <!-- Login form -->
  <form method="post" action="server.php">
    <!-- Email input field -->
  	<div class="input-group">
  		<label>Email</label>
  		<input type="text" id="Email" placeholder="Enter  Email" name="email" required>
  	</div>
    <!-- Password input field -->
  	<div class="input-group">
  		<label>Password</label>
  		<input type="text" id="password" placeholder="Enter password" name="password" required>
  	</div>
    <!-- Submit button -->
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
    <!-- Link to registration page -->
  	<p>
  		Not yet a sign up? <a href="registration.html">Sign up</a>
  	</p>
  </form>
</body>
</html>