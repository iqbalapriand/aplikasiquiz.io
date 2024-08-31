<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_user = $_POST['admin_user'];
    $admin_pass = $_POST['admin_pass'];

    if ($admin_user == "admin" && $admin_pass == "admin123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
    } else {
        echo "<p style='color:red; text-align:center;'>Login gagal. Username atau Password salah.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    
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

        .login-container {
            font-family: 'Montserrat', sans-serif;
            background-color: #004F95;
            border-radius: 10px;
            padding: 40px;
            width: 350px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-container h2 {
            color: white;
            margin-bottom: 20px;
            margin-top: -10px;
            font-weight: 800;
            
        }

        .login-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: white;
            font-size: 16px;
        }

        .login-btn {
            background-color: #4B63F9;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            width: 100%;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            font-weight: 800;
            font-family: 'Montserrat', sans-serif;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .options {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 10px;
        }

        .options label, .options a {
            font-size: 14px;
            color: white;
            text-decoration: none;
        }

        .options a:hover {
            text-decoration: underline;
        }

        .icon {
            margin-bottom: 20px;
        }

        .icon img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <form method="post" action="admin_login.php">
            <input type="text" name="admin_user" class="input-field" placeholder="Username" required>
            <input type="password" name="admin_pass" class="input-field" placeholder="Password" required>
            <div class="options">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
