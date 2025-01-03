<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_web'); // Ganti 'db_web' dengan nama database Anda

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah metode permintaan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // Menangkap data mahasiswa jika level adalah mahasiswa
    $semester = isset($_POST['semester']) ? $_POST['semester'] : null;
    $nim = isset($_POST['nim']) ? $_POST['nim'] : null;
    $jur = isset($_POST['jur']) ? $_POST['jur'] : null;
    $jenjang = isset($_POST['jenjang']) ? $_POST['jenjang'] : null;
    $angkatan = isset($_POST['angkatan']) ? $_POST['angkatan'] : null;
    $profile_image = isset($_POST['profile_image']) ? $_POST['profile_image'] : null; // Tangkap profile_image

    // Menangkap data dosen jika level adalah dosen
    $nip = isset($_POST['nip']) ? $_POST['nip'] : null;
    $matkul = isset($_POST['matkul']) ? $_POST['matkul'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $notel = isset($_POST['notel']) ? $_POST['notel'] : null;

    // Menghindari SQL Injection
    $nama = $conn->real_escape_string($nama);
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $level = $conn->real_escape_string($level);
    $profile_image = $conn->real_escape_string($profile_image); // Escaping profile_image

    // Menyimpan pengguna baru ke database (tanpa email)
    $sql = "INSERT INTO user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')";

    if ($conn->query($sql) === TRUE) {
        // Jika pengguna mendaftar sebagai mahasiswa, simpan ke tabel mahasiswa
        if ($level === 'mahasiswa') {
            // Pastikan variabel semester, nim, jur, jenjang, angkatan, dan profile_image tidak null
            if (!empty($semester) && !empty($nim) && !empty($jur) && !empty($jenjang) && !empty($angkatan)) {
                // Query untuk menyimpan data mahasiswa
                $sql_mahasiswa = "INSERT INTO mahasiswa (semester, nama, nim, username, password, jur, jenjang, angkatan, profile_image) 
                                  VALUES ('$semester', '$nama', '$nim', '$username', '$password', '$jur', '$jenjang', '$angkatan', '$profile_image')";
                
                if ($conn->query($sql_mahasiswa) === TRUE) {
                    echo "Pendaftaran sebagai mahasiswa berhasil!";
                } else {
                    echo "Error: " . $sql_mahasiswa . "<br>" . $conn->error; // Menampilkan kesalahan query
                }
            } else {
                echo "Data mahasiswa tidak lengkap!";
            }
        } elseif ($level === 'dosen') {
            // Pastikan variabel nip, matkul, jur, email, notel, dan profile_image tidak null
            if (!empty($nip) && !empty($matkul) && !empty($jur) && !empty($email) && !empty($notel)) {
                // Escaping data dosen
                $nip = $conn->real_escape_string($nip);
                $matkul = $conn->real_escape_string($matkul);
                $jur = $conn->real_escape_string($jur);
                $email = $conn->real_escape_string($email);
                $notel = $conn->real_escape_string($notel);
                
                // Query untuk menyimpan data dosen
                $sql_dosen = "INSERT INTO dosen (nama, username, password, nip, semester, matkul, jur, email, notel, profile_image) 
                              VALUES ('$nama', '$username', '$password', '$nip', '$semester', '$matkul', '$jur', '$email', '$notel', '$profile_image')";
                
                if ($conn->query($sql_dosen) === TRUE) {
                    echo "Pendaftaran sebagai dosen berhasil!";
                } else {
                    echo "Error: " . $sql_dosen . "<br>" . $conn->error; // Menampilkan kesalahan query
                }
            } else {
                echo "Data dosen tidak lengkap!";
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Menampilkan kesalahan query untuk tabel user
    }
}

// Menutup koneksi
$conn->close();
?>
