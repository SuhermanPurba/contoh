<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <?php
        // Cek jika id_dosen ada di GET
        if (isset($_GET['id_dosen'])) {
            $id_dosen = $_GET['id_dosen'];

            // Sanitasi input
            include "koneksi.php";
            $id_dosen = mysqli_real_escape_string($conn, $id_dosen);

            // Query untuk mendapatkan data dosen
            $select = "SELECT * FROM dosen WHERE id_dosen='$id_dosen'";  
            $hasil = mysqli_query($conn, $select);

            if ($hasil && mysqli_num_rows($hasil) > 0) {
                $buff = mysqli_fetch_array($hasil);
        ?>
        <h2>Edit Data Dosen</h2>
        <form action="edit_dosen2.php" method="post">
            <input type="hidden" name="id_dosen" value="<?php echo $buff['id_dosen'];?>" />
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $buff['nama'];?>" required />
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $buff['nip'];?>" required />
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $buff['username'];?>" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $buff['password'];?>" required />
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="text" class="form-control" id="semester" name="semester" value="<?php echo $buff['semester'];?>" required />
            </div>
            <div class="form-group">
                <label for="matkul">Mata Kuliah</label>
                <input type="text" class="form-control" id="matkul" name="matkul" value="<?php echo $buff['matkul'];?>" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $buff['email'];?>" required />
            </div>
            <div class="form-group">
                <label for="notel">No Telp</label>
                <input type="text" class="form-control" id="notel" name="notel" value="<?php echo $buff['notel'];?>" required />
            </div>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
            } else {
                echo "<p>Data dosen tidak ditemukan.</p>";
            }
            mysqli_close($conn);
        } else {
            echo "<p>ID Dosen tidak tersedia.</p>";
        }
        ?>
    </div>
</body>
</html>
