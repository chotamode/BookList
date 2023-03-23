<?php

    /**
     * page for adding book in your list
     * @param mysqli $mysql
     * @param string $status can be reading, done, on hold
     * @param string $rating rating from 0 to 10
     * @param string $bookid 
     * @param string $username username of ligged in user
     * @param string $result sql query result
     */

    $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");

    $status = filter_var(trim($_POST['status']), FILTER_SANITIZE_STRING);
    $rating = filter_var(trim($_POST['rating']), FILTER_SANITIZE_STRING);
    $bookid = $_GET['bookid'];
    $username = $_COOKIE['user'];
    $result = $mysql->query("SELECT id FROM users WHERE `login` = '$username'");
    $useridarr = $result->fetch_assoc();
    $userid = $useridarr['id'];

    $mysql->query("INSERT INTO booklist (user, book, status, rating) VALUES('$userid', '$bookid', '$status', '$rating') ON DUPLICATE KEY UPDATE status = '$status', rating = '$rating'");

    $mysql->close();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>