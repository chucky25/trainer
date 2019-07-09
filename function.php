<?php 

//Atur Koneksi php ( Lokai, User, Password, Database )
$conn = mysqli_connect("localhost","root","","procedurals");

//Cek Koneksi Berhasil atau tidak
if (!$conn) {
	die("Tidak Bisa terhubung dengan database");
	
}

function alert($pesan,$link){
	echo "
		<script>
			alert('$pesan');
			window.location.href='$link';
		</script>
	";
}

function tampil($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result)) {
		$rows[] = $row; 
	}
	return $rows;
}

function tambah($query){
	global $conn;
	$nim = htmlspecialchars($query['nim']);
	$nama = htmlspecialchars($query['nama']);
	$email = htmlspecialchars($query['email']);
	$jurusan = htmlspecialchars($query['jurusan']);

	$gambar = upload();

	if (!$gambar) {
		return false;
	} else {

	}


	$code = "INSERT INTO mhs VALUES('','$gambar','$nim','$nama','$email','$jurusan')";
	mysqli_query($conn,$code);
	return mysqli_affected_rows($conn);
}

function upload(){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$errorFile = $_FILES['gambar']['error'];
	$tmpFile = $_FILES['gambar']['tmp_name'];

	if ($errorFile === 4 ) {
		alert("Pilih Gambar Terlebih dahulu","index.php");
		return false;
	}

	$eksetensiGambarValid = ['jpg','jpeg','png'];
	$eksetensiGambar = explode('.',$namaFile);
	$eksetensiGambar = strtolower(end($eksetensiGambar));

	if (!in_array($eksetensiGambar, $eksetensiGambarValid)) {
		alert("Data yang kamu upload Bukan Gambar","index.php");
		return false;
	}

	if ($ukuranFile > 1000000) {
		alert("Maksimal Ukuran gambar adalah 1MB","index.php");
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $eksetensiGambar;

	move_uploaded_file($tmpFile, 'images/'.$namaFileBaru);

	return $namaFileBaru;


}

function edit($query){
	global $conn;
	$id = $query['id'];
	$gambarLama = htmlspecialchars($query['gambarLama']);
	$nim = htmlspecialchars($query['nim']);
	$nama = htmlspecialchars($query['nama']);
	$email = htmlspecialchars($query['email']);
	$jurusan = htmlspecialchars($query['jurusan']);

	if ( $_FILES['gambar']['error']===4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	$code = "UPDATE mhs SET
				gambar = '$gambar',
				nim = '$nim',
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan'
				WHERE id='$id'";
	mysqli_query($conn,$code);
	return mysqli_affected_rows($conn);

}

function cari($keyword){
	
	return tampil("SELECT * FROM mhs WHERE 
		nama LIKE '%$keyword%' OR
		nim LIKE '%$keyword%'
		");

}


function register($data){
	global $conn;
	$username = $data['username'];
	$password1= $data['password1'];
	$password2= $data['password2'];

	if ($password1!==$password2) {
		alert("Password 1 dengan Password2 Tidak Sama");
		return false;
	}

	$result = mysqli_query($conn," SELECT * FROM user WHERE username ='$username' ");


	if (mysqli_fetch_assoc($result)) {
		alert("Username Sudah ada coba cari lain","index.php");
		return false;
	}

	$password1 = password_hash($password1, PASSWORD_DEFAULT);

	mysqli_query($conn,"INSERT INTO user VALUES ('','$username','$password1')");

	return mysqli_affected_rows($conn);

}



 ?>
