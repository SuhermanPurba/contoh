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

// Mengambil data mahasiswa dari database
$select = "SELECT * FROM mahasiswa";
$hasil = mysqli_query($conn, $select);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

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
    </style>
</head>
<body>

<div class="header">
    <h2>Daftar Mahasiswa</h2>
    <a href="?module=daftarBaru_mahasiswa#pos" class="btn btn-success">Daftar Baru</a>
</div>

<div class="table-container">
    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Semester</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (mysqli_num_rows($hasil) > 0) {
            $no = 1; // Nomor urut
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($no++) . "</td>";
                echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                echo "<td>" . htmlspecialchars($row['semester']) . "</td>";
                echo "<td>" . htmlspecialchars($row['angkatan']) . "</td>";
                echo "<td>
                    <a href='?module=edit_mhs&id_mahasiswa=" . urlencode($row['id_mahasiswa']) . "' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_mhs.php?id_mahasiswa=" . urlencode($row['id_mahasiswa']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada data mahasiswa.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>