<?php
// Periksa apakah session sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php"; // Pastikan file koneksi sudah benar

// Mengambil data program studi dari database
$select = "SELECT * FROM prodi"; // Query ambil data program studi
$hasil = mysqli_query($conn, $select);

if (!$hasil) {
    die("Error dalam menjalankan query: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Studi</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #e0f7fa, #c1e1ec);
            padding: 20px;
            margin: 0;
        }

        .header {
            background-color: #003366;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .header h2 {
            margin-bottom: 10px;
        }

        .header a {
            text-decoration: none;
            color: #fff;
            background-color: #005f99;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .header a:hover {
            background-color: #007bff;
        }

        .table-container {
            max-width: 800px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #003366;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .btn {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }

        h2 {
            font-size: 24px;
            color: #3f51b5;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Daftar Program Studi</h2>
    <a href="tambah_prodi.php" class="btn btn-success">Tambah Program Studi</a>
</div>

<div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Program Studi</th>
            <th>Akreditasi</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (mysqli_num_rows($hasil) > 0) {
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id_prodi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama_prodi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['akreditasi']) . "</td>";
                echo "<td>
                    <a href='edit_prodi.php?id=" . urlencode($row['id_prodi']) . "' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_prodi.php?id=" . urlencode($row['id_prodi']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a>
 </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data program studi.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>