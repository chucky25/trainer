<?php 

require 'function.php';

if (isset($_POST['register'])) {
	if (register($_POST) > 0) {
		alert("Berhasil Ditambahkan","index.php");
	} else {
		alert("Gagal Mendaftar","#");
	}
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Form Registrasi</title>
 </head>
 <body>
 	<h1>REGISTRASI</h1>
 	<form action="" method="post">
 		<label for="username">USERNAME</label><input type="text" name="username" id="username"><br>
 		<label for="password1">PASSWORD</label><input type="password" name="password1" id="password1"><br>
		<label for="password2">KONFIRMASI PASSWORD</label><input type="password" name="password2" id="password2"><br>
		<button name="register" type="submit">REGISTER</button>
 	</form>
 </body>
 </html>