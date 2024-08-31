<?php
include 'config.php';

$user_id = $_GET['user_id'];
$question_id = isset($_GET['question_id']) ? $_GET['question_id'] : 1;

$sql = "SELECT * FROM questions WHERE id = $question_id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
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

        .quiz-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            width: 100%;
            text-align: left;
            font-family: 'Montserrat', sans-serif;
        }

        .quiz-container h2 {
            color: #333;
            font-weight: 700;
            margin-bottom: 20px;
            margin-top: 0;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }

        .question {
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: 500;
            font-family: 'Montserrat', sans-serif;
        }

        .options input[type="radio"] {
            margin-right: 10px;
        }

        .options label {
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
        }

        .submit-button {
            background-color: #4B63F9;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 500;
            display: inline-block;
            text-align: center;
            margin-top: 20px;
            font-family: 'Montserrat', sans-serif;
            text-decoration: none;
        }

        .submit-button:hover {
            background-color: #1565c0;
        }

        .result-button {
            display: block;
            background-color: #4B63F9;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 500;
            text-align: center;
            margin: 20px auto 0 auto; /* Center the button */
            text-decoration: none; /* Remove underline */
            max-width: 200px; /* Optional: Limit the width of the button */
        }

        .result-button:hover {
            background-color: #1565c0;
        }

        
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    $question = $result->fetch_assoc();
    echo "<div class='quiz-container'>";
    echo "<h2>Quiz</h2>";
    echo "<form method='post' action='quiz.php?user_id=$user_id&question_id=$question_id'>";
    echo "<div class='question'>".$question['question']."</div>";
    echo "<div class='options'>";
    echo "<label><input type='radio' name='answer' value='1'> ".$question['option1']."</label>";
    echo "<label><input type='radio' name='answer' value='2'> ".$question['option2']."</label>";
    echo "<label><input type='radio' name='answer' value='3'> ".$question['option3']."</label>";
    echo "<label><input type='radio' name='answer' value='4'> ".$question['option4']."</label>";
    echo "<label><input type='radio' name='answer' value='5'> ".$question['option5']."</label>";
    echo "</div>";
    echo "<input class='submit-button' type='submit' value='Next Question'>";
    echo "</form>";
    echo "</div>";
} else {
    echo "<div class='quiz-container'>";
    echo "<h2>Kuis telah selesai.</h2>";
    echo "<a class='result-button' href='result.php?user_id=$user_id'>Lihat Hasil</a>";
    echo "</div>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answer = $_POST['answer'];
    if ($answer == $question['correct_option']) {
        $conn->query("UPDATE users SET nilai = nilai + 1 WHERE id = $user_id");
    }
    header("Location: quiz.php?user_id=$user_id&question_id=".($question_id + 1));
}
?>

</body>
</html>
