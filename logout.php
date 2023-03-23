<?php
    session_start();
    if(isset($_COOKIE['user'])){
        setcookie("user", $_COOKIE['user'], time() - 3600, "/");
        session_destroy();
        header("location: ./index.php");
        exit();
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>