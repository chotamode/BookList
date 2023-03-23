<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="./topnav.js"></script>
    <title>Book</title>
</head>
<body onload="checkTheme()">
    <?php 
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        //include "db.php";
        //getting book data for id
        $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");
        $bookid = $_GET['bookid'];
        $result = $mysql->query("SELECT * FROM `books` WHERE `id` = '$bookid'");
        $book = $result -> fetch_assoc();
        require "blocks/topnav.php";
        $result = $mysql->query("SELECT AVG(rating) 'Rating' FROM booklist WHERE book = '$bookid'");
        $rating = $result -> fetch_assoc();
    ?>
    
    <section class="container">
        <div class="page">

            <h1><?php echo $book['title']; ?></h1>
            <img src="./img/book_img/<?php echo $book['imgname']; ?>" alt="<?php echo $book['imgname']; ?>"/>

            <div class="information">
                <p>Author: <?php echo $book['author']; ?></p>
                <p>First publication date: <?php echo $book['pubdate']; ?></p>
                <p>Rating: <?php echo $rating['Rating']; ?></p>

                <?php if(isset($_COOKIE['user'])):?>
                <form action="addbook.php?bookid=<?php echo $bookid; ?>" method="post">

                    <label for="status">Book status:</label>
                    <select name="status" id="status">
                        <option value="", selected="selected"></option>
                        <option value="plan to read">Plan to read</option>
                        <option value="done">Done</option>
                        <option value="in progress">In progress</option>
                    </select>
                    <br>
                    <label for="rating">Your rating:</label>
                    <input type="number" id="rating" name="rating" min="1" max="10">

                    <button type="submit">submit</button>

                </form>
                <?php endif?>

            </div>

            <div class="description">
                <h1>description:</h1>
                <p> <?php echo $book['description']; ?> </p>
            </div>

            <div class="comments">
                <h1>Comments</h1>
                <!-- form for commenting -->
                <?php if(isset($_COOKIE['user'])):?>
                <form action="comment.php?bookid=<?php echo $bookid; ?>" method="post">
                    <label for="comment_text">Comment:</label>
                    <input type="text" id="comment_text" name="comment_text">
                    <button type="submit">Send</button>
                </form>
                <?php endif?>

                <?php
                //loading and then showing comments
                    $result = $mysql->query("SELECT * FROM comments JOIN users ON comments.username=users.id WHERE book = $bookid");
                    foreach ($result as $comment):
                ?>
                    <div class="comment">
                        <img src="./img/acc_img/<?php echo $comment['imgname']?>" alt="profilepic"/>
                        <h1><a href="profile.php?user=<?php echo $comment['login']?>"><?php echo $comment['login']?></a></h1>
                        <div class="date">published: <?php echo $comment['published']?></div>
                        <p><?php echo $comment['text']?></p>
                    </div>
                <?php 
                    endforeach;
                    $mysql->close();
                 ?>
            </div>
        </div>
    </section>
</body>
</html>