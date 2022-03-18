<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nostalgia — keeping it simple.</title>
    <meta name="title" content="Nostalgia — keeping it simple.">
    <meta name="description" content="Nostalgia is an ethical social network taking key design elements from early 2000s online culture.">

    <meta property="og:title" content="Nostalgia — keeping it simple.">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Nostalgia is an ethical social network taking key design elements from early 2000s online culture.">

    <script src="scripts.js" defer></script>
</head>

<body>
    <div class="container">
        <nav>
            <div class="top">
                <div class="left">
                    <a href="index.php">
                        <img class="logo" src="logo.png" alt="Nostalgia">    
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
                    <a class="broken-link" href="index.php">Profile</a>
                </li>
                <li>
                    <a class="broken-link" href="index.php">Search</a>
                </li>
                <li>
                    <a class="broken-link" href="index.php">Friends</a>
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
                    <a href="login.php">Login</a>
                </li>
            </ul>
        </nav>
        <main>
            <div class="row login">
                <div class="col left w-40">
                    <div class="info-box">
                        <div class="heading">
                            <h1>Reset/Change Password</h1>
                        </div>
                        <div class="inner">
                            <p>Please enter your email address below and you will be sent instructions to change your password.</p>
                            <form id="forgot" action="login.php">
                                <input type="text" id="user" autocomplete="off" placeholder="Enter your email..."><br>
                                <br>
                                <input type="submit">
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col right">
                </div>
            </div>    
        </main>
        <footer>
            <p>
                created by Joseph, Rob, and Elijah
            </p>
        </footer>
    </div>
</body>


<link rel="stylesheet" href="style.php" media="screen">

