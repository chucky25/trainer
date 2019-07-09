<?php 
session_start();

require 'function.php';

if (isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {

	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($conn,"SELECT username FROM user WHERE id=$id");
	$row = mysqli_fetch_assoc($result);

	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}

}

if ( isset($_SESSION['login'])) {
header("Location: index.php");
exit;
}

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password1'];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

	if (mysqli_num_rows($result)==1) {
		$row = mysqli_fetch_assoc($result);
	
		if (password_verify($password, $row['password'])){
			$_SESSION['login'] = true;
			if (isset($_POST['remember'])) {
				setcookie("id",$row['id'],time()+3600);
				setcookie("key",hash("sha256", $row["username"]),time()+3600);
			}
			header("Location: index.php");
			exit;
		}
	

	}

$error = true;

}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	
 	<meta charset="UTF-8">
 	<title>Login</title>
 </head>
 <body>
 	<?php if (isset($error)) : ?>
	<p>USERNAME ATAU PASSWORD SALAH</p>
 	<?php endif; ?>
 	<h1>HALAMAN LOGIN</h1>
 	<form action="" method="post">
 		<ul>
 			<li><label for="username">USERNAME : </label><input type="text" name="username" id="username"></li>
 			<li><label for="password1">PASSWORD : </label><input type="password" name="password1" id="password1"></li>
 			<li><input type="checkbox" name="remember"> REMEMBER ME</li>
 			<li><button type="submit" name="login">LOGIN</button></li>
 		</ul>
 	</form>
 </body>
 </html>