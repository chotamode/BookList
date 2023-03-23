<header class="topnav" id="topnav">
    <a href="index.php">Home</a>
    <?php if (!isset($_COOKIE['user'])): ?>
        <a class="rightbut" href = "login.php">Login</a>
    <?php else: ?>    
        <a href="profile.php?user=<?php echo $_COOKIE['user'] ?>">Profile</a>
        <a class="rightbut" href = "logout.php">Logout</a>
    <?php endif;?>
    <button type="button" class="rightbut" id="theme" onclick="change_theme()">Night theme</button>
    <form class="search" action="search.php" method="post" autocomplete="off" id="searchBox">
        <label for="search">
            <input type="text" placeholder="Search..." name="search" id = "search">
        </label>
        <button type="submit" class="rightbut" data-href="search.php">Search</button>
    </form>
</header>
