<?php
include "koneksi.php";
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // Misalkan Anda menyimpan tipe pengguna dalam sesi
    $userType = $_SESSION['level']; // 'mahasiswa' atau 'dosen'

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Cek file upload berdasarkan tipe pengguna
        if (isset($_FILES['profileImage'])) {
            $target_dir = "uploads/"; // Direktori untuk menyimpan gambar
            $imageFileType = strtolower(pathinfo($_FILES["profileImage"]["name"], PATHINFO_EXTENSION));
            $target_file = $target_dir . uniqid() . '.' . $imageFileType;

            $uploadOk = 1;

            // Cek apakah file gambar adalah gambar atau bukan
            $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
            if ($check !== false) {
                echo "File adalah gambar - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File bukan gambar.";
                $uploadOk = 0;
            }

            // Hanya izinkan format tertentu
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
                $uploadOk = 0;
            }

            // Cek apakah $uploadOk di-set ke 0 oleh kesalahan
            if ($uploadOk == 0) {
                echo "Maaf, file tidak dapat diunggah.";
            } else {
                if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
                    echo "File " . htmlspecialchars(basename($_FILES["profileImage"]["name"])) . " telah diunggah.";

                    // Update database berdasarkan tipe pengguna
                    if ($userType === 'mahasiswa') {
                        $update = "UPDATE mahasiswa SET profile_image=? WHERE username=?";
                    } elseif ($userType === 'dosen') {
                        $update = "UPDATE dosen SET profile_image=? WHERE username=?";
                    } else {
                        echo "Tipe pengguna tidak dikenal.";
                        exit();
                    }

                    $stmt = mysqli_prepare($conn, $update);
                    mysqli_stmt_bind_param($stmt, 'ss', $target_file, $username);
                    
                    if (mysqli_stmt_execute($stmt)) {
                        header("Location: bio_mhs.php"); // Redirect kembali ke halaman profil
                        exit();
                    } else {
                        echo "Kesalahan saat memperbarui gambar profil: " . mysqli_error($conn);
                    }
                } else {
                    echo "Maaf, terjadi kesalahan saat mengunggah file.";
                }
            }
        }
    }
} else {
    echo "Anda belum login.";
}
?>
