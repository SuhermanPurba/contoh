<?php
ob_start(); // Memulai output buffering

// Memastikan session dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect jika user belum login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php"; // Pastikan file koneksi sudah benar

// Mengambil data dosen dari database
$select = "SELECT * FROM dosen"; // Query ambil data dosen
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
    <title>Daftar Dosen</title>
    <style>
        /* Tambahkan gaya CSS di sini */
        body {
            background: linear-gradient(to bottom right, #e0f7fa, #c1e1ec);
            color: #333;
            font: 18px 'Arial', sans-serif;
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
            margin-top: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #003366;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-sm {
            padding: 5px 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Daftar Dosen</h2>
    <a href="?module=daftarBaru_dosen#pos" class="btn btn-success">Daftar Baru</a>
</div>

<div class="table-container">
    <table>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Semester</th>
            <th>Matkul</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (mysqli_num_rows($hasil) > 0) {
            $no = 1; // Nomor urut
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($no++) . "</td>";
                echo "<td>" . htmlspecialchars($row['nip']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                echo "<td>" . htmlspecialchars($row['semester']) . "</td>";
                echo "<td>" . htmlspecialchars($row['matkul']) . "</td>";
                echo "<td>
                    <a href='?module=edit_dosen&id_dosen=" . urlencode($row['id_dosen']) . "' class='btn btn -warning btn-sm'>Edit</a>
                    <a href='hapus_dosen.php?id_dosen=" . urlencode($row['id_dosen']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada data dosen.</td></tr>";
        }
        ?>
    </table>
</div>

<?php
ob_end_flush(); // Mengirim output ke browser setelah semuanya siap
?>
</body>
</html>