<?php
require_once '../entities/User.php';

define("HOST", 'localhost');
define("DATABASE", "movienex");
define("CHARSET", "utf8");
define("USER", "root");
define("PASSWORD", '');
try {
    session_start();

    $pdo = new PDO('mysql:host=' . HOST . ";dbname=" . DATABASE . ';charset=' . CHARSET, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = isset($_POST['email']) ? $_POST['email'] : 'none';
    $password = isset($_POST['password']) ? $_POST['password'] : 'none';

    if (!$email || !$password) {
        throw new Exception("Пожалуйста, заполните все обязательные поля.");
    }

    $user = new User(' ', $email, $password);
    $fetchResult = $user->authUser($pdo);

    $fetchEmail = $fetchResult['email'];

    if ($fetchResult) {
        $_SESSION['user_id'] = $fetchResult['userId'];
        $_SESSION['user_email'] = $email;
        header('Location: ../index.php');
        exit();
    } else {
        throw new Exception("Пароли не совпадают");
    }
    if (isset($_POST['logout'])) {
        $isCurrentUser = false;
    }

} catch (PDOException $e) {
    if ($e->getCode() == '23000') {
        echo "The user with this email address is already authorized";
    } else {
        echo "Database connection error: " . $e->getMessage();
    }
}
?>