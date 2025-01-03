<?php
include"koneksi.php";
$id_mahasiswa=$_GET['id_mahasiswa'];
$hapus="DELETE FROM mahasiswa WHERE id_mahasiswa='$id_mahasiswa'";
$hasil=mysqli_query($conn, $hapus);
if($hapus){
    echo"<script>alert('data berhasil di hapus');window.location.href='hal_admin.php?module=data_mahasiswa#pos';</script>";
}?>