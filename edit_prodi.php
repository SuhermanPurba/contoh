<?php
include "koneksi.php"; // Include your database connection

$id_prodi = $_GET['id'];

// Mengambil data program studi dari database berdasarkan ID
$select = "SELECT * FROM prodi WHERE id_prodi = $id_prodi";
$hasil = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($hasil);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_prodi = $_POST['nama_prodi'];
    $akreditasi = $_POST['akreditasi'];

    // Query untuk mengupdate data program studi
    $update = "UPDATE prodi SET nama_prodi='$nama_prodi', akreditasi='$akreditasi' WHERE id_prodi=$id_prodi";
    
    if (mysqli_query($conn, $update)) {
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
    <title>Edit Program Studi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Edit Program Studi</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nama_prodi">Nama Program Studi:</label>
            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="<?php echo $row['nama_prodi']; ?>" required>
        </div>
        <div class="form-group">
            <label for="akreditasi">Akreditasi:</label>
            <input type="text" class="form-control" id="akreditasi" name="akreditasi" value="<?php echo $row['akreditasi']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="daftar_prodi.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
