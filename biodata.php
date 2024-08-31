<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $lokasi_kampus = $_POST['lokasi_kampus'];

    $sql = "INSERT INTO users (nama, npm, kelas, jurusan, lokasi_kampus) VALUES ('$nama', '$npm', '$kelas', '$jurusan', '$lokasi_kampus')";
    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id;
        header("Location: quiz.php?user_id=".$user_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Peserta</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #1e90ff, #d946ef);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 7px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: 700;
            margin-top: 0;
            
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px -10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
        }

        .form-container input[type="submit"] {
            background-color: #4B63F9;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 500;
            font-family: 'Montserrat', sans-serif;
            margin-top: 20px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Form Biodata Mahasiswa</h2>
        <form method="post" action="biodata.php">
            <input type="text" name="nama" placeholder="Nama" required><br>
            <input type="text" name="npm" placeholder="NPM" required><br>
            <input type="text" name="kelas" placeholder="Kelas" required><br>
            <input type="text" name="jurusan" placeholder="Jurusan" required><br>
            <input type="text" name="lokasi_kampus" placeholder="Lokasi Kampus" required><br>
            <input type="submit" value="Mulai Kuis">
        </form>
    </div>
</body>
</html>
