<?php
include 'config.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    
    <!-- Import Montserrat font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #1e90ff, #d946ef);
        }

        .dashboard-container {
            background-color: #004F95;
            border-radius: 10px;
            padding: 40px;
            width: 800px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: white;
        }

        h2 {
            color: white;
            margin-bottom: 30px;
            margin-top: -10px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid white;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #1e90ff;
        }

        tr:nth-child(odd) {
            background-color: #003566;
        }

        button {
            padding: 10px 20px;
            background-color: white;
            color: #003566;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
            font-family: 'Montserrat', sans-serif;
            margin-top: 20px;
        }

        button:hover {
            background-color: #ccc;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Dashboard Admin</h2>
        <table>
            <tr>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Lokasi Kampus</th>
                <th>Nilai</th>
                <th>Waktu Pengerjaan</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['npm']."</td>";
                    echo "<td>".$row['kelas']."</td>";
                    echo "<td>".$row['jurusan']."</td>";
                    echo "<td>".$row['lokasi_kampus']."</td>";
                    echo "<td>".$row['nilai']."</td>";
                    echo "<td>".$row['waktu_pengerjaan']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data.</td></tr>";
            }
            ?>
        </table>
        <a href="index.php">
            <button>Kembali ke Halaman Utama</button>
        </a>
    </div>
</body>
</html>
