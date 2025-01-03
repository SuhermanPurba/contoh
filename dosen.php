<?php 
// Untuk tampilan home admin
include "koneksi.php";
session_start();

if(!isset($_SESSION['id_dosen'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit;
}

$select = "SELECT * FROM dosen WHERE id_dosen='$_SESSION[id_dosen]'";
$hasil = mysqli_query($conn, $select);
$buff = mysqli_fetch_array($hasil);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuisioner</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .title {
            font-family: 'Patrick Hand', cursive;
            font-size: 36px;
            text-align: center;
            color: #007bbd;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .profile-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            text-align: center;
        }
        .profile-card img {
            border-radius: 5px; /* Ubah menjadi kotak */
            width: 50px; /* Ukuran lebih kecil */
            height: 50px; /* Ukuran lebih kecil */
            margin-bottom: 10px;
        }
        .star-rating {
            display: flex;
            justify-content: center;
        }
        .star {
            font-size: 30px;
            color: #d3d3d3;
            cursor: pointer;
            transition: color 0.3s;
        }
        .star:hover,
        .star.selected {
            color: #ffc107;
        }
    </style>
</head>
<body>

    <h2>Hello, <strong><?php echo $buff['nama']; ?></strong></h2>
    <p>Welcome to Informatics Engineering Of Oxford</p>
    <p>DOSEN</p>
    
    <div class="title">Daftar dan Rating Dosen UMI</div>

    <?php
    $select = "SELECT * FROM hasil_kuisioner 
               INNER JOIN dosen ON hasil_kuisioner.id_dosen = dosen.id_dosen 
               INNER JOIN kuisioner ON hasil_kuisioner.id_soal = kuisioner.id_soal 
               GROUP BY hasil_kuisioner.id_dosen";
    $hasil = mysqli_query($conn, $select);
    $rowcount = mysqli_num_rows($hasil);

    if ($rowcount == 0) {
        echo '<p class="text-center">Belum ada hasil ! :)</p>';
    } else {
        ?>
        <div class="card-container">
            <?php
            while ($buff = mysqli_fetch_array($hasil)) {
                // Mengambil URL gambar profil dari kolom profile_image
                $profileImage = !empty($buff['profile_image']) ? $buff['profile_image'] : 'images/default_profile_image.png'; // Ganti dengan URL gambar default jika kosong
                ?>
               <div class="profile-card">
                    <div class="profile-image">
                        <img src="<?php echo $profileImage; ?>" alt="Foto Profil">
                    </div>
                    <h5><?php echo $buff['nama']; ?></h5>
                    <div class="star-rating" data-rating="<?php echo $totalRating; ?>" onclick="rate(this)">
                        <?php
                        // Hitung total rating
                        $select1 = "SELECT * FROM hasil_kuisioner WHERE id_dosen='" . $buff['id_dosen'] . "'";
                        $hasil1 = mysqli_query($conn, $select1);
                        $nilai1 = $nilai2 = $nilai3 = $nilai4 = $nilai5 = 0;
                        while ($buff1 = mysqli_fetch_array($hasil1)) {
                            switch ($buff1['nilai']) {
                                case 1: $nilai1++; break;
                                case 2: $nilai2++; break;    
                                case 3: $nilai3++; break;
                                case 4: $nilai4++; break;
                                case 5: $nilai5++; break;
                            }
                        }
                        // Hitung rata-rata
                        $totalCount = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5;
                        $totalRating = ($nilai1 * 1 + $nilai2 * 2 + $nilai3 * 3 + $nilai4 * 4 + $nilai5 * 5) / ($totalCount ? $totalCount : 1);
                        for ($i = 1; $i <= 5; $i++): ?>
                            <span class="star <?php echo $i <= $totalRating ? 'selected' : ''; ?>" data-value="<?php echo $i; ?>">&#9734;</span>
                        <?php endfor; ?>
                    </div>
                    <p>Rata-rata: <?php echo number_format($totalRating, 2); ?></p>
                </div>
                <?php
            } 
            ?>
        </div>
    <?php 
    }
    mysqli_close($conn);
    ?>

    <script>
        function rate(starRating) {
            let selectedValue = 0;
            const stars = starRating.querySelectorAll('.star');
            
            stars.forEach((star) => {
                star.addEventListener('click', () => {
                    selectedValue = star.getAttribute('data-value');
                    stars.forEach((s) => {
                        if (s.getAttribute('data-value') <= selectedValue) {
                            s.classList.add('selected');
                        } else {
                            s.classList.remove('selected');
                        }
                    });
                });
            });
        }
    </script>

</body>
</html>
