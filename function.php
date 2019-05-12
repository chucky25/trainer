<?php 

//KONEKSI DATABASE (server, user, password, nama database)
$conn = mysqli_connect("localhost","root","","crud");

/* CEK KONEKSI DATABASE APAKAH BERHASIL ATAU TIDAK  */
if (!$conn) {
	die("koneksi tidak Berhasil");
	mysqli_close($conn);
}

//Function Alert
function alert($pesan,$location){
	echo "
	<script>
	alert('$pesan');
	document.location.href='$location';
	</script>
	";
}

//Function Input Data Tambah.php
function input(){
	global $conn;
	//Tangkap data dari form
	$namasiswa = htmlspecialchars($_POST['namasiswa']);
	$kelas = htmlspecialchars($_POST['kelas']);
	$jurusan = htmlspecialchars($_POST['jurusan']);
	//Masukan ke fungsi input
	$query = "INSERT INTO siswa VALUES ('','$namasiswa','$kelas','$jurusan')";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

//Function Tampil Data User index.php
function tampiluser($query){
	global $conn;
	//Tangkap seluruh data siswa dengan array;
	$result = mysqli_query($conn,$query);
	$datasiswa = [];
	while ($data = mysqli_fetch_assoc($result)) {
		//Masukan data siswa ke array
		$datasiswa[]=$data;
	}
	return $datasiswa;
}

//Function Edit data user edit.php
function edit(){
	global $conn;
	//Tangkap data dari form
	$id = $_POST['id'];
	$namasiswa = htmlspecialchars($_POST['namasiswa']);
	$kelas = htmlspecialchars($_POST['kelas']);
	$jurusan = htmlspecialchars($_POST['jurusan']);
	$query = "UPDATE siswa SET 
	nama = '$namasiswa', kelas = '$kelas',jurusan ='$jurusan'
	WHERE id = '$id'";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}





 ?>