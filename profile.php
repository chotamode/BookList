<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="./topnav.js"></script>
    <title>Profile</title>
</head>
<body onload="checkTheme()">
    <?php
        $username = $_GET['user'];
        require "blocks/topnav.php";
        //include "db.php";
        $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");
        $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$username'");
        $user = $result -> fetch_assoc();
     ?>

    <div class="container">
        <div class="page">

            <h1><?php echo $username ?></h1>
            <img src="./img/acc_img/<?php echo $user['imgname'] ?>" alt="profilepic"/>

            <div class="description">
                <h1>Info:</h1>
                <p><?php echo $user['info'] ?></p>
                <?php if(isset($_COOKIE['user']) && $_COOKIE['user'] == $username):?>
                <form action="info.php" method="post">
                    <label for="info_text">Change info:</label>
                    <input type="text" id="info_text" name="info_text">
                    <button type="submit">Change</button>
                </form>
                <?php endif?>
            </div>

            <!-- <form action="changeprofilepic.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form> -->

            <div class="booklist">
                <h1>Book list</h1>

                <?php
                    $result = $mysql->query("SELECT * FROM booklist JOIN users ON booklist.user = users.id JOIN books ON booklist.book = books.id WHERE `login` = '$username'");
                    foreach ($result as $book):
                ?>
                    <div class="booklist_book">
                        <h1><a href="book.php?bookid=<?php echo $book['id'] ?>"><?php echo $book['title'] ?></a></h1>
                        <img src="./img/book_img/<?php echo $book['imgname'] ?>" alt="book"/>
                        <p>Status:<?php echo $book['status'] ?><br>
                        Rating:<?php echo $book['rating'] ?></p>
                    </div>
                <?php 
                    endforeach;
                    $mysql->close();
                ?>

            </div>
        </div>
    </div>

</body>
</html>