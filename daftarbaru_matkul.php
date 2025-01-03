<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Baru Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bbd; /* Warna biru untuk judul */
            font-weight: bold;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border: 1px solid #007bbd;
            border-radius: 5px;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #0056b3; /* Warna biru gelap saat fokus */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .btn:hover {
            background-color: #218838; /* Warna lebih gelap saat hover */
        }

        .btn-reset {
            background-color: #dc3545;
        }

        .btn-reset:hover {
            background-color: #c82333; /* Warna lebih gelap saat hover */
        }

        .btn-container {
            text-align: right;
        }

        .tombol_sc {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        /* Gaya untuk mengatur warna tombol */
        .tombol_sc {
            background-color: #007bbd; /* Warna biru untuk tombol */
            color: white; /* Warna teks tombol */
        }

        .tombol_sc:hover {
            background-color: #0056b3; /* Warna lebih gelap saat hover */
        }
    </style>
</head>
<body>
</table>
<div class="page">
    <h2>Tambah Data Mata Kuliah</h2>
    <form action="tambah_mata_kuliah.php" method="POST">
        <label for="kode">Kode Mata Kuliah:</label>
        <input type="text" id="kode" name="kode" required><br><br>

        <label for="nama">Nama Mata Kuliah:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="sks">SKS:</label>
        <input type="number" id="sks" name="sks" required><br><br>

        <input type="submit" value="Tambah Mata Kuliah">
    </form>
</div>
</body>
</html>