<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="./search.js"></script>
    <script src="./topnav.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Search</title>
</head>
<body onload="hideSearch(); checkTheme();">
    
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require "blocks/topnav.php";
    //include "db.php";
    $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");
    if (empty(htmlspecialchars($_POST['search']))){
        $title = htmlspecialchars($_POST['advsearch']);
    }else{
        $title = htmlspecialchars($_POST['search']);
    }

    <form class="advsearch" action="search.php" method="post" autocomplete="off" id = "advsearch">
        <label for="advsearch">
            <input type="text" placeholder="Search..." name="advsearch"  list="hints" onKeyUp="hintUpdate(this.value)">
        </label>
        
        <datalist id="hints">
            <!-- hints -->
        </datalist>
        <button type="submit" class="rightbut" data-href="search.php">Search</button>
    </form>

    <div class="container">

        <h1 class="booklist_header">Results</h1>
        <?php
            $result = $mysql->query("SELECT * FROM books WHERE title = '$title'");
            foreach ($result as $book):
        ?>
        <div class="book">
            <div class="image">
                <h1><a href="book.php?bookid=<?php echo $book['id'] ?>"><?php echo $book['title'] ?></a></h1>
                <img src="./img/book_img/<?php echo $book['imgname'] ?>" alt="book"/>
            </div>
            <div class="description">
                <p><?php echo $book['description'] ?></p>
            </div>
        </div>
        <?php  endforeach;
            $mysql->close();?>
    </div>     

</body>
</html>