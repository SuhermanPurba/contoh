<?php
include "koneksi.php";
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $select = "SELECT * FROM mahasiswa WHERE username=?";
    $stmt = mysqli_prepare($conn, $select);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);
    $buff = mysqli_fetch_array($hasil);

    if ($buff) {
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fafafa;
        }
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            border: 1px solid #dbdbdb;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        }
        .profile-details {
            flex-grow: 1;
        }
        .profile-details h2 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
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
        }
        .profile-info td:first-child {
            font-weight: bold;
        }
        .profile-info td:nth-child(2) {
            text-align: center;
            font-weight: bold;
        }
        .profile-info td:last-child {
            color: #555;
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
            background-color: #3897f0; /* Warna biru Instagram */
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
            background-color: #007bbf; /* Warna saat hover */
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
        <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="Foto Profil" style="width: 100%; height: 100%; border-radius: 50%; <?php echo empty($profile_image) ? 'display: none;' : ''; ?>">
        </div>

        <div class="profile-details">
            <h2><?php echo htmlspecialchars($buff['nama']); ?></h2>
            <p>@<?php echo htmlspecialchars($buff['username']); ?></p>
        </div>
    </div>

    <div class="profile-info">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($buff['nama']); ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($buff['nim']); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($buff['username']); ?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($buff['semester']); ?></td>
            </tr>
            <tr>
                <td>Angkatan</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($buff['angkatan']); ?></td>
            </tr>
        </table>
    </div>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="profileImage">Upload Foto Profil:</label>
        <input type="file" name="profileImage" id="profileImage" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>
</div>

</body>
</html>
<?php
    } else {
        echo "foto berhasil diupload.";
    }
} else {
    echo "Session tidak ditemukan.";
}
?>
