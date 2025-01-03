<?php
include "koneksi.php"; // Include your database connection

$id_prodi = $_GET['id'];

// Query untuk menghapus program studi
$delete = "DELETE FROM prodi WHERE id_prodi = $id_prodi";

if (mysqli_query($conn, $delete)) {
    header("Location: data_prodi.php"); // Redirect ke daftar program studi setelah sukses
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
