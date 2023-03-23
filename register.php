<?php 
    error_reporting(E_ALL);
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="./js/main.js" defer></script> 
    <script src="./topnav.js"></script>
</head>
<body onload="checkTheme()">

    <?php require "blocks/topnav.php";?>
    <!-- registerform -->
    <form action="check.php" method="post" class="registerform" id="registerform" name="reg">
        
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" name="username" id="username" value="<?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?>" minlength=5 required pattern="[^()/><\][\\\x22,;|]+" >

        <label for="email">Email</label>
        <input type="email" placeholder="email@example.cz" name="email" id="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>" minlength=5 required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">

        <label for="birthday">Birthday</label>
        <input type="date" name="birthday" id="birthday" value="<?php if(isset($_SESSION['birthday'])){echo $_SESSION['birthday'];}?>" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password" id="password" minlength=5 required>

        <label for="passwordcheck">Password check</label>
        <input type="password" placeholder="Password again" name="passwordcheck" id="passwordcheck" minlength=5 required>

        <button type="submit">Register</button>

    </form> 

</body>
</html>