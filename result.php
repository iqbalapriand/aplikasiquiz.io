<?php
include 'config.php';

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hasil Quiz</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: 'Montserrat', sans-serif;
                background: linear-gradient(135deg, #1e90ff, #d946ef);
            }

            .container {
                text-align: center;
                background-color: #004F95;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }

            .score-box {
                background-color: white;
                color: #1f2a44;
                padding: 20px;
                border-radius: 10px;
                margin-bottom: 20px;
            }

            h2 {
                margin-top: 0;
                color: white;
            }

            .score {
                font-size: 40px;
                margin: 10px 0;
                font-weight: 600;
            }

            p {
                margin: 5px 0;
                font-size: 15px;
            }

            .button-container {
                margin-top: 20px;
            }

            .button-container button {
                background-color: #4B63F9;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                font-family: 'Montserrat', sans-serif;
                font-weight: 400;
            }

            .button-container button:hover {
                background-color: #005bb5;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Hasil Quiz</h2>
            <div class="score-box">
                <div class="score">Skor Anda : <?php echo $user['nilai']; ?></div>
                <p>Nama : <?php echo $user['nama']; ?></p>
                <p>NPM : <?php echo $user['npm']; ?></p>
            </div>
            <div class="button-container">
                <a href="index.php">
                    <button>Kembali ke Halaman Utama</button>
                </a>
            </div>
        </div>
    </body>
    </html>

    <?php
} else {
    echo "Data tidak ditemukan.";
}
?>
