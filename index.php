<?php 
require 'function.php';
$query="SELECT * FROM siswa";
$data=tampiluser($query);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Data siswa</title>
 </head>
 <body>
 	<table border="1px">
 		<thead>
 			<th>NAMA SISWA</th>
 			<th>KELAS</th>
 			<th>JURUSAN</th>
 			<th>MENU AKSI</th>
 		</thead>
 		<tbody>
 			<?php foreach ($data as $rows) : ?>
 			<tr>
 				<td><?=$rows['nama']; ?></td>
 				<td><?=$rows['kelas']; ?></td>
 				<td><?=$rows['jurusan']; ?></td>
 				<td><a href="edit.php?id=<?=$rows['id']; ?>">EDIT</a>|<a href="hapus.php?id=<?=$rows['id']; ?>"onclick="return confirm('YAKIN INGIN HAPUS ?')">HAPUS</a></td>
 			</tr>
 			<?php endforeach ?>
 		</tbody>
 	</table>
 </body>
 </html>