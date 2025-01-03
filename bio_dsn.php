<?php
include "koneksi.php";
session_start();
$select = "SELECT * FROM dosen WHERE username='$_SESSION[username]'";
$hasil = mysqli_query($conn, $select);
$buff = mysqli_fetch_array($hasil);

if (isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dosen</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #ccc;
            margin-right: 20px;
            overflow: hidden;
            border: 2px solid #4a90e2;
        }
        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Menyesuaikan ukuran gambar */
        }
        .profile-details {
            flex-grow: 1;
        }
        .profile-details h2 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        .profile-details p {
            margin: 5px 0;
            color: #888;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }
        .profile-info table {
            width: 100%;
            border-spacing: 10px;
        }
        .profile-info td {
            padding: 10px;
            border-bottom: 1px solid #f0f0f0;
        }
        .profile-info td:first-child {
            font-weight: bold;
        }
        .star-rating {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .star {
            font-size: 30px;
            color: #d3d3d3;
            cursor: pointer;
            transition: color 0.3s, transform 0.2s;
        }
        .star:hover,
        .star.selected {
            color: #ffc107;
            transform: scale(1.2);
        }
        .average-rating {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        input[type="file"] {
            margin-top: 10px;
            padding: 10px;
            border: 2px solid #dbdbdb;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background-color: #3897f0;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
        button:hover {
            background-color: #007bbf;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <div class="profile-header">
        <div class="profile-image">
            <?php
            // Ambil gambar profil dari database
            $profile_image = !empty($buff['profile_image']) ? $buff['profile_image'] : ''; // Kosongkan jika tidak ada gambar
            ?>
            <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="Foto Profil" style="<?php echo empty($profile_image) ? 'display: none;' : ''; ?>">
        </div>
        <div class="profile-details">
            <h2><?php echo $buff['nama']; ?></h2>
            <p>@<?php echo $buff['username']; ?></p>
        </div>
    </div>

    <div class="profile-info">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $buff['nama']; ?></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><?php echo $buff['nip']; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?php echo $buff['username']; ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><?php echo $buff['password']; ?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?php echo $buff['semester']; ?></td>
            </tr>
            <tr>
                <td>Mata Kuliah</td>
                <td>:</td>
                <td><?php echo $buff['matkul']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $buff['email']; ?></td>
            </tr>
            <tr>
                <td>No Tlp</td>
                <td>:</td>
                <td><?php echo $buff['notel']; ?></td>
            </tr>
        </table>
    </div>

    <!-- Form Upload Gambar Profil -->
    <form action="upload.php" method="post" enctype="multipart/form-data" onsubmit="return validateImage()">
        <label for="profileImage">Upload Foto Profil:</label>
        <input type="file" name="profileImage" id="profileImage" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>

    <div class="star-rating" data-rating="<?php echo $totalRating; ?>" onclick="rate(this)">
        <?php
        // Menghitung total rating
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
        // Menghitung rata-rata
        $totalCount = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5;
        $totalRating = ($nilai1 * 1 + $nilai2 * 2 + $nilai3 * 3 + $nilai4 * 4 + $nilai5 * 5) / ($totalCount ? $totalCount : 1);
        for ($i = 1; $i <= 5; $i++): ?>
            <span class="star <?php echo $i <= $totalRating ? 'selected' : ''; ?>" data-value="<?php echo $i; ?>">&#9734;</span>
        <?php endfor; ?>
    </div>
    <p class="average-rating">Rata-rata: <?php echo number_format($totalRating, 2); ?></p>
</div>

<script>
    function validateImage() {
        const fileInput = document.getElementById('profileImage');
        const file = fileInput.files[0];
        if (file.size > 2097152) { // 2MB
            alert("Ukuran gambar tidak boleh lebih dari 2MB.");
            return false;
        }
        return true;
    }

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
<?php
} else {
    echo "Silakan login terlebih dahulu.";
}
?>
