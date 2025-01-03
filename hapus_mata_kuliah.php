<?php
// Periksa apakah session sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php";

// Periksa apakah kode mata kuliah diterima
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    // Query untuk menghapus data mata kuliah
    $deleteQuery = "DELETE FROM mata_kuliah WHERE kode = '$kode'";
    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: data_mata_kuliah.php");
        exit();
    } else {
        echo "Gagal menghapus data mata kuliah.";
    }
} else {
    echo "Kode mata kuliah tidak ditemukan!";
}
?>
