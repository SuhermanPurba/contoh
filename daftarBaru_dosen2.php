

<?php    //KONEKSI UNPUT DATA DOSEN 
    include "koneksi.php";

    $mysql = "INSERT INTO dosen
    (nama, nip, username, password, semester, matkul, email, notel) VALUES
    ('$_POST[nama]','$_POST[nip]','$_POST[username]','$_POST[password]','$_POST[semester]','$_POST[matkul]','$_POST[email]','$_POST[notel]')";

    if(!mysqli_query($conn, $mysql)){
		die(mysqli_error());
	}

	echo"<script>alert('Data Berhasil Diinput');window.location.href='hal_admin.php?module=data_dosen#pos';</script>";

	mysqli_close($conn);
?>
