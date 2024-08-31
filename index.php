<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Quiz Berbasis PHP</title>
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

        .container {
            text-align: center;
            background-color: #004F95;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: white;
            margin-bottom: 60px;
        }

        .button {
            display: block;
            width: 200px;
            padding: 15px 0;
            margin: 15px auto;
            font-size: 18px;
            color: #003566;
            background-color: white;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Website Quiz Berbasis PHP</h2>
        <a href="biodata.php" class="button">Quiz Siswa</a>
        <a href="admin_login.php" class="button">Login Admin</a>
    </div>
</body>
</html>
