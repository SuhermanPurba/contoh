<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIVERSITAS METHODIST INDONESIA</title>
    <style type="text/css">
        /* Gaya umum untuk body */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6fb1fc, #d9e8fc); /* Latar belakang gradien */
            min-height: 100vh;
            display: flex;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background-color: #fff; /* Latar belakang putih */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Bayangan lembut */
            border-radius: 10px; /* Sudut membulat */
        }

        /* Gaya untuk sidebar */
        .sidebar {
            width: 200px;
            background-color: #f8f9fa; /* Latar belakang sidebar */
            padding: 20px;
            border-right: 2px solid #0056b3; /* Garis batas biru */
            height: 100vh; /* Tinggi penuh */
            position: sticky;
            top: 0; /* Menjaga sidebar tetap di atas saat menggulir */
        }

        .sidebar h2 {
            font-size: 24px;
            color: #0056b3; /* Warna biru */
            margin-bottom: 20px;
            text-align: center;
        }

        .menu-item {
            margin: 10px 0;
        }

        .menu-item a {
            text-decoration: none;
            color: #0056b3; /* Teks biru */
            padding: 10px;
            border: 2px solid #0056b3; /* Garis batas biru */
            border-radius: 5px;
            display: block; /* Membuat tautan menjadi blok */
            transition: background-color 0.3s, color 0.3s; /* Transisi halus */
        }

        .menu-item a:hover {
            background-color: #0056b3; /* Biru saat hover */
            color: #fff; /* Teks putih saat hover */
        }

        /* Gaya untuk konten utama */
        .main-content {
            flex: 1; /* Mengambil sisa ruang */
            padding: 20px;
        }

        /* Gaya judul */
        .title {
            font-size: 36px;
            font-weight: bold;
            color: #0056b3; /* Warna biru */
            text-align: center;
            margin: 20px 0;
            animation: fadeIn 2s ease-in-out; /* Animasi */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Gaya footer */
        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #666;
        }

        /* Gaya untuk foto profil */
        .profile-picture {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .profile-picture img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <div class="menu-item"><a href="hal_mahasiswa.php">Homepage</a></div>
            <div class="menu-item"><a href="?module=bio_mhs#pos">Profil</a></div>
            <div class="menu-item"><a href="?module=pilih_dosen#pos">Penilaian Dosen</a></div>
            <div class="menu-item"><a href="logout.php">Logout</a></div>
        </div>

        <div class="main-content">
            <h1 class ="title">UNIVERSITAS METHODIST INDONESIA</h1>
            <div class="page">
                <?php 
                if (isset($_GET['module'])) {
                    $module = $_GET['module'];
                    if (file_exists("$module.php")) {
                        include "$module.php";
                    } else {
                        echo "<p>Modul tidak ditemukan.</p>";
                    }
                } else {
                    include "mhs.php"; 
                }
                ?>
            </div>

            <div class="footer">
                <p>&copy; 2024. Suherman Purba</p>
            </div>
        </div>

        <!-- Foto profil -->
        <div class="profile-picture">
            <img src="images/profil.jpg" alt="Foto Profil" />
        </div>
    </div>
</body>
</html>