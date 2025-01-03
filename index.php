
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sitka+Display:wght@400&display=swap" rel="stylesheet">

    <style>
        /* Global Reset */
        a, body, div, form, html, h1, h2, h3, h4, h5, ul, li, p, span {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(to bottom right, #e0f7fa, #c1e1ec);
            color: #333;
            font: 18px 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
            min-height: 100vh;
        }

        .header {
            display: flex;
            align-items: center;
            background-color: #003366;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        .logo img {
            width: 110px;
            height: 110px;
            margin-right: 20px;
        }

        #navmenu {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        .menu-item {
            position: relative;
            padding: 10px 20px;
            color: #fff;
            background: transparent;
            transition: background 0.3s ease, transform 0.2s;
            font-size: 18px;
        }

        .menu-item a {
            text-decoration: none;
            color: white;
        }

        .menu-item:hover {
            background-color: #007acc;
            border-radius: 8px;
            transform: scale(1.05);
        }

        .has-child span {
            cursor: pointer;
        }

        .sub-menu {
            display: none;
            position: absolute;
            top: 50px;
            left: 0;
            background-color: #007acc;
            border-radius: 8px;
            list-style-type: none;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            padding: 10px;
        }

        .has-child:hover .sub-menu {
            display: block;
        }

        .sub-menu-item {
            margin-bottom: 10px;
        }

        .sub-menu-item a {
            text-decoration: none;
            color: white;
        }

        .sub-menu-item:hover {
            background-color: #005f99;
            border-radius: 8px;
        }

        .page {
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
            margin-top: 30px;
        }

        .footer {
            padding: 15px;
            background-color: #003366;
            color: white;
            text-align: center;
            font-size: 14px;
            border-radius: 10px;
            box-shadow: 0px -5px 15px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }

        /* Tambahan */
        h2 {
            color: #005f99;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .institution-info {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .faculty-info {
            margin-left: 20px;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        .rector-message {
            margin-top: 30px;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 30px;
        }

        .gallery img {
            width: 200px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }
		.rector-message {
    display: flex; /* Menggunakan flexbox untuk mengatur layout */
    align-items: center; /* Menyelaraskan item secara vertikal */
    margin: 20px 0; /* Margin untuk pemisahan */
    padding: 15px; /* Menambahkan padding di sekitar konten */
    background-color: #e0f7fa; /* Latar belakang biru muda */
    border: 2px solid #0093e9; /* Border biru terang */
    border-radius: 10px; /* Membuat sudut membulat */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
}

.rector-photo {
    width: 150px; /* Lebar foto rektor */
    height: auto; /* Mempertahankan rasio aspek */
    margin-right: 20px; /* Jarak antara foto dan teks */
    border: 2px solid #007acc; /* Border biru saat foto */
    border-radius: 8px; /* Sudut membulat untuk foto */
}

.rector-text {
    max-width: 600px; /* Batas lebar maksimum untuk teks */
    color: #003366; /* Warna teks gelap untuk kontras yang baik */
}

.rector-text h2 {
    color: #005f99; /* Warna biru untuk judul */
}

.rector-text p {
    line-height: 1.6; /* Jarak antar baris lebih baik untuk keterbacaan */
    margin-top: 10px; /* Jarak atas pada paragraf */
}
.read-more-button {
    display: inline-block; /* Agar tombol berperilaku seperti blok */
    padding: 10px 20px; /* Padding untuk memperbesar area klik */
    background-color: #007acc; /* Warna latar belakang biru */
    color: white; /* Warna teks putih */
    text-decoration: none; /* Menghilangkan garis bawah */
    border-radius: 5px; /* Sudut membulat untuk tombol */
    transition: background-color 0.3s; /* Transisi halus untuk efek hover */
    margin-top: 10px; /* Jarak atas untuk memisahkan dari teks */
}

.read-more-button:hover {
    background-color: #005f99; /* Warna saat hover */
}
.campus-map {
    margin: 20px 0; /* Add margin for spacing */
}

.map-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
}

.map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* Add space between images */
}

.gallery-item {
    text-align: center; /* Center align captions */
}

.gallery img {
    max-width: 100%; /* Make images responsive */
    height: auto;    /* Maintain aspect ratio */
}
.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Evenly distribute items */
    gap: 10px; /* Add space between items */
}

.gallery-item {
    flex: 1 1 calc(30% - 10px); /* Each item takes up 30% of the row minus gap */
    max-width: calc(30% - 10px); /* Prevents items from being too wide */
    text-align: center; /* Center align captions */
}

.gallery img {
    width: 100%; /* Make images responsive */
    height: auto; /* Maintain aspect ratio */
    border-radius: 8px; /* Optional: rounded corners */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Optional: shadow effect */
}

.gallery-item p {
    margin-top: 8px; /* Add space between the image and the caption */
    font-size: 16px; /* Adjust caption font size as needed */
}
.social-media {
    margin-top: 30px; /* Add margin for spacing */
    text-align: center; /* Center align content */
}

.social-media h2 {
    color: #005f99; /* Set color for the heading */
}

.social-media ul {
    list-style-type: none; /* Remove bullet points */
    display: flex; /* Display list items in a row */
    justify-content: center; /* Center align items */
    gap: 20px; /* Space between icons */
}

.social-link img {
    width: 40px; /* Set width for social media logos */
    height: auto; /* Maintain aspect ratio */
    transition: transform 0.3s; /* Smooth scale effect on hover */
}

.social-link:hover img {
    transform: scale(1.1); /* Slightly enlarge on hover */
}
body {
            background-color: #f0f0f0;
            font-family: "Times New Roman", Times, serif; /* Mengubah font menjadi Times New Roman */
        }
        .carousel-item img {
            width: 100%;
            height: auto;
            max-height: 400px; /* Set max height for images */
        }
        
        .container {
            background-color: #e6f7ff; /* Warna latar belakang biru untuk konten */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: "Times New Roman", Times, serif; /* Mengubah font menjadi Times New Roman di dalam container */
            font-weight: bold; /* Membuat semua teks dalam kontainer menjadi bold */
        }
        .menu {
    position: relative; /* Menyediakan konteks untuk posisi absolut di dalamnya */
}

.menu-item {
    list-style: none; /* Menghapus bullet points */
    display: inline-block; /* Mengatur item menu menjadi inline */
}

.menu-item a {
    text-decoration: none; /* Menghapus garis bawah dari tautan */
    padding: 10px 20px; /* Memberikan padding di sekitar tautan */
    color: #fff; /* Mengatur warna teks */
    background-color: #007bff; /* Mengatur warna latar belakang */
    border-radius: 5px; /* Membuat sudut membulat */
}

.menu-item a:hover {
    background-color: #0056b3; /* Mengubah warna saat hover */
}

/* Aturan untuk menempatkan login di sudut kanan atas */
.menu {
    position: absolute; /* Mengatur menu agar bisa diposisikan di sudut */
    top: 10px; /* Mengatur jarak dari atas */
    right: 10px; /* Mengatur jarak dari kanan */
}
.menu-item a {
    text-decoration: none; /* Menghapus garis bawah dari tautan */
    padding: 5px 10px; /* Mengurangi padding untuk tombol yang lebih kecil */
    font-size: 14px; /* Mengatur ukuran font */
    color: #fff; /* Mengatur warna teks */
    background-color: #007bff; /* Mengatur warna latar belakang */
    border-radius: 5px; /* Membuat sudut membulat */
}

.menu-item a:hover {
    background-color: #0056b3; /* Mengubah warna saat hover */
}
body {
            display: flex; /* Menggunakan flexbox untuk penataan */
            flex-direction: column; /* Mengatur arah konten ke kolom */
            align-items: center; /* Mengatur konten agar berada di tengah secara horizontal */
            justify-content: center; /* Mengatur konten agar berada di tengah secara vertikal */
            height: 100vh; /* Memastikan body memiliki tinggi 100% dari viewport */
            margin: 0; /* Menghapus margin default */
        }

        .campus-map {
            text-align: center; /* Memusatkan teks di dalam elemen campus-map */
            margin: 20px; /* Menambahkan jarak di sekeliling peta */
        }

        .map-container {
            position: relative;
            width: 80%; /* Menyesuaikan lebar peta dengan 80% dari elemen parent */
            max-width: 800px; /* Menentukan lebar maksimum untuk peta */
            height: 60vh; /* Mengatur tinggi peta sesuai dengan tinggi viewport */
            overflow: hidden; /* Menyembunyikan bagian yang melampaui */
            margin: 0 auto; /* Memusatkan map-container */
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%; /* Membuat iframe mengisi lebar container */
            height: 100%; /* Membuat iframe mengisi tinggi container */
            border: 0; /* Menghapus border iframe */
        }
        <style>
        /* Custom styles for the title */
        .section-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 3px solid #007acc;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* News Card adjustments */
        .news-card {
            border: none;
            margin-bottom: 20px;
        }

        .news-card img {
            border-radius: 10px;
            max-height: 250px;
            object-fit: cover;
        }

        .news-card-body {
            padding: 10px;
        }

        .news-date {
            font-size: 14px;
            color: #888;
        }

        .news-title {
            font-size: 18px;
            font-weight: bold;
            color: #0056b3;
        }

        .news-title:hover {
            color: #003366;
            text-decoration: underline;
        }

        .see-more {
            font-size: 16px;
            color: #007acc;
            text-align: center;
            margin-top: 20px;
        }

        .see-more a {
            color: #007acc;
            text-decoration: none;
        }
        .news-card img {
        height: 200px; /* Atur tinggi gambar */
        object-fit: cover; /* Memastikan gambar tetap proporsional */
    }

    .see-more {
        text-align: center; /* Rata tengah untuk tautan "Lihat Berita Lebih Banyak" */
        margin-top: 20px; /* Jarak atas untuk tautan */
    }

    .see-more a {
        font-size: 16px; /* Ukuran font untuk tautan */
        color: #007bbd; /* Warna tautan */
        text-decoration: none; /* Hapus garis bawah */
    }

    .see-more a:hover {
        text-decoration: underline; /* Garis bawah saat hover */
    }

        .see-more a:hover {
            text-decoration: underline;
        }
        .university-title {
    font-family: 'Montserrat', sans-serif; /* Modern, clean font */
    font-size: 30px; /* Desired font size */
    font-weight: 700; /* Bold to make the text stand out */
    color: #ffffff; /* Dark navy blue for a professional look */
    letter-spacing: 3px; /* Space between letters for sleek style */
    text-transform: uppercase; /* Ensures all letters are uppercase */
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3); /* Adds depth with a soft shadow */
    margin: 0;
    padding: 10px;
    text-align: center; /* Centers the title */
}

body {
    background-color: #f4f6f9; /* Light background to make the text pop */
}
body {
    font-family: 'Sitka Display', serif; /* Mengatur font pada body */
    line-height: 1.6; /* Menambah jarak antar baris untuk keterbacaan */
    margin: 20px; /* Memberikan margin pada body */
    color: #333; /* Mengatur warna teks */
    background-color: #f9f9f9; /* Mengatur warna latar belakang */
}

p {
    margin-bottom: 15px; /* Memberikan jarak antar paragraf */
}

/* Mengatur tampilan teks pada paragraf pertama */
p:first-of-type {
    font-weight: bold; /* Memberikan efek tebal pada paragraf pertama */
    font-size: 1.2em; /* Menambah ukuran font pada paragraf pertama */
}

    </style>

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo"><img src="images/th.jpg" alt="University Logo" /></div>
            <ul id="navmenu">
            <h1 class="university-title">UNIVERSITAS METHODIST INDONESIA</h1>

           
                </li>
                <ul class="menu">
    <li class="menu-item"><a href="login.php">Login</a></li>
</ul>

            </ul>
        </div>

        <div class="container">
    
        <div class="container">

    <p>Selamat datang di Sistem Penilaian Dosen Universitas Methodist Indonesia!</p>
    <p>
        Selamat datang di platform Survei Penilaian Dosen Universitas Methodist Indonesia. 
        Situs ini dirancang untuk memberikan mahasiswa kesempatan dalam memberikan penilaian terhadap dosen 
        dan proses pembelajaran yang mereka jalani. 
        Dengan mengisi survei ini, Anda dapat memberikan masukan yang berharga 
        untuk meningkatkan kualitas pengajaran dan pengalaman belajar di universitas kami.
    </p>
    <p>
        Setiap tanggapan Anda sangat penting dan akan digunakan untuk evaluasi serta pengembangan dosen, 
        demi mencapai standar akademik yang lebih baik. Kami menghargai waktu dan pendapat Anda, 
        dan berharap Anda dapat mengisi survei ini dengan jujur dan konstruktif.
    </p>
    <p>
        Terima kasih atas partisipasi Anda dalam meningkatkan kualitas pendidikan di Universitas Methodist Indonesia.
    </p>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/gedung1.jpg" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="images/gedung2.jpg" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="images/gedung3.jpg" alt="Slide 3">
            </div>
            <!-- Tambahkan lebih banyak slide di sini -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

</div>
</body>
</html> 

        <div class="institution-info">
                <div class="info">
                    <h2>Informasi Lembaga</h2>
                    <p>Universitas Methodis Indonesia adalah institusi pendidikan tinggi yang berkomitmen untuk memberikan pendidikan berkualitas kepada mahasiswanya. Kami percaya bahwa pendidikan adalah kunci untuk menciptakan masa depan yang lebih baik.</p>
                </div>
                <div class="faculty-info">
                    <h2>Fakultas</h2>
                    <p>Kami memiliki beberapa fakultas yang menawarkan berbagai program studi yang relevan dan inovatif untuk mempersiapkan mahasiswa menghadapi tantangan dunia kerja.</p>
                </div>
            </div>

            <div class="rector-message">
    <img src="images/t.jpg" alt="Foto Rektor" class="rector-photo">
    <div class="rector-text">
        <h2>Sambutan Rektor</h2>
        <p>Selamat datang di Universitas Methodis Indonesia. Kami berkomitmen untuk menyediakan lingkungan belajar yang kondusif dan mendukung untuk pengembangan diri dan akademik. Kami berharap Anda dapat menemukan pengalaman yang berharga di sini.</p>
        <a href="selengkapnya.php" class="read-more-button">Selengkapnya</a> <!-- Tombol Selengkapnya -->
    </div>
</div>




    
<div class="container mt-5">
    <h2 class="section-title">Berita Terbaru</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card news-card">
                <img src="images/ft1.png" class="card-img-top" alt="Berita 1">
                <div class="card-body news-card-body">
                    <p class="news-date">27 September 2024</p>
                    <a href="https://www.methodist.ac.id/news-detail.do?id=91" class="news-title" target="_blank">Lokavo: Inovasi Mahasiswa Fakultas Ilmu Komputer Universitas Methodist...</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card news-card">
                <img src="images/ft2.jpeg" class="card-img-top" alt="Berita 2">
                <div class="card-body news-card-body">
                    <p class="news-date">10 September 2024</p>
                    <a href="https://www.methodist.ac.id/news-detail.do?id=90" class="news-title" target="_blank">Kepala LLDIKTI I Serahkan SK Akreditasi UNGGUL FK-UMI</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card news-card">
                <img src="images/ft3.jpg" class="card-img-top" alt="Berita 3">
                <div class="card-body news-card-body">
                    <p class="news-date">22 August 2024</p>
                    <a href="https://www.methodist.ac.id/news-detail.do?id=89" class="news-title" target="_blank">Rakornas APTIKOM 2024</a>
                </div>
            </div>
        </div>
    </div>

    <div class="see-more">
        <a href="https://www.methodist.ac.id/news.do" target="_blank">Lihat Berita Lebih Banyak &rsaquo;</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
			

<h2>Galeri Foto</h2>
<div class="gallery">
    <div class="gallery-item">
        <img src="images/gb1.jpg" alt="Galeri 1">
        <p><strong>Persiapan untuk kegiatan PKKMB UMI</strong></p>
    </div>
    <div class="gallery-item">
        <img src="images/gb3.jpg" alt="Galeri 2">
        <p><strong>Selesai melaksanakan Sidang perdana angkatan 21</strong></p>
    </div>
    <div class="gallery-item">
        <img src="images/gb2.jpg" alt="Galeri 3">
        <p><strong>Peresmian ketua dan anggota HMP</strong></p>
    </div>
    <div class="gallery-item">
        <img src="images/gb4.jpg" alt="Galeri 4">
        <p><strong>Merayakan imlek di rumah kprodi D3</strong></p>
    </div>
    <div class="gallery-item">
        <img src="images/gb5.jpg" alt="Galeri 5">
        <p><strong>Penyerahan surat akresitas</strong></p>
    </div>
    </div>
</div>
    <div class="campus-map">
    <h2>Peta Kampus Universitas Methodis Indonesia</h2>
    <p>Alamat: Jalan Hang Tuah 1, Kota Medan, Sumatera Utara</p>
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.9928727000934!2d98.64536281475782!3d3.5664417510401424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312a2588a74687%3A0x35c7ed72869e891d!2sUniversitas%20Methodis%20Indonesia!5e0!3m2!1sen!2sid!4v1702811136487!5m2!1sen!2sid" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
</div>
<div class="social-media">
    <h2>Ikuti Kami di Media Sosial</h2>
    <ul>
        <li><a href="https://www.facebook.com/groups/179412605511977/?ref=share&mibextid=NSMWBT" target="_blank" class="social-link">
            <img src="images/fb.png" alt="Facebook" />
        </a></li>
        <li><a href="https://www.instagram.com/universitasmethodistindonesia?igsh=MWxiZzNuMnJoNTg3NA==" target="_blank" class="social-link">
            <img src="images/ig.jpg" alt="Instagram" />
        </a></li>
        <li><a href="https://youtube.com/@universitasmethodistindone3223?si=c4S92hQ_ocGGAgtt" target="_blank" class="social-link">
            <img src="images/yt.png" alt="LinkedIn" />
        </a></li>
    </ul>
</div>


        
        <div class="footer">
            &copy; 2024 Universitas Methodis Indonesia. All rights reserved.by Suherman Purba
        </div>
    </div>
</body>
</html>