<?php
session_start();
include "koneksi.php";

$login=mysqli_query($conn, "SELECT * from user where (username='".$_POST['username']."') and (password='".$_POST['password']."')"); //ini adalah query database
$cek=mysqli_num_rows($login);
if($cek>0){
	$data = mysqli_fetch_assoc($login);
	
	//Menentukan level login user

	if($data['level']=="admin"){
		$_SESSION['username']=$_POST['username'];
		$_SESSION['level']="admin";
		echo"<script>alert('Anda berhasil masuk');window.location.href='hal_admin.php';</script>";
	}
	else if($data['level']=="dosen"){	
		$select="SELECT * FROM dosen WHERE username='".$_POST['username']."'";
		$query=mysqli_query($conn, $select);
		$buff=mysqli_fetch_array($query);
		$_SESSION['id_dosen']=$buff['id_dosen'];
		$_SESSION['username']=$_POST['username'];
		$_SESSION['level']="dosen";
		echo"<script>alert('Anda berhasil masuk');window.location.href='hal_dosen.php';</script>";
	}
	else if($data['level']=="mahasiswa"){
		$select="SELECT * from mahasiswa WHERE username='".$_POST['username']."'";
		$query=mysqli_query($conn, $select);
		$buff=mysqli_fetch_array($query);
		$_SESSION['id_mahasiswa']=$buff['id_mahasiswa'];
		$_SESSION['semester']=$buff['semester'];
		$_SESSION['username']=$_POST['username'];
		$_SESSION['level']="mahasiswa";
		echo"<script>alert('Anda berhasil masuk');window.location.href='hal_mahasiswa.php';</script>";
	}
	else{
		echo"<script>alert('Anda gagal masuk');window.location.href='index.php';</script>";
	}
}
else{
	echo"<script>alert('Anda gagal masuk');window.location.href='index.php';</script>";
}
?>