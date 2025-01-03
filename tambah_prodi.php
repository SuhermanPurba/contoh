<?php
include "koneksi.php"; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_prodi = $_POST['nama_prodi'];
    $akreditasi = $_POST['akreditasi'];

    // Query untuk menyimpan data program studi ke database
    $insert = "INSERT INTO prodi (nama_prodi, akreditasi) VALUES ('$nama_prodi', '$akreditasi')";
    
    if (mysqli_query($conn, $insert)) {
        header("Location: data_prodi.php"); // Redirect ke daftar program studi setelah sukses
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Program Studi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Tambah Program Studi</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nama_prodi">Nama Program Studi:</label>
            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
        </div>
        <div class="form-group">
            <label for="akreditasi">Akreditasi:</label>
            <input type="text" class="form-control" id="akreditasi" name="akreditasi" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="daftar_prodi.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
