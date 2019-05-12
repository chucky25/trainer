<?php 

//Panggil Koneksi dan function
require 'function.php';

//Cek apakah tombol sudah di tekan
if (isset($_POST['submit'])) {

	//Tampilkan Pesan Berhasil atau tidak Input Data
	if (input()>0) {
		$pesan="Sukses Tambah Data";
		$url ="index.php";
	}
	else
	{
		$pesan="Gagal Tambah Data";
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
 	<h1>INPUT DATA SISWA</h1>
 	<form method="post" action="">
 		<ul>
 			<li>
 				<label>Nama Siswa</label>
 				<input type="text" name="namasiswa">
 			</li>
 			<li>
 				<label>Kelas</label>
 				<input type="text" name="kelas">
 			</li>
 			<li>
 				<label>Jurusan</label>
 				<input type="text" name="jurusan">
 			</li>
 			<button name="submit" type="submit">TAMBAH DATA</button>
 		</ul>
 	</form>
 </body>
 </html>