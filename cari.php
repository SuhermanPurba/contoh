<?php
session_start(); // Pindahkan session_start() ke sini

include "koneksi.php"; // Pastikan koneksi ke database sebelum melakukan query

// Pastikan semester telah diset
if (!isset($_SESSION['semester'])) {
    echo "Semester belum ditentukan.";
    exit; // Menghentikan eksekusi jika semester tidak tersedia
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Warna latar belakang */
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333; /* Warna teks judul */
        }

        form {
            margin-bottom: 20px; /* Jarak bawah form */
            display: flex; /* Menampilkan form dengan flexbox */
            gap: 10px; /* Jarak antar elemen form */
        }

        input[type="text"] {
            flex: 1; /* Membuat input teks mengisi ruang */
            padding: 10px; /* Padding dalam input */
            border: 1px solid #ccc; /* Border input */
            border-radius: 5px; /* Sudut bulat input */
            font-size: 16px; /* Ukuran font */
        }

        .tombol_sc {
            background-color: #3f51b5; /* Warna tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Tanpa border */
            padding: 10px 15px; /* Padding dalam tombol */
            border-radius: 5px; /* Sudut bulat tombol */
            cursor: pointer; /* Pointer saat hover */
            transition: background-color 0.3s ease; /* Transisi warna tombol */
            font-size: 16px; /* Ukuran font tombol */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan tombol */
        }

        .tombol_sc:hover {
            background-color: #303f9f; /* Warna saat hover */
        }

        table {
            width: 100%; /* Lebar tabel 100% */
            border-collapse: collapse; /* Menggabungkan border tabel */
            margin-top: 20px; /* Jarak atas tabel */
        }

        th, td {
            padding: 10px; /* Padding dalam sel */
            text-align: left; /* Teks rata kiri */
            border: 1px solid #ddd; /* Border sel */
        }

        th {
            background-color: #3f51b5; /* Warna latar belakang header tabel */
            color: white; /* Warna teks header tabel */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Warna latar belakang untuk baris genap */
        }

        tr:hover {
            background-color: #ddd; /* Warna saat hover baris */
        }

        p {
            color: #555; /* Warna teks */
        }

        .btn-isi-angket {
            display: inline-block; /* Menampilkan sebagai blok inline */
            background-color: #4CAF50; /* Warna tombol */
            color: white; /* Warna teks tombol */
            text-decoration: none; /* Menghilangkan garis bawah */
            padding: 8px 12px; /* Padding dalam tombol */
            border-radius: 5px; /* Sudut bulat tombol */
            transition: background-color 0.3s; /* Transisi warna tombol */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan tombol */
        }

        .btn-isi-angket:hover {
            background-color: #45a049; /* Warna saat hover */
        }
    </style>
</head>
<body>

<h2>Hasil Pencarian</h2>

<form action="?module=cari#pos" method="post">
    <input type="hidden" name='module' value="cari"/>
    <input type="text" name="matkul" placeholder="<?php echo isset($_POST['matkul']) ? htmlspecialchars($_POST['matkul']) : ''; ?>"/>
    <input type="submit" value="Cari" class="tombol_sc"/>
</form>
<br/>

<?php
// Cek apakah matkul ada dalam POST
if (isset($_POST['matkul'])) {
    $matkul = $_POST['matkul'];
    $semester = $_SESSION['semester'];
    $select = "SELECT * FROM dosen WHERE matkul LIKE '%$matkul%' AND dosen.semester='$semester'"; // Perbaiki query dengan menambahkan '%' setelah $matkul
    $hasil = mysqli_query($conn, $select);

    // Cek jika hasil query kosong
    if (mysqli_num_rows($hasil) > 0) {
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Aksi</th>
                </tr>';

        $count = 0;
        while ($buff = mysqli_fetch_array($hasil)) {
            $count++;
            echo '<tr>
                    <td>' . $count . '</td>
                    <td>' . htmlspecialchars($buff['matkul']) . '</td>
                    <td>' . htmlspecialchars($buff['nama']) . '</td>
                    <td><a href="?module=kuis&id_dosen=' . htmlspecialchars($buff['id_dosen']) . '" class="btn-isi-angket">Isi Angket</a></td>
                </tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Tidak ada hasil untuk pencarian "' . htmlspecialchars($matkul) . '"</p>';
    }
}

// Tutup koneksi database
mysqli_close($conn);
?>

<br/> 
</body>
</html>
