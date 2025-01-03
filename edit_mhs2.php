<?php
	include"koneksi.php";
	if(isset($_POST['id_mahasiswa'])){
		$edit="update mahasiswa set nama='$_POST[nama]',
		nim='$_POST[nim]',username='$_POST[username]',
		password='$_POST[password]',semester='$_POST[semester]',
		angkatan='$_POST[angkatan]' where id_mahasiswa='$_POST[id_mahasiswa]'";
		$hasil=mysqli_query($conn, $edit);
		if($hasil){
			echo"<script>alert('data berhasil diedit');window.location.href='hal_admin.php?module=data_mahasiswa#pos';</script>";
		}
	}
?>