<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //include "db.php";
    $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");

    $info = htmlspecialchars($_POST['info_text']);
    $username = $_COOKIE['user'];

    $mysql->query("UPDATE users SET info = '$info' WHERE `login` = '$username'");

    $mysql->close();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>