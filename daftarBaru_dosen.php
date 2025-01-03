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
    <h2>Daftar Baru Dosen</h2>
    <div class="form-container">
        <form action="daftarBaru_dosen2.php" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="text" name="semester" id="semester" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="matkul">Mata Kuliah</label>
                <input type="text" name="matkul" id="matkul" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="notel">No Telp</label>
                <input type="text" name="notel" id="notel" class="form-control"/>
            </div>
            <div class="btn-container">
                <input type="reset" value="Reset" class="btn btn-reset" />
                <input type="submit" value="Submit" class="btn" />
            </div>
        </form>
    </div>
</body>
</html>
