<html>

	<body>
		<?php
		$id_mahasiswa=$_GET['id_mahasiswa'];
		include"koneksi.php";
		$select="SELECT * FROM mahasiswa WHERE id_mahasiswa='$id_mahasiswa'";
		$hasil=mysqli_query($conn, $select);
		while($buff=mysqli_fetch_array($hasil)){
		?>
		<h2>Edit Data</h2><br />
		<form action="edit_mhs2.php" method="post">
			<table width="487" border="0">
				<input type="hidden" name="id_mahasiswa" value="<?php echo $buff['id_mahasiswa'];?>" />
					<tr>
						<td width="150">Nama</td>
						<td width="327"><input type="text" name="nama" value="<?php echo $buff['nama'];?>" /></td>
					</tr>
					<tr>
						<td>NIM</td>
						<td><input type="text" name="nim" value="<?php echo $buff['nim'];?>" /></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" value="<?php echo $buff['username'];?>" /></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value="<?php echo $buff['password'];?>" /></td>
					</tr>
					<tr>
						<td>Semester</td>
						<td><input type="text" name="semester" value="<?php echo $buff['semester'];?>" /></td>
					</tr>
					<tr>
						<td>Angkatan</td>
						<td><input type="text" name="angkatan" value="<?php echo $buff['angkatan'];?>" /></td>
					</tr>
					<tr>
						<td height="68" align="right"><input type="reset" value="reset" class="tombol_sc"/></td>
						<td><input type="submit" value="submit" class="tombol_sc"/></td>
					</tr>
			</table>
		</form>
		<?php
		};
		mysqli_close($conn);
		?>
	</body>
</html>