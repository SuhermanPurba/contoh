<?php
session_start(); // Memulai sesi di atas

include "koneksi.php"; // Menghubungkan ke database

// Query untuk mengambil semua data dosen
$select = "SELECT * FROM dosen"; 
$hasil = mysqli_query($conn, $select);

// Debugging: Cek apakah query berhasil
if (!$hasil) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bbd;
        }
        .table-container {
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #dee2e6;
        }
        th {
            background-color: #007bbd;
            color: white;
        }
        tr:hover {
            background-color: #e9ecef;
        }
        .form-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            display: inline-block;
            width: auto;
            margin-right: 10px;
        }
        .tombol_sc {
            background-color: #007bbd;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .tombol_sc:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h2>Pilih Dosen</h2>
    
    <div class="form-container">
        <form action="?module=cari#pos" method="post">
            <input type="hidden" name="module" value="cari"/>
            <input type="text" name="matkul" placeholder="Ketikkan mata kuliah" required class="form-control"/>
            <input type="submit" value="Cari" class="tombol_sc"/>
        </form>
    </div>
    
    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Aksi</th>
            </tr>
            
            <?php
            $count = 0;
            if (mysqli_num_rows($hasil) > 0) {
                while ($buff = mysqli_fetch_array($hasil)) {
                    $count++;
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo htmlspecialchars($buff['matkul']); ?></td>
                <td><?php echo htmlspecialchars($buff['nama']); ?></td>
                <td><a href="?module=kuis&id_dosen=<?php echo $buff['id_dosen']; ?>" class="btn btn-info btn-sm">Isi Angket</a></td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data ditemukan.</td></tr>";
            }
            ?>
        </table>
    </div>
    
    <?php
    mysqli_close($conn); // Menutup koneksi database
    ?>
    <br />
</body>
</html>
