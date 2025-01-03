<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kuisioner</title>
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
        }

        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: auto;
            max-width: 800px;
        }

        .star-rating {
            display: flex;
            justify-content: center;
        }

        .star {
            font-size: 30px;
            color: #d3d3d3; /* Warna bintang tidak terpilih */
            cursor: pointer;
            transition: color 0.3s;
        }

        .star:hover,
        .star.selected {
            color: #ffc107; /* Warna bintang terpilih */
        }
    </style>
</head>
<body>
    <h2>Daftar Kuisioner</h2>
    <a href="?module=daftarBaru_kuisioner#pos" class="btn btn-primary mb-3">Daftar Baru</a>
    
    <div class="table-container">
        <?php
        include "koneksi.php";
        $select = "SELECT * FROM kuisioner";
        $hasil = mysqli_query($conn, $select);
        ?>
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Aksi</th>
                <th>Penilaian</th>
            </tr>

            <?php
            $count = 0;
            while ($buff = mysqli_fetch_array($hasil)) {
                $count++;
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $buff['pertanyaan']; ?></td>
                <td>
                    <a href="?module=edit_kuisioner&id_soal=<?php echo $buff['id_soal']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_kuisioner.php?id_soal=<?php echo $buff['id_soal']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
                <td class="star-rating">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </td>
            </tr>
            <?php
            };
            mysqli_close($conn);
            ?>
        </table>
    </div>

    <script>
        const starRatings = document.querySelectorAll('.star-rating');
        starRatings.forEach(starRating => {
            const stars = starRating.querySelectorAll('.star');
            stars.forEach(star => {
                star.addEventListener('click', () => {
                    stars.forEach(s => s.classList.remove('selected'));
                    star.classList.add('selected');
                    // Lakukan sesuatu dengan nilai rating jika perlu
                    console.log('Rating untuk pertanyaan ini:', star.getAttribute('data-value'));
                });
            });
        });
    </script>
</body>
</html>
