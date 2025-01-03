<?php
include "koneksi.php";
session_start();
$select = "SELECT * FROM kuisioner";
$hasil = mysqli_query($conn, $select);
$rowcount = mysqli_num_rows($hasil);

if ($rowcount == 0) {
    ?><p>Tidak ada yang harus anda tanggapi :)</p><?php
} else {
    ?>
    <div class="view">
        <form action="hasil_kuisioner.php" method="post">
            <table class="table-kuisioner">
                <tr align="center">
                    <td>No</td>
                    <td>Pertanyaan</td>
                    <td colspan="5">Tanggapan</td>
                </tr>
                <?php
                $count = 0;
                $select = "SELECT * FROM kuisioner";
                while ($buff = mysqli_fetch_array($hasil)) {
                    $count++;
                    ?>
                    <tr>
                        <input type="hidden" name="<?php echo "id_soal" . $count; ?>" value="<?php echo $buff['id_soal']; ?>"/>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $buff['pertanyaan']; ?></td>
                        <td colspan="5" class="rating-container">
                            <?php
                            $select1 = "SELECT * FROM hasil_kuisioner WHERE id_dosen='" . $_GET['id_dosen'] . "' AND id_soal='" . $buff['id_soal'] . "' AND username='" . $_SESSION['username'] . "'";
                            $hasil1 = mysqli_query($conn, $select1);
                            $rowcount1 = mysqli_num_rows($hasil1);

                            // Default rating
                            $rating = 0;

                            if ($rowcount1 > 0) {
                                $buff1 = mysqli_fetch_array($hasil1);
                                $rating = $buff1['nilai']; // Ambil rating dari database
                            }

                            // Tampilkan bintang rating dari kanan ke kiri
                            for ($i = 5; $i >= 1; $i--) { // Start from 5 to 1
                                $checked = ($rating >= $i) ? 'checked' : ''; // Cek untuk memilih semua bintang hingga nilai rating
                                ?>
                                <input type="radio" id="star<?php echo $count . $i; ?>" name="<?php echo "nilai" . $count; ?>" value="<?php echo $i; ?>" <?php echo $checked; ?> onclick="setRating(<?php echo $count; ?>, <?php echo $i; ?>)"/>
                                <label for="star<?php echo $count . $i; ?>" class="star">&#9733;</label> <!-- Bintang menggunakan simbol Unicode -->
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }; ?>
            </table><br>
            <input type="hidden" name="count" value="<?php echo $count; ?>"/>
            <input type="hidden" name="id_dosen" value="<?php echo $_GET['id_dosen']; ?>">
            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
            <input type="submit" class="btn-simpan" value="Simpan"/>
        </form>
    </div>
    <?php
}
?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Change font to a more modern one */
        background-color: #f5f7fa; /* Light background color */
        padding: 20px;
    }
    .table-kuisioner {
        width: 70%;
        border-collapse: collapse;
        margin: auto; /* Center the table */
        background-color: white; /* White background for the table */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }
    .table-kuisioner td, .table-kuisioner th {
        padding: 12px;
        text-align: center; /* Center text */
        border: 1px solid #dee2e6; /* Light border */
    }
    .table-kuisioner tr:nth-child(even) {
        background-color: #f9f9f9; /* Alternate row colors */
    }
    .btn-simpan {
        background-color: #007bbd; /* Button color */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin: 20px auto; /* Center the button */
        display: block; /* Block display for centering */
    }
    .btn-simpan:hover {
        background-color: #0056b3; /* Darker color on hover */
    }
    .star {
        display: inline-block; /* Membuat label ditampilkan secara inline */
        font-size: 30px; /* Ukuran bintang */
        color: gray; /* Warna bintang kosong */
        cursor: pointer;
        transition: color 0.2s; /* Transition for smoother hover effect */
    }
    /* Warna bintang saat hover */
    label.star:hover,
    label.star:hover ~ label.star {
        color: gold; /* Warna bintang saat hover */
    }
    /* Warna bintang saat terpilih */
    input[type="radio"]:checked ~ label.star {
        color: gold; /* Warna bintang terisi */
    }
    input[type="radio"] {
        display: none; /* Sembunyikan input radio */
    }
</style>

<script>
    function setRating(count, rating) {
        // Mengatur semua radio button dengan nilai kurang dari atau sama dengan rating yang diklik
        for (let i = 1; i <= 5; i++) {
            const star = document.getElementById('star' + count + i);
            star.checked = (i <= rating);
        }
    }
</script>
