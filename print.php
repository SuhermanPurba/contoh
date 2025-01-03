<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Hasil Penilaian</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #007bbd;
            margin-bottom: 20px;
        }
        table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background-color: #007bbd;
            color: white;
        }
        .chart-container {
            margin-top: 45px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Hasil Penilaian</h2>
        <?php
        include "koneksi.php";

        $select = "SELECT * FROM hasil_kuisioner 
                   INNER JOIN dosen ON hasil_kuisioner.id_dosen = dosen.id_dosen 
                   INNER JOIN kuisioner ON hasil_kuisioner.id_soal = kuisioner.id_soal 
                   GROUP BY hasil_kuisioner.id_dosen";
        $hasil = mysqli_query($conn, $select);
        $rowcount = mysqli_num_rows($hasil);

        if ($rowcount == 0) {
            echo '<p class="text-center">Belum ada hasil! :)</p>';
        } else {
            ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama Dosen</th>
                            <th colspan="5">Nilai</th>
                            <th rowspan="2">Rata-rata</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        $total = 0; 
                        $total1 = $total2 = $total3 = $total4 = $total5 = 0;

                        while ($buff = mysqli_fetch_array($hasil)) {
                            $count++;
                            ?>
                            <tr align="center">
                                <td><?php echo $count; ?></td>
                                <td><?php echo htmlspecialchars($buff['nama']); ?></td>
                                <?php
                                $select1 = "SELECT * FROM hasil_kuisioner WHERE id_dosen = '" . $buff['id_dosen'] . "'";
                                $hasil1 = mysqli_query($conn, $select1);
                                $nilai1 = $nilai2 = $nilai3 = $nilai4 = $nilai5 = 0;

                                while ($buff1 = mysqli_fetch_array($hasil1)) {
                                    switch ($buff1['nilai']) {
                                        case 1: $total1++; $nilai1++; break;
                                        case 2: $total2++; $nilai2++; break;    
                                        case 3: $total3++; $nilai3++; break;
                                        case 4: $total4++; $nilai4++; break;
                                        case 5: $total5++; $nilai5++; break;
                                    }
                                } 
                                // Rata-rata
                                $total = ($total1 * 1 + $total2 * 2 + $total3 * 3 + $total4 * 4 + $total5 * 5) / ($total1 + $total2 + $total3 + $total4 + $total5);
                                ?> 
                                <td><?php echo $nilai1; ?></td>
                                <td><?php echo $nilai2; ?></td>
                                <td><?php echo $nilai3; ?></td>
                                <td><?php echo $nilai4; ?></td>
                                <td><?php echo $nilai5; ?></td>
                                <td><?php echo number_format($total, 2); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php 
        }
        mysqli_close($conn);
        ?>

        <div class="chart-container">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawStuff);

            function drawStuff() {
                var data = new google.visualization.arrayToDataTable([
                    ['Pertanyaan', 'Rata-rata'],
                    <?php
                    include "koneksi.php";
                    $select1 = "SELECT * FROM hasil_kuisioner 
                                 INNER JOIN dosen ON hasil_kuisioner.id_dosen = dosen.id_dosen 
                                 INNER JOIN kuisioner ON hasil_kuisioner.id_soal = kuisioner.id_soal 
                                 GROUP BY hasil_kuisioner.id_dosen";
                    $hasil1 = mysqli_query($conn, $select1);
                    $count = 0; 
                    while ($buff = mysqli_fetch_array($hasil1)) {
                        $count++;
                        // Menghitung rata-rata
                        $totalCount = $total1 + $total2 + $total3 + $total4 + $total5;
                        $totalRating = ($total1 * 1 + $total2 * 2 + $total3 * 3 + $total4 * 4 + $total5 * 5) / ($totalCount ? $totalCount : 1);
                        echo "['Pertanyaan " . $count . "', " . number_format($totalRating, 2) . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: 'Hasil Kuesioner',
                    width: 900,
                    legend: { position: 'none' },
                    chart: { title: 'Hasil Kuesioner', subtitle: 'Berdasarkan isian Mahasiswa' },
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
                chart.draw(data, options);
            }
            </script>
            <div id="top_x_div" style="width: 900px; height: 500px; margin: auto;"></div>
        </div>
    </div>
    
    <script>
        window.print(); // UNTUK MEMANGGIL WINDOWS PRINT
    </script>

</body>
</html>
