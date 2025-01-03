<?php
    include "koneksi.php";

    $mysql = "INSERT INTO mahasiswa
    (nama, nim, username, password, semester, angkatan) VALUES
    ('$_POST[nama]','$_POST[nim]','$_POST[username]','$_POST[password]','$_POST[semester]','$_POST[angkatan]')";

    if(!mysqli_query($conn, $mysql)){
		die(mysqli_error());
	}

	echo"<script>alert('Data Berhasil Diinput');window.location.href='hal_admin.php?module=data_mahasiswa#pos';</script>";

	mysqli_close($conn);
?>

