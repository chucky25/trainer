<?php 
session_start();

if ( !isset($_SESSION['login']) ) {
header("Location: login.php");
exit;
}
require 'function.php';

$id = $_GET['id'];

$hapus = mysqli_query($conn,"DELETE FROM mhs WHERE id='$id'");
if (mysqli_affected_rows($conn)>0) {
	alert("Berhasil Di Hapus","index.php");
} else {
	alert("Gagal Di Hapus","index.php");
}


 ?>