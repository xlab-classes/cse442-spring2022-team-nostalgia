<div class="login-box">
    <div class = heading>
        <h1>Search for users on Nostalgia!</h1>
    </div>

    <div class="inner">
        <form id="search" action="" method="POST">
            <input type="text" name="search" id="search" autocomplete="off" placeholder="Enter a username...">
            <br>
            <input type="submit">
        </form>
        <br>

        <?php
            session_start();
            if(!isset($_SESSION["username"])){
                header('Location: login.php'); exit;
            }
        ?>
    </div>
</div>