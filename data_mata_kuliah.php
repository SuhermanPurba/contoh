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

// Mengambil data mata kuliah dari database
$select = "SELECT * FROM mata_kuliah";
$hasil = mysqli_query($conn, $select);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mata Kuliah</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #e0f7fa, #c1e1ec);
            padding: 20px;
            margin: 0;
            overflow-x: hidden;
        }

        /* Salju */
        .snowflakes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .snowflake {
            position: absolute;
            top: -10px;
            z-index: 9999;
            width: 10px;
            height: 10px;
            background: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(100vh);
            }
        }

        @keyframes sway {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(20px);
            }
            100% {
                transform: translateX(0);
            }
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

<!-- Animasi salju -->
<div class="snowflakes">
    <div class="snowflake" style="left: 10%; animation: fall 8s linear infinite, sway 4s ease-in-out infinite;"></div>
    <div class="snowflake" style="left: 20%; animation: fall 10s linear infinite, sway 3s ease-in-out infinite;"></div>
    <div class="snowflake" style="left: 30%; animation: fall 12s linear infinite, sway 5s ease-in-out infinite;"></div>
    <div class="snowflake" style="left: 40%; animation: fall 9s linear infinite, sway 6s ease-in-out infinite;"></div>
    <div class="snowflake" style="left: 50%; animation: fall 7s linear infinite, sway 4s ease-in-out infinite;"></div>
    <div class="snowflake" style="left: 60%; animation: fall 11s linear infinite, sway 5s ease-in-out infinite;"></div>
    <div class="snowflake" style="left: 70%; animation: fall 13s linear infinite, sway 6s ease-in-out infinite;"></div>
    <div class="snowflake" style="left: 80%; animation: fall 10s linear infinite, sway 3s ease-in-out infinite;"></div>
</div>

<div class="header">
    <h2>Daftar Mata Kuliah</h2>
    <!-- Tambahkan tombol tambah mata kuliah -->
    <a href="tambah_mata_kuliah.php" class="btn btn-success btn-lg">Tambah Mata Kuliah</a>
</div>
<div class="table-container">
    <table>
        <tr>
            <th>Kode Mata Kuliah</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (mysqli_num_rows($hasil) > 0) {
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['kode']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama_mata_kuliah']) . "</td>";
                echo "<td>" . htmlspecialchars($row['sks']) . "</td>";
                echo "<td>
                    <a href='edit_mata_kuliah.php?kode=" . urlencode($row['kode']) . "' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_mata_kuliah.php?kode=" . urlencode($row['kode']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus mata kuliah ini?\");'>Hapus</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data mata kuliah.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>