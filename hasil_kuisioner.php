

<?php 
	include "koneksi.php";
	session_start();
	$count=$_POST['count'];
	for($i=1;$i<=$count;$i++){
		$test="id_soal".$i;
		$test1="nilai".$i;

		$select = "SELECT * FROM hasil_kuisioner WHERE username='$_SESSION[username]' AND id_dosen='$_POST[id_dosen]' AND id_soal='$_POST[$test]'";
		$hasil=mysqli_query($conn,$select);
		$rowcount=mysqli_num_rows($hasil);
		if($rowcount==0){
			$mysql = "INSERT INTO hasil_kuisioner (id_dosen, id_soal, username, nilai) VALUES ('$_POST[id_dosen]','$_POST[$test]','$_SESSION[username]','$_POST[$test1]')";
			if(!mysqli_query($conn,$mysql)){
				die(mysqli_error($conn));
			}
		}
		else{
			$mysql = "UPDATE hasil_kuisioner SET id_dosen='$_POST[id_dosen]', id_soal='$_POST[$test]', username='$_SESSION[username]', nilai='$_POST[$test1]' WHERE username='$_SESSION[username]' AND id_soal='$_POST[$test]' AND id_dosen='$_POST[id_dosen]'";
			if(!mysqli_query($conn,$mysql)){
				die(mysqli_error($conn));
			}
		}
		
	}

	echo "<script>alert('nilaian Tersimpan');window.location.href='hal_mahasiswa.php?module=mhs'</script>";
 ?>