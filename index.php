<!DOCTYPE html>
<html lang="en">

<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booklist</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="./topnav.js"></script>
    <script src="./search.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body onload="checkTheme()">

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require "blocks/topnav.php";
    //include "db.php";
    $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");
 ?>

    <div class="container">

        <h1 class="booklist_header">New books</h1>
        <?php


            $per_page_record = 4;

            $mysql = new mysqli("localhost", "nurmuedu", "webove aplikace", "nurmuedu");
            $query = "SELECT COUNT(*) FROM books";     
            $result = mysqli_query($mysql, $query);     
            $row = mysqli_fetch_row($result);     
            $total_records = $row[0];     

            $total_pages = ceil($total_records / $per_page_record);    

            if (isset($_GET["page"])) {    
                $page  = $_GET["page"];
            }    
            else {    
                $page=1;    
            }    

            if(!is_numeric($page)){
                $page=1; 
            }elseif($page > $total_pages or $page < 0){
                $page=1; 
            }

            $start_from = ($page-1) * $per_page_record;     

            $query = "SELECT * FROM books LIMIT $start_from, $per_page_record";     
            $result = mysqli_query ($mysql, $query);    

            // $result = $mysql->query("SELECT * FROM ( SELECT * FROM books ORDER BY id DESC LIMIT 5 )Var1 ORDER BY id ASC ");
            foreach ($result as $book):
        ?>
        <!-- showing books -->
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

    <div id = "pages">
        <?php  
            
        echo "<br>";     
            // Number of pages required.    
            $pagLink = "";       

            if($page>=2){   
                echo "<a href='index.php?page=".($page-1)."'>  Prev </a>";   
            }       

            echo "<a>$page</a>";

            if($page<$total_pages){   
                echo "<a href='index.php?page=".($page+1)."'>  Next </a>";   
            }   
    
        ?>    
    </div>

</body>

</html>