
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Анкета опитування</title>
</head>
<body>

<h2>Анкета опитування</h2>

<form action="index.php" method="POST">
    <label for="name">Ім'я респондента:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email респондента:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label>Питання 1: Ваш улюблений колір?</label><br>
    <input type="radio" id="color1" name="color" value="Червоний" required>
    <label for="color1">Червоний</label><br>
    <input type="radio" id="color2" name="color" value="Синій">
    <label for="color2">Синій</label><br>
    <input type="radio" id="color3" name="color" value="Зелений">
    <label for="color3">Зелений</label><br><br>

    <label>Питання 2: Напишіть, чим ви цікавитеся:</label><br>
    <textarea id="interests" name="interests" rows="4" cols="50" required></textarea><br><br>

    <label for="age">Питання 3: Ваш вік:</label><br>
    <input type="number" id="age" name="age" min="0" required><br><br>

    <button type="submit">Надіслати</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $color = htmlspecialchars($_POST['color']);
    $interests = htmlspecialchars($_POST['interests']);
    $age = htmlspecialchars($_POST['age']);
    $submissionTime = date("Y-m-d H:i:s");

    // Відображення даних для користувача
    echo "<h3>Дякуємо за участь, $name!</h3>";
    echo "<p>Ваш email: $email</p>";
    echo "<p>Ваш улюблений колір: $color</p>";
    echo "<p>Ваші інтереси: $interests</p>";
    echo "<p>Ваш вік: $age</p>";
    echo "<p>Час заповнення форми: $submissionTime</p>";

    // Створення файлу для збереження даних
    $directory = 'survey';
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
    $filename = "$directory/survey_" . date("Y-m-d_H-i-s") . ".txt";

    // Збереження у текстовий файл
    $content = "Ім'я: $name\n";
    $content .= "Email: $email\n";
    $content .= "Улюблений колір: $color\n";
    $content .= "Інтереси: $interests\n";
    $content .= "Вік: $age\n";
    $content .= "Час заповнення форми: $submissionTime\n";

    file_put_contents($filename, $content);

    echo "<p>Ваші відповіді збережено у файлі $filename.</p>";
}
?>

</body>
</html>

