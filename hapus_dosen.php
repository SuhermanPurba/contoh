<?php
// UNTUK MENGHAPUS DOSEN HANYA MEMBUTUHKAN ID SAJA
include "koneksi.php";

// Mengambil id_dosen dari URL
$id_dosen = $_GET['id_dosen'];

// Pastikan id_dosen tidak kosong
if (empty($id_dosen)) {
    echo "<script>alert('ID dosen tidak valid.'); window.location.href='hal_admin.php?module=data_dosen#pos';</script>";
    exit;
}

// Query untuk menghapus dosen
$hapus = "DELETE FROM dosen WHERE id_dosen='$id_dosen'";
$hasil = mysqli_query($conn, $hapus);

// Cek apakah query berhasil
if ($hasil) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href='hal_admin.php?module=data_dosen#pos';</script>";
} else {
    echo "<script>alert('Gagal menghapus data. Silakan coba lagi.'); window.location.href='hal_admin.php?module=data_dosen#pos';</script>";
}

// Menutup koneksi
mysqli_close($conn);
?>
