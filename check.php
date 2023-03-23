<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "register.php";

    $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");

    //geting form data
    $login = mysqli_real_escape_string($mysql, trim($_POST['username']));
    $email = mysqli_real_escape_string($mysql, trim($_POST['email']));
    $password = mysqli_real_escape_string($mysql, trim($_POST['password']));
    $passwordcheck = mysqli_real_escape_string($mysql, trim($_POST['passwordcheck']));
    $birthday = trim($_POST['birthday']);

    //saving data incase form data is wrong

    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
    $_SESSION["login"]=$login;
    $_SESSION["email"]=$email;
    $_SESSION["birthday"]=$birthday;

    //checking data
    if(mb_strlen($login) < 5){
        $message = "Login is too short";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $mysql->close();
        exit($message);
    }else if($mysql->query("SELECT login FROM users WHERE login = '$login'")->num_rows != 0){
        $message = "Username already taken";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $mysql->close();
        exit($message);
    }else if(mb_strlen($password) < 5){
        $message = "Password is too short";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $mysql->close();
        exit($message);
    }else if(mb_strlen($email) < 5){
        $message = "Email is too short";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $mysql->close();
        exit($message);
    }else if($password != $passwordcheck){
        $message = "Passwords are not the same";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $mysql->close();
        exit($message);
    }

    //encrypting the password
    $password = md5($password."peepeepoopoo");

    $mysql->query("INSERT INTO users (login, pass, birthday, email) VALUES('$login', '$password', '$birthday', '$email')");

    $mysql->close();

    exit("Registration success");
?>
<script type="text/javascript" src="./js/main.js"></script>