<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Kuisioner</title>
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

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .star-rating {
            display: flex;
            justify-content: center;
            margin: 20px 0;
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

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #007bbd;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Formulir Kuisioner</h2>
    <div class="form-container">
        <form action="daftarBaru_kuisioner2.php" method="post">
            <div class="form-group">
                <label for="pertanyaan">Pertanyaan:</label>
                <input type="text" name="pertanyaan" id="pertanyaan" required />
            </div>

            <div class="star-rating">
                <span class="star" data-value="1">★</span>
                <span class="star" data-value="2">★</span>
                <span class="star" data-value="3">★</span>
                <span class="star" data-value="4">★</span>
                <span class="star" data-value="5">★</span>
            </div>
            <!-- Input tersembunyi untuk menyimpan nilai rating -->
            <input type="hidden" name="rating" id="rating" />

            <div class="form-group text-center">
                <input type="reset" value="Reset" class="btn btn-secondary" />
                <input type="submit" value="Submit" class="btn btn-primary" />
            </div>
        </form>
    </div>

    <script>
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                stars.forEach(s => s.classList.remove('selected')); // Hapus seleksi dari semua bintang
                star.classList.add('selected'); // Tambah seleksi pada bintang yang diklik
                ratingInput.value = star.getAttribute('data-value'); // Set nilai rating ke input tersembunyi
            });
        });
    </script>
</body>
</html>
