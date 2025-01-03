<?php
// Periksa apakah session sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];
    $nama_mata_kuliah = $_POST['nama_mata_kuliah'];
    $sks = $_POST['sks'];

    $query = "INSERT INTO mata_kuliah (kode, nama_mata_kuliah, sks) VALUES ('$kode', '$nama_mata_kuliah', '$sks')";
    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success'>Mata kuliah berhasil ditambahkan!</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan mata kuliah: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9f9;
            padding: 20px;
        }
        h2 {
            color: #007bbd;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            margin: auto;
        }
        .btn-custom {
            background-color: #007bbd;
            color: white;
        }
        .btn-custom:hover {
            background-color: #005f8d;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Mata Kuliah</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="kode">Kode Mata Kuliah:</label>
            <input type="text" class="form-control" id="kode" name="kode" required>
        </div>
        <div class="form-group">
            <label for="nama_mata_kuliah">Nama Mata Kuliah:</label>
            <input type="text" class="form-control" id="nama_mata_kuliah" name="nama_mata_kuliah" required>
        </div>
        <div class="form-group">
            <label for="sks">SKS:</label>
            <input type="number" class="form-control" id="sks" name="sks" required min="1">
        </div>
        <button type="submit" class="btn btn-custom">Tambah</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>