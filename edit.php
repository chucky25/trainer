<?php 
session_start();

if ( !isset($_SESSION['login']) ) {
header("Location: login.php");
exit;
}
require 'function.php';
$id = $_GET['id'];
$data = tampil("SELECT * FROM mhs WHERE id='$id'")[0];


if (isset($_POST['submit'])) {
	if (edit($_POST)>0) {
		alert('Berhasil Ditambahkan','index.php');
	} else{
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
 	<form method="post" enctype="multipart/form-data">
 		<img width="100" src="images/<?=$data['gambar']; ?>" alt=""><br>
 		<input type="hidden" name="gambarLama" value="<?=$data['gambar']; ?>">
 		<input name="id" type="hidden" value="<?=$data['id']; ?>" >
 		<label for="GAMBAR">GAMBAR : </label><input value="<?=$data['gambar']; ?>" name="gambar" id="GAMBAR" type="file"><br>
	 	<label for="nim">NIM : </label><input value="<?=$data['nim']; ?>" name="nim" id="nim" type="text"><br>
	 	<label for="nama">NAMA : </label><input value="<?=$data['nama']; ?>" name="nama" id="nama" type="text"><br>
	 	<label for="email">EMAIL : </label><input value="<?=$data['email']; ?>" name="email" id="email" type="text"><br>
	 	<label for="jurusan">JURUSAN : </label><input value="<?=$data['jurusan']; ?>" name="jurusan" id="jurusan" type="text"><br>
	 	<button name="submit" type="submit">EDIT DATA</button>
 	</form>
 </body>
 </html>