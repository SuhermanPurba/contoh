<html>
	<head>
		<meta http-equiv="" content="text/html; charset=utf-8" />
		<title>Print Hasil Penilaian</title>
	</head>

	<body>
		<h2>Hasil Penilaian</h2>
		
		<?php
    include "koneksi.php";
    session_start();
    $id_dosen=$_SESSION['id_dosen'];
    $select="SELECT * from hasil_kuisioner inner join kuisioner on hasil_kuisioner.id_soal=kuisioner.id_soal where id_dosen='$id_dosen'";
    $hasil_kuisioner=mysqli_query($conn, $select);
		?>
		<table width="850" border="1">
		<tr align="center">
			<td rowspan="1">no</td>
			<td rowspan="1">kuisioner</td>
			<td rowspan="1">Rata-rata</td>
		</tr>
    
		<?php
		$count=0;
		while($buff=mysqli_fetch_array($hasil_kuisioner)){
		$count++;
		$select1="SELECT * FROM hasil_kuisioner WHERE id_dosen='$id_dosen'";
		$hasil_kuisioner1=mysqli_query($conn,$select1);
		
		?>
			<tr>
				<td><?php echo $count;?></td>
				<td><?php echo $buff['pertanyaan'];?></td>
				<td><?php echo $buff['nilai']; ?></td>
			</tr>
		<?php
		};
		mysqli_close($conn);
		?>
			</table>
		<br />



    <?php 
    include "koneksi.php";
 		$select1= "SELECT * FROM hasil_kuisioner INNER JOIN kuisioner ON hasil_kuisioner.id_soal = kuisioner.id_soal WHERE id_dosen='".$_SESSION['id_dosen']."'";
 		$hasil1 = mysqli_query($conn, $select1);
 	 ?>

 	 
 	 
 	<div align="center" style="padding-top: 45px;">
 	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Pertanyaan', 'Nilai'],
          <?php
          $count="0"; 
          	while($buff=mysqli_fetch_array($hasil1)){
          		$count++;
          		echo "['".$count."',".$buff['nilai']."],";
          	}
           ?>
        ]);

        var options = {
          title: 'Hasil Kuesioner',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Hasil Kuesioner',
                   subtitle: 'Berdasarkan isian Mahasiswa' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Pertanyaan '} // Top x-axis.
            },
            y: {
              0: { side: 'left', label: 'Rata-rata '} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
    <script>
        window.print(); //UNTUK MEMANGGIL WINDOWS PRINT
    </script>
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
	</div>
	</body>

</html>