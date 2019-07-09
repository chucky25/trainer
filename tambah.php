<?php 

session_start();

if ( !isset($_SESSION['login']) ) {
header("Location: login.php");
exit;
}

require 'function.php';

if (isset($_POST['submit'])) {
	if (tambah($_POST)>0) {
		alert('Berhasil Ditambahkan','index.php');
	}
	else{
		alert('Gagal Ditambahkan','index.php');
	}

}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>EDIT</title>
 </head>
 <body>
 	<form action="" method="post" enctype="multipart/form-data">
 	<label for="nim">NIM : </label><input name="nim" id="nim" type="text"><br>
 	<label for="nama">NAMA : </label><input name="nama" id="nama" type="text"><br>
 	<label for="email">EMAIL : </label><input name="email" id="email" type="text"><br>
 	<label for="jurusan">JURUSAN : </label><input name="jurusan" id="jurusan" type="text"><br>
 	<label for="gambar">GAMBAR : </label><input name="gambar" id="gambar" type="file"><br>
 	<button name="submit" type="submit">TAMBAH DATA</button>
 	</form>
 </body>
 </html>