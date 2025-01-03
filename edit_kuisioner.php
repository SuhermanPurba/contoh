<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled  Document</title>
</head>
<body>
<?php
$id_soal = $_GET['id_soal'];
include "koneksi.php";
$select = "SELECT * FROM kuisioner WHERE id_soal='$id_soal'";
$hasil = mysqli_query($conn, $select);
while($buff=mysqli_fetch_array($hasil)){
?>
<h2>Edit Data</h2><br />
<form action="edit_kuisioner2.php" method="post">
<table width="487" border="0">
<input type="hidden" name="id_soal" value="<?php echo $buff['id_soal'];?>" />
	<tr>
		<td width="150">pertanyaan</td>
		<td width="327"><input type="text" name="pertanyaan" value="<?php echo $buff['pertanyaan'];?>" /></td>
	</tr>
	<tr>
		<td height="68" align="right"><input type="reset" value="reset" /></td>
		<td><input type="submit" value="submit" /></td>
	</tr>
</table>
</form>
<?php
};
mysqli_close($conn);
?>
</body>
</html>