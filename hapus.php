<?php 

require 'function.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM siswa WHERE id ='$id'");
$cek = mysqli_affected_rows($conn);
if ($cek>0) {
	$pesan="BERHASIL DI HAPUS";
	$url ="index.php";
}
else{
	$pesan="GAGAL DI HAPUS";
	$url ="#";
}
alert($pesan,$url);


 ?>