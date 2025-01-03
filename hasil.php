<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuisioner</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        h2 {
            text-align: center;
            color: #007bbd;
            margin-bottom: 30px;
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
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .no-data {
            text-align: center;
            font-size: 18px;
            color: #888;
        }
        .table thead {
            background-color: #007bbd;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .bar-chart {
            margin-top: 30px;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php
include "koneksi.php";

// Query untuk mengambil hasil kuisioner
$select = "SELECT * FROM hasil_kuisioner 
           INNER JOIN dosen ON hasil_kuisioner.id_dosen=dosen.id_dosen 
           INNER JOIN kuisioner ON hasil_kuisioner.id_soal=kuisioner.id_soal 
           GROUP BY hasil_kuisioner.id_dosen";
$hasil = mysqli_query($conn, $select);
$rowcount = mysqli_num_rows($hasil);

// Memeriksa apakah ada data
if ($rowcount == 0) {
    echo '<p class="no-data">Belum ada hasil! :)</p>';
} else {
    ?>
    <div class="table-container">
        <h2>Hasil Kuisioner</h2>
        <div class="row">
            <?php
            $count = 0;
            while ($buff = mysqli_fetch_array($hasil)) {
                $count++;
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo htmlspecialchars($buff['nama']); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="star-rating">
                                <?php
                                // Menghitung rating
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

                                // Rata-rata
                                $totalCount = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5;
                                $totalRating = ($nilai1 * 1 + $nilai2 * 2 + $nilai3 * 3 + $nilai4 * 4 + $nilai5 * 5) / ($totalCount ? $totalCount : 1);
                                for ($i = 1; $i <= 5; $i++): ?>
                                    <span class="star <?= $i <= $totalRating ? 'selected' : ''; ?>">★</span>
                                <?php endfor; ?>
                            </div>
                            <div class="mt-3">
                                <strong>Nilai:</strong>
                                <ul class="list-unstyled">
                                    <li>1: <?php echo $nilai1; ?></li>
                                    <li>2: <?php echo $nilai2; ?></li>
                                    <li>3: <?php echo $nilai3; ?></li>
                                    <li>4: <?php echo $nilai4; ?></li>
                                    <li>5: <?php echo $nilai5; ?></li>
                                </ul>
                            </div>
                            <div>
                                <strong>Rata-rata:</strong> <?php echo number_format($totalRating, 2); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } 
            ?>
        </div>
    </div>
<?php 
}
mysqli_close($conn);
?>

<div class="bar-chart">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Pertanyaan', 'Rata-rata'],
                <?php
                // Reopen connection to fetch data for chart
                include "koneksi.php";
                $select1 = "SELECT * FROM hasil_kuisioner 
                             INNER JOIN dosen ON hasil_kuisioner.id_dosen=dosen.id_dosen 
                             INNER JOIN kuisioner ON hasil_kuisioner.id_soal=kuisioner.id_soal 
                             GROUP BY hasil_kuisioner.id_dosen";
                $hasil1 = mysqli_query($conn, $select1);
                $count = 0; 
                while ($buff = mysqli_fetch_array($hasil1)) {
                    $count++;
                    // Menghitung nilai
                    $select2 = "SELECT * FROM hasil_kuisioner WHERE id_dosen='" . $buff['id_dosen'] . "'";
                    $hasil2 = mysqli_query($conn, $select2);
                    $nilai1 = $nilai2 = $nilai3 = $nilai4 = $nilai5 = 0;

                    while ($buff2 = mysqli_fetch_array($hasil2)) {
                        switch ($buff2['nilai']) {
                            case 1: $nilai1++; break;
                            case 2: $nilai2++; break;    
                            case 3: $nilai3++; break;
                            case 4: $nilai4++; break;
                            case 5: $nilai5++; break;
                        }
                    } 
                    
                    // Rata-rata
                    $totalCount = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5;
                    $totalRating = ($nilai1 * 1 + $nilai2 * 2 + $nilai3 * 3 + $nilai4 * 4 + $nilai5 * 5) / ($totalCount ? $totalCount : 1);
                    echo "['Pertanyaan " . $count . "', " . number_format($totalRating, 2) . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Hasil Kuesioner',
                width: 800,
                legend: { position: 'none' },
                chart: { title: 'Hasil Kuesioner',
                         subtitle: 'Berdasarkan keputusan Mahasiswa' },
                bars: 'vertical',
                axes: {
                    x: {
                        0: { side: 'top', label: 'Pertanyaan ' }
                    },
                    y: {
                        0: { side: 'left', label: 'Rata-rata ' }
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
