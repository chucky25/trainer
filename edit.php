<?php 

//Panggil Koneksi dan function
require 'function.php';
$id = $_GET['id'];
$query = "SELECT * FROM siswa WHERE '$id'";
$data = tampiluser($query)[0];

if (isset($_POST['submit'])) {

	//Tampilkan Pesan Berhasil atau tidak Input Data
	if (edit()>0) {
		$pesan="Sukses Edit Data";
		$url ="index.php";
	}
	else
	{
		$pesan="Gagal Edit Data";
		$url ="#";
	}
	alert($pesan,$url);
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tambah Data</title>
 </head>
 <body>
 	<h1>EDIT DATA SISWA</h1>
 	<form method="post" action="">
 		<input type="hidden" value="<?=$data['id']; ?>" name="id">
 		<ul>
 			<li>
 				<label>Nama Siswa</label>
 				<input type="text" value="<?=$data['nama']; ?>" name="namasiswa">
 			</li>
 			<li>
 				<label>Kelas</label>
 				<input type="text" value="<?=$data['kelas']; ?>" name="kelas">
 			</li>
 			<li>
 				<label>Jurusan</label>
 				<input type="text" value="<?=$data['jurusan']; ?>" name="jurusan">
 			</li>
 			<button name="submit" type="submit">RUBAH</button>
 		</ul>
 	</form>
 </body>
 </html>