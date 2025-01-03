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

// Periksa apakah kode mata kuliah telah diterima
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    // Mengambil data mata kuliah berdasarkan kode
    $query = "SELECT * FROM mata_kuliah WHERE kode = '$kode'";
    $hasil = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($hasil);

    if (isset($_POST['update'])) {
        $nama_mata_kuliah = $_POST['nama_mata_kuliah'];
        $sks = $_POST['sks'];

        // Query untuk update data mata kuliah
        $updateQuery = "UPDATE mata_kuliah SET nama_mata_kuliah = '$nama_mata_kuliah', sks = '$sks' WHERE kode = '$kode'";
        if (mysqli_query($conn, $updateQuery)) {
            header("Location: data_mata_kuliah.php");
            exit();
        } else {
            echo "Gagal mengupdate data mata kuliah.";
        }
    }
} else {
    echo "Kode mata kuliah tidak ditemukan!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
</head>
<body>
    <h2>Edit Mata Kuliah</h2>
    <form method="POST">
        <label>Nama Mata Kuliah</label>
        <input type="text" name="nama_mata_kuliah" value="<?php echo $row['nama_mata_kuliah']; ?>" required><br><br>

        <label>SKS</label>
        <input type="number" name="sks" value="<?php echo $row['sks']; ?>" required><br><br>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
