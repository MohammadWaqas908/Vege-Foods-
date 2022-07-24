<?php
include ('connection.php');
session_start();
$_SESSION['Username']="";
 if (isset($_POST['register'])) {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $qry = "INSERT INTO user(Uname,Email,Password) VALUES('$uname','$email','$pass')";
    $run = mysqli_query($conn,$qry);
    if ($run) {
      echo '<script language="javascript">';
      echo 'alert("Account Created successfully")';  
      echo '</script>';
      echo "<script>location.replace('login.php')</script>";
    }else{
      echo '<script language="javascript">';
      echo 'alert("Account is not created check again")';  
      echo '</script>';
      echo "<script>location.replace('login.php')</script>";
    }
  }
  if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$qry = "SELECT * FROM user WHERE Uname = '$username' AND Password = '$password'";
	$run = mysqli_query($conn,$qry);
	if ($run) {
		$rows=$run->fetch_assoc();
		$_SESSION['uID']=$rows['ID'];
		$_SESSION['Username']=$rows['Uname'];
      	echo "<script>location.replace('index.php')</script>";
	}else{
		echo '<script language="javascript">';
    	echo 'alert("Invalid Username or Password")';  
      	echo '</script>';
      	echo "<script>location.replace('login.php')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login & Registeration Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="hero">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Log IN</button>
				<button type="button" class="toggle-btn" onclick="register()">Register</button>
			</div>
			<div class="social-icons">
				<a href="#"><img src="././images/fb.png"></a>
				<a href="#"><img src="././images/tw.png"></a>
				<a href="#"><img src="././images/gp.png"></a>
			</div>
			<form method="post" action="" id="login" class="input-group">
				<input type="text" class="input-field" placeholder="Username" name="username" required="true">
				<input type="password" class="input-field" placeholder="Enter Password" name="password" required="true">
				<input type="checkbox" class="check-box"><span>Remember Password</span>
				<button type="submit" name="login" class="submit-btn">Log In</button>
			</form>
			<form method="post" action="" id="register"  class="input-group">
				<input type="text" class="input-field" name="uname" placeholder="Username" required="true">
				<input type="email" class="input-field" name="email" placeholder="User Email" required="true">
				<input type="password" class="input-field" name="pass" placeholder="Enter Password" required="true">
				<input type="checkbox" class="check-box"><span>Agree to the term & condition</span>
				<button type="submit" name="register" class="submit-btn">Register</button>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		var x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");
		function register() {
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}
		function login() {
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0";
		}
		/*function register() {
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}*/
	</script>
</body>
</html>