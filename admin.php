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
            border-radius: 50%;
            width: 80px;
            height: 80px;
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
        .bar-chart {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .bar {
            height: 10px; /* Tinggi bar */
            background-color: #007bbd; /* Warna bar */
            border-radius: 5px; /* Sudut melengkung pada bar */
        }
    </style>
</head>
<body>

    <div class="title">Daftar dan Rating Dosen UMI</div>

    <?php
    include "koneksi.php";

    $select = "SELECT * FROM hasil_kuisioner 
               INNER JOIN dosen ON hasil_kuisioner.id_dosen=dosen.id_dosen 
               INNER JOIN kuisioner ON hasil_kuisioner.id_soal=kuisioner.id_soal 
               GROUP BY hasil_kuisioner.id_dosen";
    $hasil = mysqli_query($conn, $select);
    $rowcount = mysqli_num_rows($hasil);

    if ($rowcount == 0) {
        echo '<p class="text-center">Belum ada hasil ! :)</p>';
    } else {
        echo '<div class="card-container">';
        
        while ($buff = mysqli_fetch_array($hasil)) {
            // Mengambil URL gambar profil dari kolom profile_image
            $profileImage = !empty($buff['profile_image']) ? $buff['profile_image'] : 'images/default_profile_image.png'; // Ganti dengan URL gambar default jika kosong
            
            // Menghitung total rating
            $select1 = "SELECT * FROM hasil_kuisioner WHERE id_dosen='" . $buff['id_dosen'] . "'";
            $hasil1 = mysqli_query($conn, $select1);
            
            // Inisialisasi nilai rating
            $nilai1 = $nilai2 = $nilai3 = $nilai4 = $nilai5 = 0;

            while ($buff1 = mysqli_fetch_array($hasil1)) {
                switch ($buff1['nilai']) {
                    case 1:
                        $nilai1++;
                        break;
                    case 2:
                        $nilai2++;
                        break;    
                    case 3:
                        $nilai3++;
                        break;
                    case 4:
                        $nilai4++;
                        break;
                    case 5:
                        $nilai5++;
                        break;
                }
            }

            // Menghitung rata-rata
            $totalCount = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5;
            $totalRating = ($nilai1 * 1 + $nilai2 * 2 + $nilai3 * 3 + $nilai4 * 4 + $nilai5 * 5) / ($totalCount ? $totalCount : 1);
            
            // Menampilkan kartu dosen
            echo '<div class="profile-card">';
                echo '<div class="profile-image">';
                    echo '<img src="' . htmlspecialchars($profileImage) . '" alt="Foto Profil">';
                echo '</div>';
                echo '<h5>' . htmlspecialchars($buff['nama']) . '</h5>';
                echo '<div class="star-rating" data-rating="' . number_format($totalRating, 2) . '" onclick="rate(this)">';
                
                for ($i = 1; $i <= 5; $i++) {
                    echo '<span class="star ' . ($i <= round($totalRating) ? 'selected' : '') . '" data-value="' . $i . '">&#9734;</span>';
                }

                echo '</div>';
                echo '<p>Rata-rata: ' . number_format($totalRating, 2) . '</p>';

                // Menampilkan bagan balok
                echo '<div class="bar-chart">';
                    echo '<div class="bar" style="width:' . ($totalCount ? ($nilai1 / $totalCount) * 100 : 0) . '%;"></div>';
                    echo '<div class="bar" style="width:' . ($totalCount ? ($nilai2 / $totalCount) * 100 : 0) . '%;"></div>';
                    echo '<div class="bar" style="width:' . ($totalCount ? ($nilai3 / $totalCount) * 100 : 0) . '%;"></div>';
                    echo '<div class="bar" style="width:' . ($totalCount ? ($nilai4 / $totalCount) * 100 : 0) . '%;"></div>';
                    echo '<div class="bar" style="width:' . ($totalCount ? ($nilai5 / $totalCount) * 100 : 0) . '%;"></div>';
                echo '</div>'; // End of bar-chart

            echo '</div>'; // End of profile-card
        }
        
        echo '</div>'; // End of card-container
    }

    mysqli_close($conn);
    ?>

    <script>
        function rate(starRating) {
            let selectedValue = null; // Inisialisasi nilai yang dipilih
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