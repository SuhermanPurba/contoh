<?php
include "koneksi.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek di tabel mahasiswa
    $queryMahasiswa = "SELECT * FROM mahasiswa WHERE username = ? AND password = ?";
    $stmtMahasiswa = mysqli_prepare($conn, $queryMahasiswa);
    mysqli_stmt_bind_param($stmtMahasiswa, 'ss', $username, $password);
    mysqli_stmt_execute($stmtMahasiswa);
    $resultMahasiswa = mysqli_stmt_get_result($stmtMahasiswa);

    if (mysqli_num_rows($resultMahasiswa) > 0) {
        // Login berhasil sebagai mahasiswa
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = 'mahasiswa'; // Simpan tipe pengguna
        header("Location: dashboard.php");
        exit();
    }

    // Cek di tabel dosen
    $queryDosen = "SELECT * FROM dosen WHERE username = ? AND password = ?";
    $stmtDosen = mysqli_prepare($conn, $queryDosen);
    mysqli_stmt_bind_param($stmtDosen, 'ss', $username, $password);
    mysqli_stmt_execute($stmtDosen);
    $resultDosen = mysqli_stmt_get_result($stmtDosen);

    if (mysqli_num_rows($resultDosen) > 0) {
        // Login berhasil sebagai dosen
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = 'dosen'; // Simpan tipe pengguna
        header("Location: dashboard.php");
        exit();
    }

    echo "Username atau password salah.";
}
?>
