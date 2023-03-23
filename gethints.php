<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");
    $title = htmlspecialchars($_GET['title']);

    $sql = "SELECT title FROM books WHERE title LIKE '$title%'";

    $result = mysqli_query($mysql, $sql);

    $data = array();
    while($enr = mysqli_fetch_assoc($result)){
        $a = array($enr['title']);
        array_push($data, $a);
    }
    
    echo json_encode($data);
?>