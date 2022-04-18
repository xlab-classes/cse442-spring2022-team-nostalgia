<div class ="navbar">
    <div class="top">
        <div class="left">
            <a href="index.php">
                <img class="logo" src="static/images/logo.png" alt="Nostalgia">
            </a>
        </div>
        <div class="center">
            <h1>Nostalgia</h1>
        </div>
        <div class="right">
            <a href="index.php">Help</a>
            <button class="darkmode-toggle">🌑</button>
        </div>
    </div>
    <ul class="links">
        <!-- ADD: current page's navbar link is bolded, or color changed -->
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="profilebio.php">Profile</a>
        </li>
        <li>
            <a href="search.php">Search</a>
        </li>
        <li>
            <a href="posts.php">Posts</a>
        </li>
        <li>
            <a href="followers.php">Followers</a>
        </li>
        <li>
            <a href="following.php">Following</a>
        </li>
        <li>
            <a class="broken-link" href="index.php">Blog</a>
        </li>
        <li>
            <a class="broken-link" href="index.php">Saved</a>
        </li>
        <li>
            <a class="broken-link" href="index.php">About</a>
        </li>
        <li>
            <a class="broken-link" href="index.php">News</a>
        </li>
        <li>
        <?php
            if(!isset($_SESSION["username"])){
                echo "<a href='login.php'>Login</a>";
            } else {
                echo "<a href='logout.php'>Log out</a>";
            }
        ?>
        </li>
    </ul>
</div>