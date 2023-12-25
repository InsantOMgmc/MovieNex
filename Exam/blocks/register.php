<?php
require_once "../entities/User.php";
define("HOST", 'localhost');
define("DATABASE", "movienex");
define("CHARSET", "utf8");
define("USER", "root");
define("PASSWORD", '');

try {
    $pdo = new PDO('mysql:host=' . HOST . ";dbname=" . DATABASE . ';charset=' . CHARSET, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $login = isset($_POST['login']) ? $_POST['login'] : 'null';
    $email = isset($_POST['email']) ? $_POST['email'] : 'null';
    $password = isset($_POST['password']) ? $_POST['password'] : 'null';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : 'null';

    if (!$login || !$email || !$password || !$confirmPassword) {
        throw new Exception("Пожалуйста, заполните все обязательные поля.");
    }

    if ($password !== $confirmPassword) {
        throw new Exception("Пароли не совпадают.");
    }
    $user = new User($login, $email, $password);
    $user->createUser($pdo);
    header("Location: ../pages/login.html");

} catch (PDOException $e) {
    if ($e->getCode() == '23000') {
        echo "The user with this email address is already authorized";
    } else {
        echo "Database connection error: " . $e->getMessage();
    }
}

?>