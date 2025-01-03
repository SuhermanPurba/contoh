<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIVERSITAS METHODIS</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('images/bg.jpg') no-repeat center center fixed; /* Ganti dengan jalur gambar latar belakang HD */
            background-size: cover; /* Mengatur gambar agar menutupi seluruh latar belakang */
            color: #333; /* Warna teks */
            margin: 0;
            padding: 0;
        }

        .univ {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin: 20px 0;
            color: #3f51b5; /* Warna biru */
        }

        .logo {
            text-align: center;
            margin-bottom: 20px; /* Jarak antara logo dan judul */
        }

        .kotak_login {
            width: 400px; /* Lebar kotak */
            background: rgba(255, 255, 255, 0.9); /* Warna kotak putih dengan transparansi */
            padding: 30px; /* Padding di dalam kotak */
            border-radius: 10px; /* Sudut bulat */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Bayangan */
            margin: 0 auto; /* Mengatur posisi di tengah */
            transition: transform 0.3s ease; /* Transisi saat hover */
        }

        .kotak_login:hover {
            transform: scale(1.02); /* Sedikit membesar saat hover */
        }

        .tulisan_login {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #3f51b5; /* Warna biru */
        }

        .form_login {
            width: 100%; /* Lebar input 100% */
            padding: 10px; /* Padding dalam input */
            margin: 10px 0; /* Margin di atas dan bawah */
            border: 1px solid #ccc; /* Garis border */
            border-radius: 5px; /* Sudut bulat input */
            box-sizing: border-box; /* Memastikan padding dan border tidak mempengaruhi lebar */
        }

        .form_login:focus {
            border-color: #3f51b5; /* Warna border saat fokus */
            box-shadow: 0 0 5px rgba(63, 81, 181, 0.5); /* Bayangan saat fokus */
        }

        .tombol_login {
            width: 100%; /* Lebar tombol 100% */
            background: #3f51b5; /* Warna tombol biru */
            color: white; /* Warna teks tombol */
            border: none; /* Tidak ada border */
            padding: 10px; /* Padding dalam tombol */
            border-radius: 5px; /* Sudut bulat tombol */
            cursor: pointer; /* Menunjukkan pointer saat hover */
            font-size: 16px; /* Ukuran font tombol */
            transition: background-color 0.3s ease; /* Transisi warna tombol */
        }

        .tombol_login:hover {
            background: #303f9f; /* Warna saat hover */
        }

        .tombol_register {
            display: inline-block; /* Menampilkan tautan sebagai blok */
            margin-top: 10px; /* Margin atas untuk tautan */
            color: #3f51b5; /* Warna tautan */
            font-weight: bold; /* Tebal untuk tautan */
        }

        .tombol_register:hover {
            text-decoration: underline; /* Garis bawah saat hover */
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="images/th.jpg" alt="Logo Universitas Methodis" width="100" height="100"> <!-- Ganti dengan jalur logo -->
    </div>
    <div class="univ">UNIVERSITAS METHODIS</div>
    <div class="kotak_login">
        <p class="tulisan_login">Silahkan Login</p>
        <form action="loginproc.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" required>
            <label>Password</label>
            <input type="password" name="password" class="form_login" required>
            <input type="submit" class="tombol_login" value="Login">
        </form>
        <p><a href="register.php" class="tombol_register">Daftar</a></p> <!-- Tombol Register -->
    </div>
</body>
</html>
