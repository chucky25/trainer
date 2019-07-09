<?php 

session_start();

if ( !isset($_SESSION['login']) ) {
header("Location: login.php");
exit;
}

require 'function.php';


if (isset($_POST['cari'])) {
	$data = cari($_POST['keyword']);
} else{
	$data = tampil("SELECT * FROM mhs");
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<form action="" method="post">
		<input autocomplete="off" autofocus="true" placeholder="Masukan NIM atau NAMA Mahasiswa" size="40"  type="text" name="keyword">
		<button type="submit" name="cari">CARI</button>
	</form>
	<br>
	<a href="tambah.php"><button>Tambah Data</button></a>   <a href="logout.php"><button>LOGOUT</button></a>
	<br>
	<br>
	<table border="1px solid" cellpadding="10" cellspacing="0">
		<tr>
			<th>No. </th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i = 1; ?>
	<?php foreach ($data as $isi ): ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="hapus.php?id=<?= $isi['id']; ?>" onclick="return confirm('Yakin Ingin Hapus ?')" ><button>Hapus</button></a> | <a href="edit.php?id=<?= $isi['id']; ?>"><button>Edit</button></a>
			</td>
			<td><?= $isi['nim'];  ?></td>
			<td><img src="images/<?= $isi['gambar'];  ?>" width="100px" alt=""></td>
			<td><?= $isi['nama'];  ?></td>
			<td><?= $isi['email'];  ?></td>
			<td><?= $isi['jurusan'];  ?></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>
</body>
</html>