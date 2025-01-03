<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna - UNIVERSITAS METHODIS</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4; /* Warna latar belakang */
            color: #333; /* Warna teks */
            margin: 0;
            padding: 0;
        }

        .univ {
            text-align: center;
            font-size: 28px; /* Ukuran font judul lebih besar */
            font-weight: bold;
            margin: 20px 0;
            color: #e91e63; /* Warna ungu cerah */
        }

        .logo {
            text-align: center;
            margin-bottom: 20px; /* Jarak antara logo dan judul */
        }

        .kotak_login {
            width: 400px; /* Lebar kotak */
            background: white; /* Warna kotak */
            padding: 30px; /* Padding di dalam kotak */
            border-radius: 10px; /* Sudut bulat */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Bayangan */
            margin: 0 auto; /* Mengatur posisi di tengah */
        }

        .tulisan_login {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px; /* Ukuran font tulisan login lebih besar */
            font-weight: bold;
            color: #4a4a4a; /* Warna teks lebih gelap */
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
            border-color: #2196F3; /* Warna border saat fokus */
            box-shadow: 0 0 5px rgba(33, 150, 243, 0.5); /* Bayangan saat fokus */
        }

        .tombol_login {
            width: 100%; /* Lebar tombol 100% */
            background: #2196F3; /* Warna biru tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Tidak ada border */
            padding: 10px; /* Padding dalam tombol */
            border-radius: 5px; /* Sudut bulat tombol */
            cursor: pointer; /* Menunjukkan pointer saat hover */
            font-size: 16px; /* Ukuran font tombol */
            transition: background-color 0.3s ease; /* Transisi warna tombol */
        }

        .tombol_login:hover {
            background: #1976D2; /* Warna saat hover */
        }

        label {
            display: block; /* Menampilkan label sebagai blok */
            margin-top: 10px; /* Margin atas label */
            font-weight: bold; /* Tebal label */
        }

        input[type="radio"] {
            margin-right: 5px; /* Margin kanan untuk radio button */
        }

        a {
            text-decoration: none; /* Menghapus garis bawah pada tautan */
            color: #e91e63; /* Warna tautan */
        }

        a:hover {
            text-decoration: underline; /* Garis bawah saat hover */
        }
    </style>
    <script>
        function toggleMahasiswaForm() {
            const mahasiswaForm = document.getElementById('mahasiswaForm');
            const dosenForm = document.getElementById('dosenForm');
            const isMahasiswaSelected = document.getElementById('mahasiswa').checked;
            const isDosenSelected = document.getElementById('dosen').checked;

            // Tampilkan atau sembunyikan formulir mahasiswa
            mahasiswaForm.style.display = isMahasiswaSelected ? 'block' : 'none';

            // Tampilkan atau sembunyikan formulir dosen
            dosenForm.style.display = isDosenSelected ? 'block' : 'none';
        }

        // Tambahkan event listener untuk menampilkan formulir mahasiswa jika di-click
        window.onload = function() {
            const mahasiswaRadio = document.getElementById('mahasiswa');
            const dosenRadio = document.getElementById('dosen');
            mahasiswaRadio.onclick = toggleMahasiswaForm;
            dosenRadio.onclick = toggleMahasiswaForm;
        };
    </script>
</head>
<body>
    <div class="logo">
        <img src="images/th.jpg" alt="Logo Universitas Methodis" width="100" height="100"> <!-- Ganti dengan jalur logo -->
    </div>
    <div class="univ">UNIVERSITAS METHODIS</div>
    <div class="kotak_login">
        <p class="tulisan_login">Silahkan Daftar</p>
        <form action="registerproc.php" method="post" enctype="multipart/form-data">
            <label>Nama</label>
            <input type="text" name="nama" class="form_login" required>
            <label>Username</label>
            <input type="text" name="username" class="form_login" required>
            <label>Password</label>
            <input type="password" name="password" class="form_login" required>
            
            <label>Anda mendaftar sebagai:</label><br>
            <input type="radio" name="level" value="mahasiswa" id="mahasiswa" required>
            <label for="mahasiswa">Mahasiswa</label><br>
            <input type="radio" name="level" value="dosen" id="dosen" required>
            <label for="dosen">Dosen</label><br>

            <!-- Formulir untuk Mahasiswa -->
            <div id="mahasiswaForm" style="display:none;">
                <label>Semester</label>
                <input type="text" name="semester" class="form_login" required>
                <label>NIM</label>
                <input type="text" name="nim" class="form_login" required>
                <label>Jurusan</label>
                <input type="text" name="jur" class="form_login" required>
                <label>Jenjang</label>
                <input type="text" name="jenjang" class="form_login" required>
                <label>Angkatan</label>
                <input type="text" name="angkatan" class="form_login" required>
                <label>Unggah Foto Profil</label>
                <input type="file" name="profile_image" class="form_login"> <!-- Input file untuk foto profil -->
            </div>

            <!-- Formulir untuk Dosen -->
            <div id="dosenForm" style="display:none;">
                <label>Semester</label>
                <input type="text" name="semester" class="form_login" required>
                <label>Mata Kuliah</label>
                <input type="text" name="matkul" class="form_login" required>
                <label>NIP</label>
                <input type="text" name="nip" class="form_login" required>
                <label>Jurusan</label>
                <input type="text" name="jur" class="form_login" required>
                <label>Email</label>
                <input type="email" name="email" class="form_login" required>
                <label>Nomor Telepon</label>
                <input type="text" name="notel" class="form_login" required>
                <label>Unggah Foto Profil</label>
                <input type="file" name="profile_image" class="form_login"> <!-- Input file untuk foto profil -->
            </div>

            <input type="submit" class="tombol_login" value="Daftar">
        </form>
        <p><a href="login.php" class="tombol_login">Kembali ke Login</a></p> <!-- Kembali ke Login -->
    </div>
</body>
</html>
