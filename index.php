<?php

$db = new SQLite3('database.db');

$db->exec("
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT
)
");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];

    $stmt = $db->prepare(
        "INSERT INTO users (name) VALUES (:name)"
    );

    $stmt->bindValue(':name', $name);

    $stmt->execute();

    echo "Данные сохранены!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form</title>
</head>
<body>

<h2>Введите имя</h2>

<form method="POST">

    <input
        type="text"
        name="name"
        required
    >

    <button type="submit">
        Сохранить
    </button>

</form>

</body>
</html>