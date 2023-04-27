

<?php

include('connection.php'); 

if(isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];


	$query="SELECT * FROM user WHERE email='$email' AND password='$password'";
	$result=mysqli_query($config, $query);
    
	if(mysqli_num_rows($result)==1){
        $fetch=mysqli_fetch_array($result);
        $email=$fetch['email'];
        session_start();
		$_SESSION['email']=$email;
		header('Location: user_dashboard.php');
		exit();
	} else {
		?><script>alert("Incorrect email or password. Please try again.");</script><?php
	}
}
?>

</body>
</html>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta charset="UTF-8" />
    <title>User Login</title>

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/userlogin.css" />
  </head>
  <body class="login-page">
    <div class="login">
      <h1>Login</h1>
      <form method="post">
        <label for="username">
          <!-- font awesome icon -->
          <i class="fas fa-user"></i>
        </label>
        <input
          type="text"
          name="email"
          placeholder="Email"
          id="username"
          required
        />
        <label for="password">
          <i class="fas fa-lock"></i>
        </label>
        <input
          type="password"
          name="password"
          placeholder="Password"
          id="password"
          required
        />
        <input type="submit" name="login" value="Login" />
        <div>
          Don't have an account?
          <a href="signup.php">Register</a>
        </div>
      </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
   
  </body>
</html>
