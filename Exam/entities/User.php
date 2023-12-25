<?php

class User
{
    private $login;
    private $email;
    private $password;
    private $salt;
    public function __construct($login, $email, $password)
    {

        $this->login = $login;
        $this->email = $email;
        $this->salt = $this->randString();
        $this->password = $password;
    }

    public function createUser(PDO $pdo)
    {
        try {
            $email = $this->getEmail();
            $login = $this->getLogin();
            $password = $this->getPassword();
            $salt = $this->getSalt();
            $sqlQuery = "INSERT INTO users (`login`, `email`, `salt`, `password`) VALUES (?, ?, ?, ?)";
            $blank = $pdo->prepare($sqlQuery);
            $blank->execute([$login, $email, $salt, $password]);

        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                echo "The user with this email address is already authorized";
            } else {
                echo "Database connection error: " . $e->getMessage();
            }
        }
    }

    public function authUser(PDO $pdo)
    {
        $email = $this->getEmail();
        $password = $this->getPassword();

        $stmt = $pdo->prepare("SELECT salt FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $salt = $user['salt'];
            $hashedPassword = sha1($salt . md5($password));
            $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?");
            $stmt->execute([$email, $hashedPassword]);
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }

    public function randString($length = 32)
    {
        $characters = '0123456789abcdefABCDEF';
        $randStr = "";
        for ($i = 0; $i < $length; $i++) {
            $randStr .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $randStr;
    }

    public function getSalt()
    {
        return $this->salt;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
}