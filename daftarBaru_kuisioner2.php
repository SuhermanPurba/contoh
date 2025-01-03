<?php
    include "koneksi.php";

    $mysql = "INSERT INTO kuisioner 
    (pertanyaan) VALUES
    ('$_POST[pertanyaan]')";

    if(!mysqli_query($conn, $mysql)){
		die(mysqli_error());
	}

	echo"<script>alert('Data Berhasil Diinput');window.location.href='hal_admin.php?module=data_kuisioner#pos';</script>";

	mysqli_close($conn);
?>
