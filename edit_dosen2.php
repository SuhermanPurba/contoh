<?php //KONEKSI FORM EDIT DOSEN
	include "koneksi.php";
	if(isset($_POST['id_dosen'])){
		$edit = "UPDATE dosen SET nama ='$_POST[nama]',
		nip='$_POST[nip]', username = '$_POST[username]',
		password='$_POST[password]',semester='$_POST[semester]',
		matkul='$_POST[matkul]', email='$_POST[email]',
		notel='$_POST[notel]' where id_dosen='$_POST[id_dosen]'";
		$hasil=mysqli_query($conn, $edit);
		if($hasil){
			echo"<script>alert('data berhasil diedit');window.location.href='hal_admin.php?module=data_dosen#pos';</script>";
		}
	}
?>