<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //include "db.php";
    $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");

    $comment = htmlspecialchars($_POST['comment_text']);
    $bookid = htmlspecialchars($_GET['bookid']);
    $username = $_COOKIE['user'];
    $result = $mysql->query("SELECT id FROM users WHERE `login` = '$username'");
    $useridarr = $result->fetch_assoc();
    $userid = $useridarr['id'];

    $mysql->query("INSERT INTO comments (username, text, book) VALUES('$userid', '$comment', '$bookid')");

    $mysql->close();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>