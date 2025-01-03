<?php
// Mulai sesi sebelum ada output HTML
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak ada username di sesi, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

include "koneksi.php";

// Mengambil data pengguna dari database berdasarkan username di sesi
$select = "SELECT * FROM user WHERE username = '".$_SESSION['username']."'";
$hasil = mysqli_query($conn, $select);

// Pastikan query berhasil
if ($hasil && mysqli_num_rows($hasil) > 0) {
    $buff = mysqli_fetch_array($hasil);
} else {
    // Jika query gagal atau tidak menemukan pengguna, redirect ke login
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universitas Methodis Indonesia</title>
    
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Link Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style type="text/css">
        /* Custom styles */
        body {
            background: linear-gradient(to bottom right, #e0f7fa, #c1e1ec);
            color: #333;
            font: 18px 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
            min-height: 100vh;
            display: flex; 
        }

        .sidebar {
            width: 250px; 
            padding: 20px;
            background-color: #003366;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            color: #fff;
            margin-right: 20px; 
        }

        .sidebar h2 {
            color: #fff;
            margin-bottom: 15px;
        }

        #navmenu {
            list-style-type: none;
            padding: 0; 
        }

        .menu-item {
            position: relative;
            padding: 10px 20px;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.2s; /* Reduced animation */
            font-size: 18px;
        }

        .menu-item a {
            text-decoration: none;
            color: white; /* Ensure text is readable */
        }

        .menu-item i {
            margin-right: 10px;
        }

        .menu-item:hover {
            background-color: rgba(0,122,204,0.8); /* Slightly transparent hover effect */
            border-radius: 8px;
            transform: scale(1.05);
        }

        .has-child span {
            cursor: pointer;
        }

        .sub-menu {
            display: none;
            background-color: rgba(0,122,204,0.9); /* Slightly transparent for sub-menu */
            border-radius: 8px;
            list-style-type: none;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            padding: 10px;
        }

        .has-child:hover .sub-menu {
            display: block; /* Show submenu on hover */
        }

        .sub-menu-item {
            margin-bottom: 10px;
        }

        .sub-menu-item:hover {
            background-color: #005f99; /* Change background on hover */
            border-radius: 8px; /* Rounded corners on hover */
        }

        .page {
            flex: 1; 
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
            margin-top: 30px;
        }

        .footer {
          padding: 15px;
          background-color: #003366;
          color: white;
          text-align: center;
          font-size: 14px;
          border-radius: 10px;
          box-shadow: 0px -5px 15px rgba(0, 0, 0, 0.2);
          margin-top: 30px;
      }

      /* Styling judul universitas */
      .university-title {
          font-size: 40px;
          font-weight: bold;
          color: #007bff; /* Warna biru */
          text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2); /* Efek bayangan */
          letter-spacing: 2px; /* Spasi antar huruf */
          text-transform: uppercase; /* Huruf kapital semua */
          font-family: 'Arial Black', sans-serif; /* Font keren */
          margin-top: 20px;
          text-align: center;
      }

      .header {
          text-align: center;
          margin-bottom: 30px;
      }

      .logo img {
          width: 150px;
          height: 150px;
          border-radius: 50%;
          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
          margin-bottom: 10px;
      }
   </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="images/th.jpg" alt="University Logo">
        </div>
        <h1 class="university-title">UNIVERSITAS METHODIST INDONESIA</h1>
    </div>
    <div class="container">
        <div class="sidebar">
          <h2>Menu</h2>
          <ul id="navmenu">
              <li class="menu-item"><a href="hal_admin.php"><i class="fas fa-home"></i>Homepage</a></li>
              <li class="menu-item has-child">
                  <span><i class="fas fa-list"></i> Daftar</span>
                  <ul class="menu sub-menu">
                      <li class="menu-item sub-menu-item"><a href="?module=data_dosen#pos"><i class="fas fa-chalkboard-teacher"></i> Data Dosen</a></li>
                      <li class="menu-item sub-menu-item"><a href="?module=data_mahasiswa#pos"><i class="fas fa-user-graduate"></i> Data Mahasiswa</a></li>
                      <li class="menu-item sub-menu-item"><a href="?module=data_mata_kuliah#pos"><i class="fas fa-book"></i> Data Mata Kuliah</a></li>
                      <li class="menu-item sub-menu-item"><a href="?module=data_prodi#pos"><i class="fas fa-layer-group"></i> Data Program Studi</a></li>
                  </ul>
              </li>
              <li class="menu-item has-child">
                  <span><i class="fas fa-clipboard-check"></i> Penilaian Dosen</span>
                  <ul class="menu sub-menu">
                      <li class="menu-item sub-menu-item"><a href="?module=daftarBaru_kuisioner#pos"><i class="fas fa-edit"></i> Buat Pertanyaan</a></li>
                      <li class="menu-item sub-menu-item"><a href="?module=data_kuisioner#pos"><i class="fas fa-question-circle"></i> Daftar Pertanyaan</a></li>
                  </ul>
              </li>
              <li class="menu-item has-child">
                  <span><i class="fas fa-chart-line"></i> Hasil</span>
                  <ul class="menu sub-menu">
                      <li class="menu-item sub-menu-item"><a href="?module=hasil#pos"><i class="fas fa-poll"></i> Hasil Penilaian</a></li>
                      <li class="menu-item sub-menu-item"><a href="print.php"><i class="fas fa-print"></i> Cetak Hasil Penilaian</a></li>
                  </ul>
              </li>
              <li class="menu-item"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
      </div>

      <div class="page">
          <?php if (isset($_GET['module'])) include "$_GET[module].php"; else include "admin.php"; ?>
      </div>
    </div>

    <div class="footer">
      &copy;2024 Universitas Methodist Indonesia. All rights reserved.
    </div>

    <!-- Link Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3 .5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>