<?php

    /**
     * script for logging in, using md5 for safer usage
     */

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

   // require("db.php");
    $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");

    $login = mysqli_real_escape_string($mysql, $_POST['uname']);
    $password = mysqli_real_escape_string($mysql, $_POST['psw']);


    $password = md5($password."peepeepoopoo");

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
    if(mysqli_num_rows($result)==0){
        require("login.php");
        exit("Login or password incorrect"); 
    }
    $user = $result->fetch_assoc();

    setcookie("user", $user['login'], time() + 3600, "/");

    $mysql->close();

    header("location: ./index.php");
?>