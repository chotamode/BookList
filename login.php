<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="./js/main.js" defer></script> 
    <script src="./topnav.js"></script>
</head>
<body onload="checkTheme()">
    
    <?php require "blocks/topnav.php" ?>

    <!-- authenticationform -->
    <form action="auth.php" method="post" class="loginform" id="loginform" name="log">
        
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" id="uname" required>
    
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
    
        <button type="submit">Login</button>
        <a href = "register.php">Register</a>

    </form>
</body>
</html>