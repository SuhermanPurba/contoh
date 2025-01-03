<?php
	include "koneksi.php";
	if(isset($_POST['id_soal'])){
		$edit = "UPDATE kuisioner SET pertanyaan ='$_POST[pertanyaan]'";
		$hasil=mysqli_query($conn, $edit);
		if($hasil){
			echo"<script>alert('data berhasil diedit');window.location.href='hal_admin.php?module=data_kuisioner#pos';</script>";
		}
	}
?>